<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
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
            'image' => 'required',
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
        $articles = Article::findOrFail($id);
        return view('showArticle', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::forUser($user)->allows('edit-article', $article)) {
            $articles = Article::findOrFail($id);
            return view('edit',compact('article'));
        }

        if (Gate::forUser($user)->denies('update-post', $post)) {
            return "not allowed";
        }
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
            'date' => 'required|min:1|max:255',
            'author' => 'required|min:5|max:255',
            'title' => 'required|min:5|max:255',
            'image' => 'required|min:5|max:255',
            'description' => 'max:400',

        ]);
        $article = Article::where('id', $id)
            ->update($valideData);

        $article = Article::findOrFail($id);
        return view('home', compact('article'));
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
