<?php
use Carbon\Carbon;
use App\Helpers\HelperFunc;
?>

@extends('layouts.auth')

@section('title', trans('auth.login_title'))

@section('content')

@include('includes.messages')

<div class="mgb-30">
    <div class="wrapper wrapper-login">

        <div class="row no-margin-row">
            <div class="col-md-6 col-sm-6 col-xs-12 login-col">
                <div class="wrap-content wrap-content-login">
                    <h2 class="box-title box-title-lg">はじめての方（会員登録を行う方はこちらから）</h2>
                    <p class="text-desc mgb-30">
                        初めてご利用の場合は会員登録してください。<br />
                        家族・招待者の登録にはLIXIL従業員が発行した招待コード
                        が必要です。招待コードを取得のうえ会員登録のお手続きを
                        行ってください。
                    </p>

                    <a href="{{ route('member.form.check.register') }}" class="btn-block action-btn action-btn-lg action-btn-main mgb-30">
                        <!--<i class="lxl-business"></i>-->
                        <i class="img-icon img-42-42 img-bussines"></i> LIXILグループ従業員の方
                    </a>

                    <a href="{{ route('register_family.accuracy_family') }}" class="btn-block action-btn action-btn-lg action-btn-family mgb-5">
                        <!--<i class="supervisor_account"></i>-->
                        <i class="img-icon img-60-40 img-members"></i> 従業員の家族・招待者の方
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 login-col">
                <div class="wrap-content">
                    <h2 class="box-title box-title-lg">ログイン（会員登録済みの方はこちらから）</h2>

                    <form class="login-form" method="post" action="{{ route('auth.post_login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group mgb-20">
                            <?php
                            $errorEmail = HelperFunc::errorField('email');
                            ?>
                            <p class="form-label">メールアドレス</p>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-field{{ $errorEmail ? ' field-error' : '' }}">
                            {!! $errorEmail !!}
                        </div>

                        <div class="form-group mgb-30">
                            <?php
                            $errorPassword = HelperFunc::errorField('password');
                            ?>
                            <p class="form-label">パスワード</p>
                            <input type="password" name="password" class="form-field{{ $errorPassword ? ' field-error' : '' }}">
                            {!! $errorPassword !!}
                        </div>

                        <div class="form-group mgb-20">
                            <button type="submit" class="btn-block action-btn action-btn-md action-btn-high">ログイン</button>
                        </div>

                        <div class="text-right">
                            <i class="lxl-icon-circle circle-high arrow_forward icon-left"></i>
                            <a href="{{ route('auth.forget_pass') }}" class="text-bold text-desc text-border">パスワードを忘れた方はこちら</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--end wrapper-->
</div>
<div class="height-20 mgb-30 bd-main"></div>
<!--end box-->

<div class="box-notify mgb-75">
    <h3 class="box-title mgb-8">お知らせ</h3>

    @if (!$notifyList->isEmpty())
    <table class="table table-note text-desc">
        @foreach($notifyList as $note)
        <tr>
            <td>
                <strong>{{ Carbon::parse($note->osirase_start_ymd)->format('Y/m/d') }}</strong>
            </td>
            <td>
                <p class="note-header"><strong>{{ $note->osirase_title }}</strong></p>
                <div class="note-content pre-line-space">{{ $note->osirase_message }}</div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</div>
<!--end box-->

@stop
