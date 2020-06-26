@extends('layouts.app')

@section('content')

      <section class="container">
            <figure>
                  <img src="/{{ $user->avatar }}" alt="">
            </figure>
            <h3>Nom : {{ $user->pseudo }}</h3>
            <h3>Email : {{ $user->email }}</h3>

            
      </section>
      

      <section class="container ">
            <div class="gallery" id="gallery">
            @php
                  $collection = DB::table('articles')->where('author', $user->id)->get();
            @endphp
             
            @foreach ($collection as $article)
            <div class="mb-3 pics animation all 1">
                  <a href="/show/{{ $article->id }}">
                      <img class="img-fluid" src = "{{$article->image}}" alt="{{$article->title}}">
                  </a>
            </div>
            @endforeach
            </div>
      </section>
@endsection
