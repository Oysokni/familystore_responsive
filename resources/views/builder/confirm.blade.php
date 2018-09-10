<?php
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;
?>

@extends('layouts.layout_building')

@section('title')
   {{ trans('builder.builder_register')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('/css/building/style.css')}}">
@endsection

@section('content')
<div class="container body_content">

    <div class="row title_primary">
        <div class="col-xs-9">
            <h3>
                <span>●お申し込み者情報</span>
            </h3>
        </div>
        <div class="col-xs-3 xil_date">
            <span>お申込み日　：　{{ date("Y.m.d", time()) }}</span>
        </div>
    </div>

    @include('builder.includes.fields-confirm', ['data' => $infoUser])

    <div class="row lxl_submit">
        <button type="submit" name="" id="a_submit" class="btn_submit action-btn btn-auto data-single-click">申し込む</button>
    </div>
    <div class="row lxl_back">
        <i class="lxl-icon-circle circle-high keyboard_backspace icon-right"></i>
        <a href="{{ route('builder.register.get') }}">戻る</a>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        var BUILDER_SYOUKAI_SELF = '{{ ViewConst::BUILDER_SYOUKAI_SELF }}';
    </script>

    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="/js/building/register.js" charset="UTF-8"></script>
@endsection
