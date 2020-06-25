@extends('layouts.app')

@section('title','PartyRest')

@section('content')
<section class="container">
<!-- Grid row -->
<div class="gallery" id="gallery">

@foreach ($articles as $article)

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src = "{{$article->image}}" alt="{{$article->title}}"> 
  </div>

  @endforeach
 
</section>


<!-- @foreach ($articles as $article)
<h2>{{ $article->title }}</h2>
<ul>
    <li><strong>{{ $article->author }}</strong></li>
    <li><img src = "{{$article->image}}"></li>
    <li>{{$article->date}}</li>
    <li>{{$article->description}}</li>
</ul>
@endforeach -->
@endsection