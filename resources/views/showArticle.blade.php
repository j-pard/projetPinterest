
@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Auth::user()->id == $article->author)
            <a href="/edit/{{ $article->id }}" class="btn btn-info" role="button">Modifier article</a>
        @endif

        @php
            $author = DB::table('users')->where('id', $article->author)->value('pseudo');
            $author_id = DB::table('users')->where('id', $article->author)->value('id');
        @endphp

        <h2>{{ $article->title }}</h2>

        <ul>
            <li><img src = "{{$article->image}}"></li>
            <li>{{$article->description}}</li>
            <li><a href="/profiles/{{ $author_id }}">{{$author}}</a></li>
            <li>{{$article->created_at}}</li>
        </ul>

        
    </div>
@endsection