


@extends('layouts.app')

@section('content')


      <h2>Edité article {{ $article->title }}</h2>



      <!-- Create Post Form -->
      <form action="/edit/{{ $article->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="text" name="title" id="title" placeholder="Titre de l'article">
            <input type="textarea" name="description" id="description" rows="5" cols="30" placeholder="Décrire votre article">
            <input type="submit" value="Save">
      </form>
      
      <!-- Erros Handling -->
      @if ($errors->any())
      <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
      @endif

@endsection