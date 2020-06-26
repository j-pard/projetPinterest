@extends('layouts.app')

@section('content')


      <div class="container">
            <h2>Ajouter un article</h2>
            <!-- Create Post Form -->
      <form action="/create" method="POST">
            {{-- Token for cross-site security --}}
            {{ csrf_field() }}
            <div class="form-group">
                  <label for="title">Titre</label>
                  <input type="text" name="title" id="title" placeholder="Titre de l'article">
            </div>

            <div class="form-group">
                  <label for="Image">Image URL</label>
                  <input type="text" name="image" id="image" placeholder="url image">
            </div>

            <div class="form-group">
                  <label for="Description">Description</label>
                  <input type="textarea" name="description" id="description" rows="20" cols="300" placeholder="Décrire votre article">
            </div>

            <input type="submit" value="Save">

      </form>
      </div>
      

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