@extends('layouts.master')

@section('title'){{'Contact Me - お問い合わせ | StartUpCMS - Blog', ' | StartUpCMS - スタートアップのための軽くて速い堅牢なモダンスタイルCMS' }}@endsection

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/contact-bg.jpg') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Contact US</h1>
              <span class="subheading">Have questions? I have answers.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h4>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</h4>
          <p>48時間以内に必ずご返信させていただきます。</p><br>

          @if (Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif

          @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      {{ $error }}
                  </div>
              @endforeach
          @endif

          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" method="POST" action="{{ route('contact') }}" id="contactForm" novalidate>
              {{ csrf_field() }}
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label for="name">お名前 必須</label>
                <input type="text" class="form-control" placeholder="お名前" name="name" id="name" required data-validation-required-message="お名前のご入力をお願いいたします。">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label for="email">メールアドレス 必須</label>
                <input type="email" class="form-control" name="email" placeholder="メールアドレス" id="email" required data-validation-required-message="メールアドレスのご入力をお願いいたします。">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <!--<div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
          </div>-->
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label for="message">メッセージ 必須</label>
                <textarea rows="5" class="form-control" name="message" placeholder="メッセージ" id="message" required data-validation-required-message="メッセージのご入力をお願いいたします。"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
                <div class="form-group">
                    <div class="custom-control custom-checkbox mt-4">
                        <p><input type="checkbox" name="agree_register" id="agree_register" autocomplete="off" class="custom-control-input" required data-validation-required-message="弊社プライバシーポリシーの閲覧及び同意をお願い申し上げます。">
                        <label class="custom-control-label text-decoration" for="agree_register"><a href="{{ route('privacy') }}">プライバシーポリシー</a>に同意する</label></p>
                    </div>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">送 信</button>
            </div><br>
          </form>

          @if (Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif

          @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      {{ $error }}
                  </div>
              @endforeach
          @endif

        </div>
      </div>
    </div>
@endsection
