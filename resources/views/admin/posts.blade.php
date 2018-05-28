@extends('layouts.admin')

@section('title') Admin Posts - 管理者の記事投稿ページ @endsection

@section('content')
    @section('content')
        <div class="content">
            <div class="card">
                <div class="card-header bg-light">
                    Admin Posts (投稿済み記事の一覧)
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title (記事タイトル)</th>
                                <th>Created at(投稿された日時)</th>
                                <th>Updated at (更新された日時)</th>
                                <th>Comments (コメント)</th>
                                <th>編集 / 削除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td class="text-nowrap"><a href="{{ route('singlePost', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                    <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                    <td>{{ $post->comments->count() }}</td>
                                    <td>
                                        <a href="{{ route('adminPostEdit', $post->id) }}" class="btn-warning btn">編 集</a>
                                        <form id="deletePost-{{ $post->id }}" action="{{ route('adminDeletePost', $post->id) }}" method="POST">
                                            {{ csrf_field() }}
                                        </form><br>
                                        <a href="#" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()" class="btn-danger btn">削 除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
