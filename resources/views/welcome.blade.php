@extends('layouts.app')

@section('title','PartyRest')

@section('content')
<section class="container">
<!-- Grid row -->
<div class="gallery" id="gallery">

  <!-- Grid column -->
  <div class="mb-3 pics animation all 2">
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 2">
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 2">
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->
</section>


@foreach ($articles as $article)
<h2>{{ $article->title }}</h2>
<ul>
    <li><strong>{{ $article->author }}</strong></li>
    <li><img src = "{{$article->image}}"></li>
    <li>{{$article->date}}</li>
    <li>{{$article->description}}</li>
</ul>
@endforeach
@endsection