<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title')</title>
    <link rel="shorcut icon" type="image/x-ico" href="{{ asset('images/icons/favicon.ico')}}">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <!--<link rel="stylesheet" href="{{asset("css/style.css") }}">-->
    <link rel="stylesheet" href="{{asset('/css/lxl-font.css')}}">

    <script src="/js/jquery-1.9.1.min.js"></script>

    <!-- Add more css -->
    <link rel="stylesheet" href="/css/style_layout_building.css">
    @yield('style')

    @include('includes.embed-head')
</head>
<body>
    @include('includes.embed-body')
    <header>
        <div class="container">
            <div class="row row-header">
                <div class="col-xs-4 logo-col">
                    <a href="{{ route('page.top_page') }}" class="logo">
                        <img class="logo-img" src="/images/logo.png" alt="Lixil" title="Lixil">
                    </a>
                    <h1 class="logo-title">
                        <span>LIXIL Family STORE</span>
                    </h1>
                    <h2 class="name_application">
                        <span>住宅購入・紹介 お申込み</span>
                    </h2>
                </div>
                <div class="col-xs-8 text-header">
                    <div class="red_color">ご注意）</div>
                    <div>アルバイトを除く、LIXIL会員であれば、住宅購入･紹介のお申込みが可能です。</div>
                    <div class="red_color">但し、パート社員の方の、本人の住宅購入の案件のお申込みは、２０１８年４月以降に可能となります。</div>
                    <div class="red_color">現時点では、お申込みできませんので、ご注意ください。</div>
                </div>

            </div>
        </div>
    </header>
    <!--end header-->

    <section id="body_content">@yield('content')</section>
    <!--end main content-->

    @include('includes.footer')
    @yield('javascript')
</body>
</html>