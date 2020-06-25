@extends('layouts.app')

@section('content')
<!-- <div class="container">

                @if(Auth::user()->id == $article->author)
                    <a href="/edit/{{ $article->id }}" class="btn btn-info" role="button">Modifier article</a>
                @endif

        <h2>{{ $article->title }}</h2>
        <ul>
            <li><strong>{{ $article->author }}</strong></li>
            <li>{{$article->date}}</li>
            <li><img src = "{{$article->image}}"></li>
            <li>{{$article->description}}</li>
        </ul>

    </div> -->

@php
$author = DB::table('users')->where('id', $article->author)->value('pseudo');
$author_id = DB::table('users')->where('id', $article->author)->value('id');

$author_avatar = DB::table('users')->where('id', $article->author)->value('avatar');

$originalDate = $article->updated_at;
$newDate = date("d-m-Y", strtotime($originalDate));
@endphp

<section class="hero">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 offset-lg-3">

                <div class="cardbox shadow-lg bg-white">

                    <div class="cardbox-heading">
                        <div class="float-right">
                            <a href="/edit/{{ $article->id }}" class="btn btn-flat btn-flat-icon" role="button"><em class="fa fa-ellipsis-h"></em></a>
                        </div>
                        <div class="media m-0">
                            <div class="d-flex mr-3">
                                <a href=""><img class="img-fluid rounded-circle" src="/{{ $author_avatar }}"
                                        alt="User"></a>
                            </div>
                            <div class="media-body">
                                <p class="m-0">{{ $author }}</p>
                                <small><span><i class="icon ion-md-time"></i> {{$newDate}}</span></small>
                                <small><span><i class="icon ion-md-time"></i> {{$article->title}}</span></small>
                            </div>
                        </div>
                        <!--/ media -->
                    </div>
                    <!--/ cardbox-heading -->

                    <div class="cardbox-item">
                        <img class="img-fluid" src="{{$article->image}}" alt="{{$article->title}}">
                    </div>
                    <!--/ cardbox-item -->
                    <div class="cardbox-base">
                        <div class="media m-0">
                            <div class="media-body">
                            <p class="m-0">{{$article->description}}</p>
                        </div>
                        </div>
                    </div>
                    <!--/ cardbox-base -->
                </div>
                <!--/ cardbox -->
            </div>
            <!--/ col-lg-6 -->
        </div>
        <!--/ row -->
    </div>
    <!--/ container -->
</section>
@endsection
