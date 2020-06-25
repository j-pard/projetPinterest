@extends('layouts.app')

@section('content')
      <section class="container">
            <!-- <figure>
                  <img src="{{ Auth::user()->avatar }}" alt="">
            </figure>
            <h3>Nom : {{ Auth::user()->pseudo }}</h3>
            <h3>Email : {{ Auth::user()->email }}</h3> -->

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
            @php
                  $collection = DB::table('articles')->where('author', Auth::user()->id)->get();
            @endphp
             
            @foreach ($collection as $item)
            <div class="mb-3 pics animation all 1">
                  <img class="img-fluid" src = "{{$item->image}}" alt="{{$item->title}}"> 
                </div>
            @endforeach
            </div>
      </section>
@endsection

