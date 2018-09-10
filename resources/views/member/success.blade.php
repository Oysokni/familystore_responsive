@extends('layouts.auth')

@section('title')

{{ trans('page.member_register') }}

@endsection

@section('body_class', 'no-border-header')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="success-member">
    <div class="body-header">
        <div class="logo-title">
            従業員　会員登録
        </div>
    </div>
    <div class="bd-main"></div>

    <div class="row content-row">
        <div class="content-col mgl-35">
            <div class="content-text text-center">
                <p>登録完了いたしました。ありがとうございます</p>
                <p>TOPページより、メールアドレス・パスワードを入力し、ログインすることができます。</p>
            </div>
        </div>
        <!--end content col-->
    </div>

    <div class="row content-row area-button">
        <div class="content-col mgl-35 text-center">
            <a href="{{ route('auth.login') }}">
                <button type="button" id="btn-submit" class="btn-block action-btn action-btn-md action-btn-gray">ログイン画面へ</button>
            </a>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
