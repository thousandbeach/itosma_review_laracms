@extends('layouts.auth')

@section('title')
    ログイン
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        ログイン
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label control-label" for="email">メールアドレス</label>
                                <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' has-error text-danger' : '' }}" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="password">パスワード</label>
                                <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' has-error text-danger' : '' }}" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="custom-control custom-checkbox mt-4">
                                <input type="checkbox" class="custom-control-input" name="remember" id="login" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="login">Remember Me</label>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-5">ログイン</button>
                                </div>

                                <div class="col-6">
                                    <a rel="nofollow" href="{{ route('password.request') }}" class="btn btn-link">パス忘れちゃった？</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
