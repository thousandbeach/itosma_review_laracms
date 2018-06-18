@extends('layouts.admin')

@section('title') Admin - 管理者用のダッシュボード @endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">



                <div class="col-md-12">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ Auth::user()->postsToday->count() }}</span>
                                <span class="font-weight-light">The number of inquiries &nbsp;&nbsp;(すべてのお問合わせ件数)</span>
                            </div>
                            <div class="h2 text-muted">
                                <button class="btn btn-primary">お問合わせ内容を確認する</button>
                            </div>
                            <div class="h2 text-muted">
                                <i class="icon icon-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ \App\Post::all()->count() }}</span>
                                <span class="font-weight-light">Posts<br>(すべての記事投稿数)</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-paper-clip"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ \App\Comment::all()->count() }}</span>
                                <span class="font-weight-light">Comments<br>(全期間の記事コメント数)</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ \App\User::all()->count() }}</span>
                                <span class="font-weight-light">Users<br>(すべてのユーザー数)</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Posts by day
                        </div>
                        <div class="card-body p-0">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $chart->script() !!}

@endsection
