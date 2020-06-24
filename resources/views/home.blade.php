@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

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