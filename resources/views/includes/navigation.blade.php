<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">StartUpCMS</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">ホーム</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">私たちについて</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">お問い合わせ</a>
        </li>

        @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" rel="nofollow" href="{{ route('dashboard') }}">ダッシュボード</a>
            </li>
            <li class="nav-item">
                <form id="logout-form" name="dashboard_form" action="{{ route('logout') }}" method="post">{{ csrf_field() }}
                </form>
                <a class="nav-link" onclick="document.getElementById('logout-form').submit();" href="#">ログアウト</a>
            </li>
        @else
            <li class="nav-item">
              <a class="nav-link" rel="nofollow" href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" rel="nofollow" href="{{ route('register') }}">サインアップ</a>
            </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
