@extends('layouts.auth')

@section('title', trans('auth.forget_password'))

@section('content')

<h2 class="page-title title-border">送信完了</h2>

<div class="wrapper">
    <div class="height-50"></div>
    <div class="text-center mgb-50">
        <p>{{ $email }}へパスワード再発行のメールを送信いたしました。</p>
    </div>
    <div class="text-center">
        <a href="{{ route('auth.login') }}" class="link-btn link-btn-main link-btn-lg">ログイン画面へ戻る</a>
    </div>
    <div class="height-20"></div>
</div>

@stop

