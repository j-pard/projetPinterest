@extends('layouts.app')

@section('content')

<div class="container">
      <h1>Modifier votre profil</h1>
          <hr>
        <div class="row">
        <!-- left column -->
        <div class="col-md-3">
          <div class="avataredith">
            <img src="{{ Auth::user()->avatar }}"  alt="User avatar">
            <hr>
            <button type="submit" class="btn btn-secondary"><a href="/image-upload">Changer photo de profil</a></button>
            <button type="submit" class="btn btn-secondary"><a href="/cover-upload">Changer photo de couverture</a></button>

          </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
      
<form action="/profil/update" method="POST">
      {{-- Token for cross-site security --}}
      {{ csrf_field() }}
      {{ method_field('PATCH') }}

      <input type="number" name="id" readonly class="d-none" value="{{ Auth::user()->id }}">

      <div class="form-group">
        <label for="profil-pseudo-edit">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="profil-pseudo-edit" placeholder="Enter your pseudo" value="{{ Auth::user()->pseudo }}">
      </div>

      <div class="form-group">
            <label for="profil-firstname-edit">Prénom</label>
            <input type="text" name="firstname" class="form-control" id="profil-firstname-edit" placeholder="Enter your firstname" value="{{ Auth::user()->firstname }}">
      </div>

      <div class="form-group">
            <label for="profil-lastname-edit">Nom</label>
            <input type="text" name="lastname" class="form-control" id="profil-lastname-edit" placeholder="Enter your lastname" value="{{ Auth::user()->lastname }}">
      </div>

      <div class="form-group">
            <label for="profil-mail-edit">Email</label>
            <input type="email" name="email" class="form-control" id="profil-mail-edit" placeholder="Email" value="{{ Auth::user()->email }}">
      </div>
     
      <button type="submit" class="btn btn-secondary">Modifier</button>
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