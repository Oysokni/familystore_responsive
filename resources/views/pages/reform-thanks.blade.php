@extends('layouts.simple')

@section('title', trans('page.reform_thanks_title'))

@section('content')

<h2 class="page-title title-border">お申し込み完了</h2>

<div class="wrapper">
    <div class="height-50"></div>
    <div class="mgb-50 row text-desc">
        <div class="col-xs-6 col-xs-offset-3">
            <p class="mgb-20">お申し込みありがとうございます。<br />
                担当より連絡させていただきますのでお待ちください。</p>

            <p>ご連絡のない場合は、下記にご連絡ください。</p>
        </div>
    </div>
    
    <div class="mgb-50 row">
        <div class="col-xs-4 col-xs-offset-3 text-center">
            <a href="{{ route('page.top_page') }}" class="link-btn link-btn-main link-btn-lg btn-block">
                TOPページへ戻る
            </a>
        </div>
    </div>
</div>

@stop

