@extends('layouts.admin')

@section('title') New post - 新規記事投稿 @endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            New Post (新規記事の投稿)
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

                        <form class="" action="{{ route('createPost') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label">Title (記事タイトル)</label>
                                        <input name="title" id="normal-input" class="form-control" placeholder="Post title (記事のタイトルを書きましょう：180文字以内)">
                                    </div>
                                </div>


                            </div>

                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="placeholder-input" class="form-control-label">Content (記事内容)</label>
                                        <textarea class="form-control" name="content" rows="10" cols="30" placeholder="Post content (投稿する記事の内容)"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="button" class="btn btn-success">記事を投稿する</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
