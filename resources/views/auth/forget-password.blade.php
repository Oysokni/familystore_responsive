<?php
use App\Helpers\HelperFunc;
?>

@extends('layouts.auth')

@section('title', trans('auth.forget_password'))

@section('content')

<div class="height-20 mgb-50 bd-main"></div>

@include('includes.messages')

<div class="mgb-30">
    <form method="post" action="{{ route('auth.post_forget_pass') }}">
        {!! csrf_field() !!}
        <div class="wrap-content wrap-content-login mgb-30">
            <div class="height-20"></div>
            <div class="row">
                <div class="col-xs-3 text-center mgt-10">メールアドレス</div>
                <div class="col-xs-6">
                    <?php
                    $errorEmail = HelperFunc::errorField('email');
                    ?>
                    <input type="text" value="{{ old('email') }}" name="email"
                           class="form-field{{ $errorEmail ? ' field-error' : '' }}">
                    {!! $errorEmail !!}
                </div>
                <div class="col-xs-3 mgt-10">※半角英数字</div>
            </div>
            <div class="height-20"></div>
        </div>
        <!--end wrapper-->
        
        <div class="text-center">
            <button class="action-btn action-btn-md action-btn-high minw-300">次に進む</button>
        </div>
    </form>
    <!--end form-->
</div>
<div class="height-20 mgb-30 bd-main"></div>
<!--end box-->

@stop
