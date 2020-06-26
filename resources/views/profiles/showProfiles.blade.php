@extends('layouts.app')

@section('content')



<section class="container">


      <div class="coverimage">
            <img src="/{{ $user->cover }}"  alt="User cover">
            </div>
      
<div class="row profilavatar">

                  
            <div class="avatar">
                  <img src="/{{ $user->avatar }}"  alt="User avatar">
            </div>    
            
            

            <div class="username">
                  <blockquote>
                  <h3>{{ $user->pseudo }}</h3>
                  <small><cite title="name">{{ $user->firstname }}</cite></small>
                  </blockquote>
            </div>
            </div>
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

