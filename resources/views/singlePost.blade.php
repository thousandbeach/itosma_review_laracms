@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/post-bg.jpg') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{ $post->title }}</h1>
              <!--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>-->
              <span class="meta">Posted by
                <a href="#">{{ $post->user->name }}</a>
                on &nbsp;{{ date_format($post->created_at, 'Y年 m月 d日 (D)') }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!! nl2br($post->content) !!}
          </div>
        </div>

        <div class="comments">
            <hr>
            <h2>Comments</h2>
            <hr>
            @foreach ($post->comments as $comment)
            <p>{{ $comment->content }}<br></p>
            <p><small>by {{ $comment->user->name }}, on &nbsp;{{ date_format($post->created_at, 'Y年 m月 d日 (D)') }}</small></p>
            @endforeach
            <hr>
        </div>

      </div>
    </article>
@endsection
