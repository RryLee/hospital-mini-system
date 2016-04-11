<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | xx门诊收费管理</title>

    <!-- Fonts -->
    <link href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    @yield('style')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    xx门诊
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">首页</a></li>
                    <li><a href="{{ route('doctors.index') }}">找大夫</a></li>
                    <li><a href="{{ route('departments.index') }}">按专科</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登陆</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-btn fa-cog fa-dashboard fa-fw"></i> 后台管理</a></li>
                                <li><a href="{{ route('me') }}"><i class="fa fa-btn fa-cog fa-fw"></i> 个人中心</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out fa-fw"></i>安全退出</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @include('errors.list')

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @include('flashy::message')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
