@extends('layouts.admin')


@section('title') Admin - 管理者用のコメントページ @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Admin Comments (管理者用のコメントページ)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">

                        @if ( count($comments) > 0 )

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
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td class="text-nowrap"><a href="{{ route('singlePost', $comment->id) }}">{{ $comment->post->title }}</a></td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteCommentModal-{{ $comment->id }}">削 除 する</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                            {{ $comments->links() }}
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($comments as $comment)
        <!-- Modal -->
        <div class="modal fade" id="deleteCommentModal-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">あなたは、『 {{ $comment->post->title }} 』"のコメントを削除しようとしています...</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                削除してもよろしいでしょうか？
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
                <form id="deleteComment-{{ $comment->id }}" action="{{ route('adminDeleteComment', $comment->id) }}" method="POST">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">&nbsp;は い&nbsp;</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach

@endsection
