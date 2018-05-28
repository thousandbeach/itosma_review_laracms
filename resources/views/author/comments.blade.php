@extends('layouts.admin')


@section('title') Author Comments - 記事投稿者のコメント @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Author Comments (記事投稿者のコメント)
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (Auth::user()->comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td class="text-nowrap"><a href="{{ route('singlePost', $comment->id) }}">{{ $comment->post->title }}</a></td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
