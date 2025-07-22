<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use function Symfony\Component\HttpKernel\DataCollector\collect;

//Model
use App\Models\Rules;
use App\Models\LogDownload;
use App\Models\ListHomeAccount;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $username = Auth::user()->name;
        $urlInfo = Rules::where('rule_name', 'Link Info')->first()->rule_value;
        $urlFYP = Rules::where('rule_name', 'Link FYP')->first()->rule_value;
        $urlPost = Rules::where('rule_name', 'Link Post')->first()->rule_value;

        $response = Http::get($urlInfo, ['unique_id' => $username]);
        $profilData = [];
        if ($response->successful()) {
            $data = $response->json();
            $profilData = [
                'username'   => $username,
                'nickname'   => data_get($data, 'data.user.nickname', '-'),
                'avatarTumb' => data_get($data, 'data.user.avatarThumb', ''),
                'avatarMD'   => data_get($data, 'data.user.avatarMedium', ''),
                'avatarLG'   => data_get($data, 'data.user.avatarLarger', ''),
                'desc'       => data_get($data, 'data.user.signature', ''),
                'following'  => data_get($data, 'data.stats.followingCount', 0),
                'follower'   => data_get($data, 'data.stats.followerCount', 0),
                'likes'      => data_get($data, 'data.stats.heartCount', 0),
            ];
        }

        $listAccount = ListHomeAccount::pluck('username')->toArray();

        $response = Http::get($urlFYP, ['count' => 50, 'region' => 'ID']);
        $data = $response->json();
        $fypUsernames = [];
        if ($data['code'] === 0) {
            foreach ($data['data'] as $item) {
                $fypUsernames[] = $item['author']['unique_id'];
            }
        }
        $listAccount = array_unique(array_merge($listAccount, $fypUsernames));
    
        $page = $request->input('page', 1);
        $perPage = 1;
        $offset = ($page - 1) * $perPage;
        $slicedAccounts = array_slice($listAccount, $offset, $perPage);
    
        $listHome = [];
        foreach ($slicedAccounts as $item) {
            $response = Http::get($urlPost, [
                'unique_id' => $item,
            ]);
            if ($response->successful()) {
                $videos = $response->json()['data']['videos'] ?? [];
                if (!empty($videos)) {
                    $video = $videos[0];
                    $listHome[] = [
                        'title' => $video['title'] ?? '',
                        'music_info' => $video['music_info']['title'] ?? '',
                        'url' => $video['play'] ?? '',
                        'encodedUrl' => base64_encode($video['play']),
                        'like' => $video['digg_count'] ?? 0,
                        'comment' => $video['comment_count'] ?? 0,
                        'share' => $video['share_count'] ?? 0,
                        'nickname' => $video['author']['nickname'] ?? '',
                        'username' => $video['author']['unique_id'] ?? '',
                        'avatar' => $video['author']['avatar'] ?? '',
                    ];
                }
            }
        }
    
        if ($request->ajax()) {
            return response()->json([
                'html' => view('home.partials.video_card', compact('listHome'))->render(),
                'hasMore' => $offset + $perPage < count($listAccount),
            ]);
        }
    
        return view('home.index', compact('profilData'));
    }

    public function downloadVideo($encodedUrl)
    {
        $url = base64_decode($encodedUrl);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            abort(400, 'Invalid URL');
        }
        $videoContent = file_get_contents($url);
        $filename = 'tiktok_manager_download_' . time() . '.mp4';
        return response($videoContent)
            ->header('Content-Type', 'video/mp4')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function find(Request $request)
    {
        $response = Http::get('https://www.tikwm.com/api/user/posts', [
            'unique_id' => $request->username,
        ]);

        $results = [];

        if ($response->successful()) {
            $videos = $response->json()['data']['videos'] ?? [];

            foreach ($videos as $video) {
                $results[] = [
                    'title' => $video['title'] ?? '',
                    'music_info' => $video['music_info']['title'] ?? '',
                    'url' => $video['play'] ?? '',
                    'encodedUrl' => base64_encode($video['play'] ?? ''),
                    'like' => $video['digg_count'] ?? 0,
                    'comment' => $video['comment_count'] ?? 0,
                    'share' => $video['share_count'] ?? 0,
                    'nickname' => $video['author']['nickname'] ?? '',
                    'username' => $video['author']['unique_id'] ?? '',
                    'avatar' => $video['author']['avatar'] ?? '',
                ];
            }
        }

        return response()->json([
            'status' => 'ok',
            'results' => $results,
        ]);
    }

}
