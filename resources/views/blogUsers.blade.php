@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/5.jpg') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
                <!--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>-->
              <h1>{{ $postss }}</h1>
              <span class="subheading">List of articles</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            @foreach ($posts as $post)
                @if ($post->user->name == $postss)
                    <div class="post-preview">
                      <a href="{{ route('singlePost', $post->id) }}">
                        <h2 class="post-title">
                          {{ $post->title }}
                        </h2>
                        <!--<h3 class="post-subtitle">
                          Problems look mighty small from 150 miles up
                        </h3>-->
                      </a>
                      <p class="post-meta">Posted by
                        <a href="{{ route('blogUsers', $post->user->name ) }}">{{ $post->user->name }}</a>
                        on &nbsp;{{ date_format($post->created_at, 'Y年 m月 d日 (D)') }}&nbsp;
                        | &nbsp;<i class="fa fa-comment" aria-hidden="true"></i>&nbsp;{{ $post->comments->count() }}
                      </p>
                    </div>
                <hr>
                @endif
            @endforeach

            <!-- Pager -->
            <div class="clearfix">
              <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
      </div>
    </div>
@endsection
