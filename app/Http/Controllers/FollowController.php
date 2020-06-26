<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function followers($id)
    {
        $author_id = intval($id);
        $user = Auth::user()->id;

        $isFollowed = DB::table('user_follower')
            ->where('follower_id', $user)
            ->where('following_id', $author_id)
            ->exists();

        if ($isFollowed) {
            // Follow ok -> Unfollow
            DB::table('user_follower')
            ->where('follower_id', $user)
            ->where('following_id', $author_id)
            ->delete();
        } else {
            // Follow pas ok -> Follow
            DB::table('user_follower')->insert([
                ['follower_id' => $user, 'following_id' => $author_id]
            ]);
        }
        return redirect()->back();
    }
}
