@extends('layouts.admin')

@section('title') Admin Posts - 管理者用の記事投稿ページ @endsection

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

                            @if ( count($posts) > 0 )

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
                                        <button class="btn-danger btn" data-toggle="modal" data-target="#deletePostModal-{{ $post->id }}">削 除</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                                {{ $posts->links() }}
                            @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($posts as $post)
            <!-- Modal -->
            <div class="modal fade" id="deletePostModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">あなたは、『 {{ $post->title }} 』"の記事を削除しようとしています...</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    削除してもよろしいでしょうか？
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
                    <form id="deletePost-{{ $post->id }}" action="{{ route('adminDeletePost', $post->id) }}" method="POST">
                        {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">&nbsp;は い&nbsp;</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        @endforeach

@endsection
