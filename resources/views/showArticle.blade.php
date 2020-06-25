
@extends('layouts.app')

@section('content')
    <div class="container">

                @if(Auth::user()->id == $article->author)
                    <a href="/edit/{{ $article->id }}" class="btn btn-info" role="button">Modifier article</a>
                @endif

        <h2>{{ $article->title }}</h2>
        <ul>
            <li>{{$article->date}}</li>
            <li><img src = "{{$article->image}}"></li>
            <li>{{$article->description}}</li>
        </ul>

    </div>
@endsection