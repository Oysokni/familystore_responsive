@extends('layouts.auth')

@section('title', trans('page.member_register'))

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('body_class', 'no-border-header')

@section('content')
<div class="register-member">
     <div class="body-header">
        <div class="logo-title">
            会員登録（LIXILグループ従業員の方）
        </div>
    </div>
    <div class="mgb-10 boder-header"></div>
     <div class="text-right bread">
    </div>
    <div class="steps row">
        <div class="list-steps col-xs-10 col-xs-offset-2 mgl-80">
            <div class="col-xs-4 ">
                <span>1</span>
                <span>会員情報入力</span>
            </div>
            <div class="col-xs-4">
                <span>2</span>
                <span>入力内容確認</span>
            </div>
            <div class="col-xs-4 active">
                <span>3</span>
                <span>会員登録完了</span>
            </div>
        </div>
    </div>
    <div class="thanks-content">
        <div class="container">
            <h3><b>会員登録申請完了</b></h3>
            <div class="col-xs-12">
                <p><b>LIXIL Family STORE</b> 会員登録申請ありがとうございます。</p>
                <p>※まだ登録は完了しておりません。</p>

                <p>本登録用の<b>URL</b>を記載したメールをお送りいたしましたので、そちらから本登録をお願い致します。</p>
                <div class="">
                    <div>【会員登録用のメールが届かない場合】</div>
                    <p><label class="circle"></label><b>LIXIL Family STORE</b> からのメールが受信フォルダではなく、ゴミ箱、迷惑メールフォルダ等に届くことがございます。</p>
                    <p>本登録用のメールが見当たらない場合には、ごみ箱や迷惑メールフォルダーもご確認ください</p>
                    <p><label class="circle "></label>ドメイン指定受信を設定されている場合に、メールが正しく届かないことがございます。以下のドメインを受信できるように設定してください。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mgb-10 boder-footer"></div>
    <div class="thanks-footer">
        <div class="container">
            <div class="footer-btn col-xs-4 col-xs-offset-4">
                <div class="form-group mgb-20">
                    <a href="{{ route('auth.login') }}">
                        <button type="button" class="btn-block action-btn action-btn-md action-btn-gray ac-btn-background" >ログイン画面へ戻る</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end box-->
@endsection
