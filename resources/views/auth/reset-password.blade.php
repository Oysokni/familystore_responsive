<?php
use App\Helpers\HelperFunc;
?>

@extends('layouts.auth')

@section('title', trans('auth.reset_password'))

@section('content')

<div class="height-20 mgb-50 bd-main"></div>

@if (isset($errorMessage) && $errorMessage)

<div class="wrapper">
    <div class="alert-panel alert-panel-danger">
        {{ $errorMessage }}
    </div>

    <p class="text-center">
        <a href="{{ route('auth.forget_pass') }}" class="link-btn link-btn-main link-btn-lg">パスワードの再発行</a>
    </p>
</div>

@else

@include('includes.messages')

<div class="mgb-30">

    <form method="post" action="{{ route('auth.post_reset_pass') }}">
        {!! csrf_field() !!}
        <div class="wrap-content wrap-content-login mgb-30">
            <div class="height-50"></div>
            <div class="row mgb-30">
                <div class="col-xs-3">ID（メールアドレス）</div>
                <div class="col-xs-9">{{ $email }}</div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <div class="mgt-10">パスワード</div>
                </div>
                <div class="col-xs-9">
                    <div class="form-group row mgb-20">
                        <?php
                        $errorPassword = HelperFunc::errorField('password');
                        ?>
                        <div class="col-xs-6">
                            <input type="password" name="password"
                                   class="form-field{{ $errorPassword ? ' field-error' : '' }}">
                            {!! $errorPassword !!}
                        </div>
                        <div class="form-label mgt-10 col-xs-6">※パスワードは8文字以上、英字+数字</div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <input type="password" name="password_confirmation"
                                   class="form-field{{ $errorPassword ? ' field-error' : '' }}">
                        </div>
                        <div class="form-label mgt-10 col-xs-6">※確認用として再度入力ください</div>
                    </div>
                </div>
            </div>
            <div class="height-50"></div>
        </div>
        <!--end wrapper-->

        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <input type="hidden" name="guid" value="{{ $guid }}">
                {!! HelperFunc::errorField('guid'); !!}
                <button class="action-btn action-btn-md btn-block minw-300">登録</button>
            </div>
        </div>
    </form>
    <!--end form-->
</div>
<div class="height-20 mgb-30 bd-main"></div>

@endif
<!--end box-->

@stop

