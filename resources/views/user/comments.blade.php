@extends('layouts.admin')


@section('title') User Comments @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                User Comments
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post (掲載先記事タイトル)</th>
                            <th>Content (コメント内容)</th>
                            <th>Created at (投稿された日時)</th>
                            <th>Action (削除)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (Auth::user()->comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td class="text-nowrap"><a href="{{ route('singlePost', $comment->id) }}">{{ $comment->post->title }}</a></td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                                <td>
                                    <form id="deleteComment-{{ $comment->id }}" action="{{ route('deleteComment', $comment->id) }}" method="POST">{{ csrf_field() }}</form>
                                        <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit();">削 除 する</button>
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
