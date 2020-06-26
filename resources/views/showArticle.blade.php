@extends('layouts.app')

@section('content')


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
                        @if(Auth::user()->id == $article->author)
                        <div class="float-right">
                            <a href="/edit/{{ $article->id }}" class="btn btn-flat btn-flat-icon" role="button"><em class="fa fa-cog"></em></a>
                        </div>
                        @endif
                        <div class="media m-0">
                            <div class="d-flex mr-3">
                                <a href=""><img class="img-fluid rounded-circle" src="/{{ $author_avatar }}"
                                        alt="User"></a>
                            </div>
                            <div class="media-body">
                                <p class="m-0">{{ $author }}</p>

                                {{-- Follow --}}
                                @php
                                    $isFollowed = DB::table('user_follower')
                                        ->where('follower_id', Auth::user()->id)
                                        ->where('following_id', $author_id)
                                        ->exists();

                                    if($isFollowed) {
                                        $btnValue = "Unfollow";
                                    }
                                    else {
                                        $btnValue = "Follow"; 
                                    }
                                @endphp

                                <form action="/followers/{{ $author_id }}" method="GET">
                                    <input readonly class="d-none" type="number" name="author_id" value="{{ $author_id }}">
                                    <input type="submit" value="{{ $btnValue }}">
                                </form>


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
