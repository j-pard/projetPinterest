@extends('layouts.app')

@section('content')
      <section class="container">
            <!-- <figure>
                  <img src="{{ Auth::user()->avatar }}" alt="">
            </figure>
            <h3>Nom : {{ Auth::user()->pseudo }}</h3>
            <h3>Email : {{ Auth::user()->email }}</h3> -->

  
      <div class="coverimage">
            <img src="{{ Auth::user()->cover }}"  alt="User cover">
          </div>
  
<div class="row">

      
    <div class="avatar">
      <img src="{{ Auth::user()->avatar }}"  alt="User avatar">
    </div>    
    
  

    <div class="username">
      <blockquote>
        <h3>{{ Auth::user()->pseudo }}</h3>
        <small><cite title="name">{{ Auth::user()->firstname }}</cite></small>
      </blockquote>
    </div>
  </div>
      </section>
      

      <section class="container ">
            <div class="gallery" id="gallery">

                  <h4 class="titleimg">Tableaux</h4>
            @php
                  $collection = DB::table('articles')->where('author', Auth::user()->id)->get();
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