<?php
use Carbon\Carbon;
use App\Helpers\HelperFunc;
use App\Helpers\ViewConst;

$currentUser = Auth::user();
?>
@extends('layouts.front')

@section('title')
    {{ trans('page.cart_register') }}
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('css/cart/style.css') }}">
@endsection

@section('content')

<div class="cart-register-product">

    <div class="body_content">
        <h3 class="mgb-10">お申し込み</h3>
        <div class="bd-2px"></div>
        <div class="form-content">
            <form action="{{ route('cart.register') }}" method="post">
                {!! csrf_field() !!}

                @include('cart.includes.fields-confirm')

                @include('cart.includes.registed-products')

                <div class="height-20"></div>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{ route('cart.back.register') }}" class="text-bold">
                            <i class="lxl-icon-circle circle-high arrow_back icon-right"></i>
                            <span>カートに戻る</span>
                        </a>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="button" class="btn" id="third_button" onclick="submitForm(this);">申し込む </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="/js/cart/register.js" charset="UTF-8"></script>
    <script>
        function submitForm(btn) {
            btn.disabled = true;
            btn.form.submit();
        }
    </script>
@endsection
