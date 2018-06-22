@extends('layouts.admin')

@section('title') Admin - 管理者用のお問合わせ内容閲覧ページ @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                お問合わせ内容閲覧ページ
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">

                        @if ( count($messages) > 0 )

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name (お名前)</th>
                            <th>Email (メールアドレス)</th>
                            <th>Message (メッセージ)</th>
                            <th>Created at (送信された日時)</th>
                            <th>Action (削除)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td class="text-nowrap">{{ $message->name }} 様</td>
                                <td class="">{{ $message->email }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMessageModal-{{ $message->id }}">削 除 する</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                            {{ $messages->links('vendor.pagination.bootstrap-4') }}
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($messages as $message)
        <!-- Modal -->
        <div class="modal fade" id="deleteMessageModal-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">あなたは、ID『 {{ $message->id }} 』の『 {{ $message->name }} 』様よりいただいたお問合わせ内容を削除しようとしています...</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                削除してもよろしいでしょうか？
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
                <form id="deleteMessage-{{ $message->id }}" action="{{ route('adminDeleteMessage', $message->id) }}" method="POST">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">&nbsp;は い&nbsp;</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach

@endsection
