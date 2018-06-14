@extends('layouts.admin')


@section('title') Admin - 管理者用の全アカウント管理ページ @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Admin Users (管理者用の全アカウント管理ページ)
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">

                        @if ( count($users) > 0 )

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name (お名前)</th>
                            <th>Email (メールアドレス)</th>
                            <th>Posts (投稿済みの記事数)</th>
                            <th>Comments (投稿されたコメント数)</th>
                            <th>Created at (投稿した日時)</th>
                            <th>Updated at (更新した日時)</th>
                            <th>Action (編集 / 削除)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="text-nowrap">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->posts->count() }}</td>
                                <td>{{ $user->comments->count() }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('adminEditUser', $user->id) }}">編 集</a>
                                    <form id="deleteUser-{{ $user->id }}" action="{{ route('adminDeleteUser', $user->id) }}" method="POST">{{ csrf_field() }}</form><br>
                                        <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteUser-{{ $user->id }}').submit();">削 除</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                            {{ $users->links('vendor.pagination.bootstrap-4') }}
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
