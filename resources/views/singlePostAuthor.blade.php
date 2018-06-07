@extends('layouts.master')

@section('title'){{ $singlePostAuthor . ' の記事一覧 | StartUpCMS - Blog',  ' | StartUpCMS - スタートアップのための軽くて速い堅牢なモダンスタイルCMS' }}@endsection

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/post-bg.jpg') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>{{ $singlePostAuthor . ' の記事一覧', ' | StartUpCMS - スタートアップのための軽くて速い堅牢なモダンスタイルCMS' }}</h1>
              <span class="subheading">Blog title powered by StartUpCMS</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach ($singlePostAuthor as $singlePostAuthors)
              <div class="post-preview">
                <a href="{{ route('singlePostAuthor', $singlePostAuthors->user->name) }}">
                  <h2 class="post-title">
                    {{ $singlePostAuthors->user->name }}
                  </h2>
                  <!--<h3 class="post-subtitle">
                    Problems look mighty small from 150 miles up
                </h3>-->
                </a>
                <p class="post-meta">Posted by
                  <a href="#">{{ $singlePostAuthors->user->name }}</a>
                  on &nbsp;{{ date_format($singlePostAuthors->created_at, 'Y年 m月 d日 (D)') }}&nbsp;
                  | &nbsp;<i class="fa fa-comment" aria-hidden="true"></i>&nbsp;{{ $singlePostAuthors->comments->count() }}
                </p>
              </div>
              <hr>
          @endforeach

          @foreach($tasklists as $tasklist)
                        <tr>
                            <td>{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!}</td>
                            <td>{{ $tasklist->status }}</td>
                            <td>{{ $tasklist->content }}</td>
                        </tr>
                        @endforeach

          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>
@endsection
