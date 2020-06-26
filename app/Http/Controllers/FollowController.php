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

        var_dump($author_id);
        var_dump($user);

        var_dump($isFollowed);

        if (is_null($isFollowed)) {
            return "hello";
        } else {
            return "not hello";
        }
        // $article = Article::findOrFail($id);
        // echo ($article->get()->value('author'));
        // $author_id = DB::table('users')->where('id', $article->author)->value('id');
        // dd($id);
    }
}
