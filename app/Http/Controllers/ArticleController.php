<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::get();
        $articles = collect($articles)->sortByDesc('updated_at')->all();

        return view('welcome', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $valideData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|max:1000',
            'description' => 'max:400',
        ]);
        $valideData['author'] = Auth::user()->id;


        Article::create($valideData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        if (Auth::check()) {
            return view('showArticle', compact('article'));
        } else {
            return redirect('/register');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $auth =  Auth::user()->id;
        $author = $article->author;

        if ($auth == $author) {
            return view('edit', compact('article'));
        } else {
            return "error";
        }
        // if (Gate::forUser($id)->allows('update-post', $post)) {
        // }
        // if (Gate::denies('update-post', $post)) {
        //     return "error";
        // }
        // if (Gate::forUser($user)->denies('update-post', $artciles)) {
        //     return "not allowed";
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valideData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:400',
        ]);
        $article = Article::where('id', $id)
            ->update($valideData);

        $article = Article::findOrFail($id);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article = Article::where('id', $id)->delete();
        return "delete";
    }
}
