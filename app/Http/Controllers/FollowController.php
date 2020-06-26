<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followers($id)
    {
        $article = Article::findOrFail($id);
        echo ($article->value('author'));
        // $user = Auth::user()->id;
        // return $idAuthor;
        // $user->follow($idAuthor);
    }
}
