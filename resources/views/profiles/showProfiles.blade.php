@extends('layouts.app')

@section('content')

@php
    $author = DB::table('users')->where('id', $article->author)->value('pseudo');
    $author_id = DB::table('users')->where('id', $article->author)->value('id');

    $author_avatar = DB::table('users')->where('id', $author->author)->value('avatar');

    $originalDate = $article->updated_at;
    $newDate = date("d-m-Y", strtotime($originalDate));

    $collection = DB::table('articles')->where('author', $user->id)->get();

    $isFollowed = DB::table('user_follower')
                                        ->where('follower_id', Auth::user()->id)
                                        ->where('following_id', $author_id)
                                        ->exists();

                                    if($isFollowed) {
                                        $btnValue = "Unfollow";
                                    }
                                    else {
                                        $btnValue = "Follow"; 
                                    }
@endphp

<section class="container">

  
      <div class="coverimage">
            <img src="{{ Auth::user()->cover }}"  alt="User cover">
          </div>
  
      <div class="row profilavatar">

                  
            <div class="avatar">
                  <img src="/{{$author_avatar}}"  alt="User avatar">
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

