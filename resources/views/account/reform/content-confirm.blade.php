<?php
use Carbon\Carbon;

$currentUser = Auth::user();
?>

@extends('layouts.front')

@section('title', trans('page.register_content_reform'))

@section('head')
<link rel="stylesheet" href="{{ asset('css/cart/style.css') }}">
@stop

@section('body_class', 'no-border-header')

@section('menu')

<h2 class="wrap-title cl-family mgt-35">リフォームストア お申し込み内容詳細確認</h2>

@stop

@section('content')

<div id="export_view">
    
    <div class="row text-desc">
        <div class="col-xs-6">
            ■状況：申込済み
        </div>
        <div class="col-xs-6 text-right">
             出力日：{{ Carbon::now()->format('Y年m月d日') }} （{{ $currentUser->sei_local . '　' . $currentUser->mei_local }}）
        </div>
    </div>
    <div class="height-20"></div>

    <div class="box-border mgb-25">

        <div class="field-area cart-register-product">

            @include('cart.includes.fields-confirm')
            
            @include('cart.includes.registed-products', ['proxy' => route('page.cross_proxy')])

        </div>

    </div>
    
</div>

<div class="text-center">
    <button id="export_btn" class="action-btn action-btn-high minw-300">お申し込み内容をPDFでダウンロードする</button>
</div>
<div class="height-50"></div>

@stop

@section('footer')

<script>
    var proxyUrl = '{{ route("page.cross_proxy") }}';
    var pdfFileName = '{{ Carbon::now()->format("Y-m-d") . "-Reform-" . $data->reform_no }}';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js"></script>
<script src="{{ asset('plugins/exportpdf/jspdf.min.js') }}"></script>
<script src="{{ asset('plugins/exportpdf/html2canvas.min.js') }}"></script>
<script src="{{ asset('plugins/exportpdf/script.js') }}"></script>

@stop

