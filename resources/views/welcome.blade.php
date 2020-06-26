@extends('layouts.app')

@section('title','PartyRest')

@section('content')
  <section class="container">
    <!-- Grid row -->
    <div class="gallery" id="gallery">

    @foreach ($articles as $article)

      <!-- Grid column -->
      <div class="mb-3 pics animation all 1">
        <a href="/show/{{ $article->id }}">
            <img class="img-fluid" src = "{{$article->image}}" alt="{{$article->title}}">
        </a>
      </div>
      @endforeach
  
  </section>
@endsection