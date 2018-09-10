@extends('layouts.layout_building')

@section('title')
    {{ trans('builder.builder_register')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset("/css/building/style.css")}}">
@endsection

@section('content')
<div class="container body_content">
    <div class="body_success">
        <div class="col-xs-12">
            <h3>お申込みありがとうございます。</h3>
        </div>
        <div class="col-xs-12">
            <h3>ご指定の連絡方法に従い、担当よりご連絡させていただきますのでお待ちください。</h3>
        </div>
        <div class="col-xs-12">
            <h3>ご連絡のない場合は、下記にご連絡ください。</h3>
        </div>
        <div class="col-xs-12">
            <h3><span class="special_character">■</span> LIXIL Family STORE 住宅購入･紹介 専用お問い合わせ先メール：<span class="mail_lixil">lfssyoukai@lixil.com</span></h3>
        </div>
        <div class="clearfix"></div>
        <div class="button_to_top_page text-center">
            <a href="{{ route('page.index') }}" id="s_submit" class="s_submit">TOPページへ戻る</a>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="/js/building/register.js" charset="UTF-8"></script>
@endsection