@extends('layouts.auth')

@section('title', trans('auth.reset_password'))

@section('content')

<h2 class="page-title title-border">パスワードの再設定　完了</h2>

<div class="wrapper">
    <div class="text-center mgb-50">
        <h3>登録完了いたしました。ありがとうございます</h3>
        <p>ログイン画面より、メールアドレス・パスワードを入力し、ログインすることができます。</p>
    </div>
    <div class="text-center mgb-50">
        <a href="{{ route('auth.login') }}" class="link-btn link-btn-main link-btn-lg">ログイン画面へ</a>
    </div>
</div>

@stop

