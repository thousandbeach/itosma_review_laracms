<nav class="navbar page-header">
    <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
        <i class="fa fa-bars"></i>
    </a>

    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('admin/assets/imgs/logo.png') }}" alt="logo">
    </a>

    <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-bars"></i>
    </a>

    <ul class="navbar-nav ml-auto">

        @if (Auth::user()->author == true)
            <a class="btn btn-primary" href="{{ route('newPost') }}" name="button">新しい記事を書く</a>&nbsp;&nbsp;
        @endif
        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img src="{{ asset('admin/assets/imgs/avatar-1.png') }}" class="avatar avatar-sm" alt="logo">
                <span class="small ml-1 d-md-down-none">{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">アカウント</div>

                <a href="{{ route('userProfile') }}" class="dropdown-item">
                    <i class="fa fa-user"></i> プロフィール
                </a>

                <!-- 使用しないのでコメントアウト
                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope"></i> Messages
                </a>

                <div class="dropdown-header">Settings</div>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-bell"></i> Notifications
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-wrench"></i> Settings
                </a>
                -->

                <form id="logout-form" name="dashboard_form" action="{{ route('logout') }}" method="post">{{ csrf_field() }}
                </form>
                <a href="#" class="dropdown-item" onclick="document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> ログアウト
                </a>
            </div>
        </li>
    </ul>
</nav>
