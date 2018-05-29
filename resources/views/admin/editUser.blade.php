@extends('layouts.admin')

@section('title') EditUser 管理者用のユーザー情報編集ページ {{ $user->name }} @endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Editing &nbsp;(ユーザー情報の編集) &nbsp;ユーザー名：  {{ $user->name }}
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('adminEditUserPost', $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label">Name (お名前)</label>
                                        <input name="name" id="normal-input" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label">Email (メールアドレス)</label>
                                        <input name="email" type="email" id="normal-input" class="form-control" value="{{ $user->email }}"><br><br>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label">Permissions (閲覧 / 編集権限)</label><br><br>
                                        <p><input type="checkbox" class="form-control" name="author" value=1 {{ $user->author == true ? 'checked' : '' }}> Author (記事投稿者)</p><br>
                                        <p><input type="checkbox" class="form-control" name="admin" value=1 {{ $user->admin == true ? 'checked' : '' }}> Admin (管理者)</p><br>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" name="button" class="btn btn-success">ユーザー情報を更新する</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
