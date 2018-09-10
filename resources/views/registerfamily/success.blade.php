@extends('layouts.auth')

@section('title')

{{ trans('page.family_login') }}

@endsection

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
        <div class="content-col">
            <div class="content-text text-center">
                <p>登録完了いたしました。ありがとうございます</p>
                <p>TOPページより、メールアドレス・パスワードを入力し、ログインすることができます。</p>
            </div>
        </div>
        <!--end content col-->
    </div>

    <div class="row content-row area-button">
        <div class="content-col text-center">
             <a href="{{ route('auth.login')}}"><button type="button" id="btn-submit" class="btn " >ログイン画面へ戻る</button></a>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
