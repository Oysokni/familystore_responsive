<?php
use Carbon\Carbon;

$oldType = Session::has('oldType') ? Session::get('oldType'): '';
?>

@extends('layouts.front')

@section('title',trans('builder.builder_title'))

@section('breadcrumb')
    <div class="nav-breadcrumb nav-2">
        @include('includes.breadcrumb')
    </div>
@endsection

@section('content-col')
<div class="bd-intro">
    <h3 class="wrap-title wrap-title-intro">
        <i class="lxl-architecture_urban lxl-title"></i> 住宅購入・紹介
    </h3>

    <table class="table table-labels table-no-border">
        <tr>
            <td>
                <span class="text-btn text-btn-intro">概要</span>
            </td>
            <td>
                <div class="text-desc">LIXILグループで働く皆さんが良い住まいを購入し易くする為のサポートを行うと共に、
                    家族、友人、知人に、住宅購入を進め易くし、社員全員が営業マン となり、売上向上に貢献する為の、
                    住宅購入･紹介のお申込みが出来ます。
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span class="text-btn text-btn-intro">対象地域</span>
            </td>
            <td>
                <div class="text-desc">
                    国内現場
                </div>
            </td>
        </tr>
    </table>
</div>

<!--end box-->
<div class="box">
    <h3 class="box-title">ビルダー検索</h3>
    @include('builder.includes.common', ['oldType', $oldType])
    <!--end section list-->
</div>
<!--end box-->
<!-- Modal -->
<div id="policiesModal" class="modal fade" role="dialog">
  <div class="modal-dialog custom-dialog">
    <!-- Modal content-->
    <div class="modal-content custom-content">
        <div class="modal-body custom-body">
            <button type="button" data-dismiss="modal"><i class="close"></i></button>
        </div>
    </div>
  </div>
</div>
@endsection

@section('sidebar-col')

@if (!$notifications->isEmpty())
<div class="element-link mgb-70">
    <a href="#reform_notify" class="text-nounderline">住宅購入･紹介 お知らせ</a>
</div>
@else
<div class="height-90"></div>
@endif

@include('builder.includes.sidebar')
@endsection

@section('foot_content')
<div class="height-90">
    <div class="to-top-box pull-right">
        <a href="#" class="text-nounderline">
            <i class="lxl-icon-circle circle-main arrow_upward"></i>
            <span class="text-desc text-border">ページトップ</span>
        </a>
    </div>
    <div class="height-50 mgb-30 bd-main"></div>
</div>
@if (!$notifications->isEmpty())
<div class="box box-notify mgb-75" id="reform_notify">
    <h3 class="box-title mgb-8">お知らせ</h3>
    <table class="table table-note text-desc">
        @foreach($notifications as $note)
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
</div>
@endif
@endsection

@section('footer')
<script type="text/javascript" src="/js/jquery.maphilight.min.js"></script>
<script type="text/javascript" src="/js/builder/index.js"></script>
@endsection
