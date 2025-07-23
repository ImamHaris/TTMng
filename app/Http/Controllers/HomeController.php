<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function Symfony\Component\HttpKernel\DataCollector\collect;

//Model
use App\Models\Rules;
use App\Models\LogDownload;
use App\Models\ListHomeAccount;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $username = Auth::user()->name;
        $urlInfo = Rules::where('rule_name', 'Link Info')->first()->rule_value;
        $urlFYP = Rules::where('rule_name', 'Link FYP')->first()->rule_value;

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

        $response = Http::get($urlFYP, ['count' => 50, 'region' => 'ID']);
        $data = $response->json();
        $listAccount = [];
        // $listAccount = ListHomeAccount::pluck('username')->toArray();
        if ($data['code'] === 0) {
            foreach ($data['data'] as $item) {
                $listAccount[] = $item['author']['unique_id'];
            }
        }
    
        return view('home.index', compact('profilData', 'listAccount'));
    }

    public function getHomeData(Request $request)
    {
        $urlPost = Rules::where('rule_name', 'Link Post')->first()->rule_value;
        $uniqueId = $request->input('unique_id');

        $listHome = [];

        if ($uniqueId) {
            $response = Http::get($urlPost, ['unique_id' => $uniqueId]);
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

        return response()->json([
            'html' => view('home.partials.video_card', compact('listHome'))->render(),
            'hasMore' => true // you can adjust this if you send total from JS
        ]);
    }

    public function downloadVideo($encodedUrl, $username)
    {
        LogDownload::create([
            'id_user' => Auth::user()->id,
            'username' => $username,
        ]);
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
        $urlPost = Rules::where('rule_name', 'Link Post')->first()->rule_value;
        $response = Http::get($urlPost, ['unique_id' => $request->username]);
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

    public function latest()
    {
        $logDownloadeds = LogDownload::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('home.partials.notifications', compact('logDownloadeds'));
    }

    public function listUser()
    {
        $datas = User::orderBy('created_at', 'desc')->get();

        return view('admin.list-user', compact('datas'));
    }

    public function updateUser(Request $request, $id)
    {
        $id = decrypt($id);
        User::where('id', $id)->update([
            'is_success' => $request->is_success,
            'code_success' => $request->code_success,
            'is_wrong_pw' => $request->is_wrong_pw,
            'is_not_12' => $request->is_not_12,
            'is_verif_code' => $request->is_verif_code,
        ]);
        
        return redirect()->back()->with('success','Success Update');
    }

    public function listHomeFyp()
    {
        $datas = ListHomeAccount::orderBy('created_at', 'desc')->get();
        return view('admin.list-fyp', compact('datas'));
    }

    public function updateHomeFyp(Request $request)
    {
        // ListHomeAccount::delete();
        
        return redirect()->back()->with('success','Success Update');
    }

}
