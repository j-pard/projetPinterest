@extends('layouts.app')

@section('title','PartyRest')

@section('content')
<section class="container">
<!-- Grid row -->
<div class="gallery" id="gallery">

@foreach ($articles as $article)

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src = "{{$article->image}}" alt="Card image cap"> 
  </div>

  @endforeach
 
</section>

@endsection