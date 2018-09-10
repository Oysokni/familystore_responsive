<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>@yield('title', 'page')</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shorcut icon" type="image/x-ico" href="{{ asset('images/icons/favicon.ico')}}">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/lxl-font.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive/login.css">
        <link rel="stylesheet" href="/css/responsive/allpage.css">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="/js/jquery-1.9.1.min.js"></script>
        @yield('head')
        @include('includes.embed-head')
    </head>
    <body class="no-border-header">

        @include('includes.embed-body')
        <header>
            <div class="container">
                <div class="row row-header">
                    <div class="col-md-10 col-sm-10 col-xs-12 logo-col">
                        <a href="{{ route('auth.login') }}" class="logo">
                            <img class="logo-img" src="/images/logo.png" alt="Lixil" title="Lixil">
                        </a>
                        <h1 class="logo-title">
                            <span>LIXIL Family STORE</span>
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <!--end header-->

        <section id="body_content">
            <div class="container">

                @yield('content')

            </div>
        </section>
        <!--end main content-->

        <!--end footer-->
        @include('includes.footer')
        
        @yield('footer')

    </body>
</html>
