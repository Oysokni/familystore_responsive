<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>@yield('title', 'Lixil')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if lte IE 9]><div id="system" class="ie9"></div><![endif]-->
        <link rel="shorcut icon" type="image/x-ico" href="{{ asset('images/icons/favicon.ico')}}">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/lxl-font.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive/home_page.css">
        <link rel="stylesheet" href="/css/responsive/allpage.css">
        <link rel="stylesheet" href="/css/responsive/reform.css">
        <link rel="stylesheet" href="/css/responsive/menu.css">
        <link rel="stylesheet" href="/css/responsive/builder.css">
        <link rel="stylesheet" href="/css/responsive/search.css">
        <link rel="stylesheet" href="/css/responsive/code-invite.css">

        <script src="/js/jquery-1.9.1.min.js"></script>
        @yield('head')
        @include('includes.embed-head')
    </head>
    <body class="@yield('body_class')">
        @include('includes.embed-body')
        <header>
            <div class="container">
                <div class="row row-header">
                    <div class="col-sm-4 col-md-5 col-xs-10 logo-col">
                        <a href="{{ route('page.top_page') }}" class="logo">
                            <img class="logo-img" src="/images/logo.png" alt="Lixil" title="Lixil">
                        </a>
                        <h1 class="logo-title">
                            <span>LIXIL Family STORE</span>
                            @if (!isset($hideLogout) && auth()->check())
                            <a href="{{ route('auth.logout') }}" class="account-area link-btn link-btn-main">ログアウト <i class="lxl-icon lxl-logout"></i></a>
                            @endif
                        </h1>
                    </div>                    
                        <button type="button" class="navbar-toggle collapsed" id="nav-bar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <!--end logo col-->
                    <div class="col-sm-8 col-md-7 col-xs-12 menu-col">
                        @yield('menu', LxMenu::render())
                    </div>
                    <!--end menu col-->
                </div>
                 <!-- sp menu -->
        </div>
    </header>
        <!--end header-->
        <section id="body_content">

            @yield('top_page')

            <div class="container">

                @yield('breadcrumb')
                <!--end breadcrumb-->

                @yield('content')

                <div class="row content-row">
                    <div class="col-md-9 col-sm-9 col-xs-12 content-col">

                        @yield('content-col')

                    </div>
                    <!--end content col-->
                    {{-- <div class="col-xs-12 content-col">
                        
                        @yield('content-col')

                    </div> --}}

                    <div class="col-md-3 col-sm-3 col-xs-12 sidebar-col">

                        @yield('sidebar-col')

                    </div>
                    <!--end sidebar col-->
                </div>
                @yield('foot_content')
            </div>
        </section>
        <!--end main content-->
        @include('includes.footer')
        @yield('footer')
        <script>
        $('#nav-bar').on('click', function() {
            $('ul#top-nav').toggleClass('show');
            
        });
        </script>
    </body>
</html>
