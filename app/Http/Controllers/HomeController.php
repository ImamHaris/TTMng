<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

//Model

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $response = Http::get('https://www.tikwm.com/api/user/posts', [
        //     'unique_id' => 'kreator.ai72',
        //     'count' => 1,
        // ]);
        // dd($response->json()['data']['videos']);
        
        // if ($response->successful()) {
        //     $videos = $response->json()['data']['videos'];
        //     foreach ($videos as $video) {
        //         echo "Title: " . $video['title'] . "\n";
        //         echo "Video URL: " . $video['play'] . "\n"; // MP4 direct link
        //         echo "Cover Image: " . $video['cover'] . "\n";
        //     }
        // }

        // dd('test');
        // $username = 'kreator.ai72';
        // $response = Http::get("https://www.tikwm.com/api/user/info", [
        //     'unique_id' => $username,
        // ]);
        // $publicData = [];
        // if ($response->successful()) {
        //     $data = $response->json();
        //     $publicData = [
        //         'username' => $username,
        //         'nickname'   => data_get($data, 'data.user.nickname', '-'),
        //         'avatarTumb' => data_get($data, 'data.user.avatarThumb', ''),
        //         'avatarMD'   => data_get($data, 'data.user.avatarMedium', ''),
        //         'avatarLG'   => data_get($data, 'data.user.avatarLarger', ''),
        //         'desc'       => data_get($data, 'data.user.signature', ''),
        //         'following'  => data_get($data, 'data.stats.followingCount', 0),
        //         'follower'   => data_get($data, 'data.stats.followerCount', 0),
        //         'likes'      => data_get($data, 'data.stats.heartCount', 0),
        //     ];
        // }

        // dd($publicData);
        // return $publicData;

        return view('home.index');
    }
}
