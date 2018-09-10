<?php
use Carbon\Carbon;
use App\Models\User;

$currentUser = Auth::user();
?>

@extends('layouts.front')

@section('title', trans('page.family_store'))

@section('body_class', 'top-page')

@section('menu')
<!--nothing-->
@stop

@section('top_page')
<div class="container-wrap">
    <div class="bg-head-box mgb-50">
        <div class="bg-content-middle">
            <h2 class="bg-title">LIXIL Family STORE</h2>
            <div class="bg-desc">
                <p>LIXIL Family STORE は、LIXILグループで働く皆さんと</p>
                <p>ご家族の方に、より良い住まいと暮らしを提供する仕組みです。</p>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')

<div class="wrap-border bd-family">
    <h3 class="wrap-title wrap-title-family">
        <i class="lxl-reform lxl-title"></i> リフォームストア
        <span class="sub-title text-desc">LIXIL商品を使ったリフォームを特別価格でご提供します。</span>
    </h3>

    <table class="table table-labels table-no-border">
        <tr>
            <td>
                <span class="text-btn text-btn-family">対象</span>
            </td>
            <td>
                <div class="text-wrap">
                    LIXIL会員の方、ファミリー会員の方 どちらもご利用可能です。
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span class="text-btn text-btn-family">概要</span>
            </td>
            <td rowspan="2">
                <div class="text-wrap">
                    LIXILグループで働く皆さんにLIXIL商品を特別価格で提供し、実際に利用
                    していただいた上で商品の良さを実感してもらい、より会社と商品に愛着
                    を持ってもらう為の、リフォーム工事のお申込みが出来きます。
                    <p class="red_color-rf">リフォームストアは工事付きでのお申し込みになります。
                    商品のみの販売は行っておりません。又、リフォーム工事はLIXIL Family STORE が指定する工事会社での対応となりますので、ご承知おきください。</p>
                </div>
            </td>
        </tr>
    </table>
    <div class="text-right">
        <a href="{{ route('page.reform') }}" class="action-btn action-btn-high minw-250">リフォームストアを見る</a>
    </div>
</div>
<!--end wrap box-->

@if ($currentUser->memberType() == User::TYPE_LIME_NORMAL)

    <div class="wrap-border bd-intro">
        <h3 class="wrap-title wrap-title-intro">
            <i class="lxl-architecture_urban lxl-title"></i> 住宅購入・紹介
            <span class="sub-title text-desc">住宅購入サポートと、友人・知人の住宅購入案件紹介制度です。</span>
        </h3>

        <table class="table table-labels table-no-border">
            <tr>
                <td>
                    <span class="text-btn text-btn-intro">対象</span>
                </td>
                <td>
                    <div class="text-wrap">
                        <span class="nowrap-space">会員本人の住宅購入案件のお申込み：LIXIL会員の内、役員、パート社員、アルバイトを除く方がご利用可能です。</span><br />
                        家族含む、友人・知人の住宅購入案件のご紹介：LIXIL会員の内、アルバイトを除く方がご利用可能です。
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="text-btn text-btn-intro">概要</span>
                </td>
                <td>
                    <div class="text-wrap">
                        LIXILグループで働く皆さんが良い住まいを購入し易くする為のサポートを行う
                        と共に、家族を含む、友人・知人に、住宅購入を勧め易くし、社員全員が営業マン
                        となり、売上向上に貢献する為の、住宅購入･紹介のお申込みが出来ます。
                    </div>
                </td>
            </tr>
        </table>
        <div class="text-right">
            <a href="{{ route('builder.index') }}" class="action-btn action-btn-high minw-250">住宅購入・紹介を見る</a>
        </div>
    </div>
    <!--end wrap box-->
@endif

<div class="height-20 mgb-30 bd-main"></div>

<div class="box box-notify mgb-75">
    <h3 class="box-title mgb-8">お知らせ</h3>

    @if (isset($notifyList) && !$notifyList->isEmpty())
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

@stop

@section('footer')

@endsection
