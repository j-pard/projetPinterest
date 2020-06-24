@extends('layouts.app')

@section('content')
      <h1>Votre profil</h1>
      <figure>
      <img src="{{ Auth::user()->avatar }}" alt="">
      </figure>
      <h3>Nom : {{ Auth::user()->name }}</h3>
      <h3>Email : {{ Auth::user()->email }}</h3>
@endsection