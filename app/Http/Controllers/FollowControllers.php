<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Article;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowControllers extends Controller
{
    public function followers()
    {
        $user = Auth::user()->id;
        $$user->follow();
        $user1->follow($user2);
        echo ($user1->followings);
    }
}
