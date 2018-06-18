@extends('layouts.master')

@section('title'){{ $post->title . ' | StartUpCMS - Blog', ' | StartUpCMS - スタートアップのための軽くて速い堅牢なモダンスタイルCMS' }}@endsection

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
                <a href="{{ route('blogUsers', $post->user->name) }}">{{ $post->user->name }}</a>
                on &nbsp;{{ date_format($post->created_at, 'Y年 m月 d日 (D)') }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">

          @if (Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif

          @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      {{ $error }}
                  </div>
              @endforeach
          @endif
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

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if (Auth::check())
                <form action="{{ route('newComment') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="4" cols="30" placeholder="コメントを書く..." ></textarea>
                        <input type="hidden" name="post" value="{{ $post->id }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">コメントを投稿する</button>
                    </div>
                </form>
            @else
                <div class="text-center"><br>
                  <ul>
                      <p>あなたもサインアップしてコメントしてみませんか？ &nbsp;&nbsp;<a class="btn btn-primary" rel="nofollow" href="{{ route('register') }}">サインアップ</a></p>
                      <p>すでにアカウントを持っている方は &nbsp;&nbsp;<a rel="nofollow" href="{{ route('login') }}">ログイン</a></p><br>
                </ul>
                </div>
            @endif


        </div>

      </div>
    </article>
@endsection
