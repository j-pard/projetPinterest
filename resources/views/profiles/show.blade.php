@extends('layouts.app')

@section('content')
      <section class="container">

            <div class="jumbotron jumbotron-fluid">
                  <div class="development container">
                        <img src="{{ Auth::user()->cover }}"  alt="User cover">
                  </div>
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

      {{-- Following list --}}
      <section>
            <h3>Following</h3>
            <ul>
                  @php
                        //$follower_ID = DB::table('user_follower')->where('follower_id', Auth::user()->id)->value('following_id');
                        
                        $follows = DB::table('user_follower')
                              ->join('users', 'user_follower.following_id', '=', 'users.id')
                              ->select('users.pseudo')
                              ->get();
                  @endphp
                  @foreach ($follows as $follow)
                        <li>
                              {{$follow->pseudo}}
                        </li>
                  @endforeach
            </ul>
      </section>
      

      <section class="container ">
            <div class="gallery" id="gallery">
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