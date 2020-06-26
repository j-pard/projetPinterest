@extends('layouts.app')

@section('content')
      <section class="container">

  
      <div class="coverimage">
            <img src="{{ Auth::user()->cover }}"  alt="User cover">
          </div>
  
<div class="row profilavatar">

                  
            <div class="avatar">
                  <img src="{{ Auth::user()->avatar }}"  alt="User avatar">
            </div>    
            
            

            <div class="username">
                  <blockquote>
                  <h3>{{ Auth::user()->pseudo }}</h3>
                  <small><cite title="name">{{ Auth::user()->firstname }}</cite></small>
                  </blockquote>
            </div>
            </div>
      

      {{-- Following list --}}

      <div class="following">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#myModal">Following</button>
          
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title text-left">List of following</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <ul>
                              @php
                                    
                                    $follows = DB::table('user_follower')
                                          ->join('users', 'user_follower.following_id', '=', 'users.id')
                                          ->select('users.pseudo')
                                          ->get();
                              @endphp
                              @foreach ($follows as $follow)
                                    <li>
                                          {{$follow->pseudo}}
                                    </li>
                              @endforeach
                        </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
            </div>
            
          </div>

      </section>

      <section class="container ">
            <div class="gallery" id="gallery">

            @php
                  $collection = DB::table('articles')->where('author', Auth::user()->id)->get();
            @endphp
             
            @foreach ($collection as $article)
            <div class="mb-3 pics animation all 1">
                  <a href="/show/{{ $article->id }}">
                      <img class="img-fluid" src = "{{$article->image}}" alt="{{$article->title}}">
                  </a>
            </div>
            @endforeach
            </div>
      </section>
@endsection