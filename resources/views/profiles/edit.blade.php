@extends('layouts.app')

@section('content')
      
<form action="/profil/update" method="POST">
      {{-- Token for cross-site security --}}
      {{ csrf_field() }}
      {{ method_field('PATCH') }}

      <input type="number" name="id" readonly class="d-none" value="{{ Auth::user()->id }}">
      <div class="form-group">
        <label for="profil-name-edit">Pseudo</label>
        <input type="text" name="name" class="form-control" id="profil-name-edit" placeholder="Enter your pseudo" value="{{ Auth::user()->name }}">
      </div>
      <div class="form-group">
        <label for="profil-password-edit">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="profil-password-edit" placeholder="Mot de passe" value="{{ Auth::user()->password }}">
      </div>
      <div class="form-group">
            <label for="profil-mail-edit">Email</label>
            <input type="email" name="email" class="form-control" id="profil-mail-edit" placeholder="Email" value="{{ Auth::user()->email }}">
      </div>
     
      <button type="submit" class="btn btn-primary">Modifier</button>
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