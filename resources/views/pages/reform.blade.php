<?php
use Carbon\Carbon;
use App\Helpers\HelperFunc;
?>

{{-- @extends('layouts.front') --}}
@extends('layouts.front')
@section('title', trans('page.reform_title'))

@section('breadcrumb')
<div class="nav-breadcrumb">
    @include('includes.breadcrumb')
</div>
@stop
<?php
use App\Models\Faq;
use App\Models\User;
?>
@section('content-col')

<div class="box bd-main">

    <h2 class="page-title cl-family page-title-icon"><i class="lxl-reform"></i> リフォームストア</h2>

    <div class="label-items category-items items">
        <div class="media item">
            <div class="media-left pull-left">
                <span class="text-btn text-btn-blue">概要</span>
            </div>
            <div class="media-body">
                <ul class="list-unstyled">
                    <li>LIXILグループで働く皆さんとご家族の方に、LIXIL商品を特別価格で提供し、</li>
                    <li>実際に利用 していただいた上で商品の良さを実感してもらい、より会社と商品に</li>
                    <li>愛着 を持ってもらう為の、リフォーム工事のお申込みが出来きます。</li>
                    <li class="red_color-rf">リフォームストアは工事付きでのお申し込みになります。</li>
                    <li class="red_color-rf">商品のみの販売は行っておりません。又、リフォーム工事はLIXIL Family </li>
                    <li class="red_color-rf">STORE が指定する工事会社での対応となりますので、ご承知おきください。</li>
                    <li class="red_color-rf">尚、商品の本体を含まない付属品のみの取付、交換、修繕、営繕は対象外です。</li>

                </ul>
            </div>
        </div>
        <div class="media item">
            <div class="media-left pull-left">
                <span class="text-btn text-btn-blue">対象地域</span>
            </div>
            <div class="media-body">
                <div class="mgt-5">国内現場（沖縄を除く離島は別途費用が発生致します）</div>
            </div>
        </div>
    </div>
</div>
<!--end box-->

<div class="box">
    <h3 class="box-title">対象商品</h3>
    <div class="row grid-items items">
        @if (!$categories->isEmpty())
            @foreach($categories as $cat)
            <div class="col-xs-4 item{{empty($cat->category_logo_filen) ? " invisible" : ''}}" >
                <div class="inner">
                    <div class="thumb">
                        <a href="{{ route('product.index', ['catId' => $cat->category_cd]) }}" class="thumb-img thumbh-100">
                            <img class="img-responsive" src="{{ $cat->getImageSrcByCol('category_logo_filen') }}"
                                 alt="{{ $cat->category_mei }}">
                        </a>
                    </div>
                    <div class="item-body">
                        <h4 class="item-title">
                            <a href="{{ route('product.index', ['catId' => $cat->category_cd]) }}" title="{{ $cat->category_mei }}">
                                {{ HelperFunc::trimWords($cat->category_mei) }}
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    <!--end list-->

    <div class="alert-panel alert-panel-danger mgb-30">
        <div class="alert-header"><i class="warning"></i> お申し込みの前に必ずお読みください</div>
        <div class="alert-content">
            <ul class="dots-list">
                <li>
                    リフォームストアは、LIXIL Family STOREが指定する工事業者で、リフォーム工事込み<br />
                    の販売を行うサービスです。従って、LIXIL商品のみの販売や、商品の本体を含まない<br />
                    付属品のみの販売、部品交換等の修繕、営繕はお受けできませんのでご注意下さい。<br />
                    又、リフォームストアは、新築検討中や新築工事中の案件は対象外となります。
                </li>
                <li>
                    見積、工事日程および時間について、繁忙期などご依頼が集中した場合、ご希望に沿うことが出来ない可能性がありますので、予めご了承をいただけますよう、お願い致します。<br />
                </li>
                <li>
                    本制度は、会員本人名義、会員の配偶者名義、会員本人と家族との共同名義で所有する<br />
                    住宅（以下、対象住宅という）が対象となります。従って、賃貸住宅は対象外となります。<br />
                    又、対象住宅であっても会員が居住していない賃貸 住宅も対象外となります。
                </li>
                <li>
                    リフォームストアでのご利用に関して、原則、回数制限は設けていませんが、<br />
                    同一部位同一商品リフォーム（同じ建物の同じ部分で同じ商品のリフォーム）の<br />
                    特別価格での対応は、年間１回を限度とさせていただきます。<br />
                    尚、ご利用回数が極端に多い場合、制限をさせていただく場合もあります。
                </li>
                <li>
                    <?php
                    $userType = substr(Auth::user()->knr_user_id, 0, 1);
                    if ($userType == User::CH_LIME) {
                        $link = route('link.（ALL版）LIXIL Family STORE規約.pdf');
                    } elseif ($userType == User::CH_FAMILY) {
                        $link = route('link.（Family）LIXIL Family STORE規約.pdf');
                    } else {
                        $link = '';
                    }
                    ?>
                    その他、会員登録時に同意いただいた利用規約を遵守していただき、ご利用ください。
                    利用規約は<a href="{!! $link !!}" target="_blank" class="text-bold">こ​ち​ら。​</a>
                </li>
            </ul>
        </div>
    </div>
    <!--end alert panel-->

    <div class="to-top-box">
        <a href="#" class="text-nounderline">
            <i class="lxl-icon-circle circle-main arrow_upward"></i>
            <span class="text-desc text-border">ページトップ</span>
        </a>
    </div>
</div>
<!--end box-->

@stop

@section('sidebar-col')

@if (!$notifyList->isEmpty())
<div class="element-link mgb-70">
    <a href="#reform_notify" class="text-nounderline">リフォームストア お知らせ</a>
</div>
@else
<div class="height-90"></div>
@endif

<a href="{{ route('cart.list.product') }}" class="cart-button btn-block action-btn width-icon action-btn-high mgb-25">
    <i class="lxl-empty-cart"></i> カートを見る
</a>

<div class="bar-box mgb-30">
    <h3 class="bar-title">リフォームストア</h3>
    <ul class="category-list">
        <li class="active">
            <a href="{{ route('page.reform') }}">対象商品</a>
            <ul class="subs-cat">
                @foreach($categories as $category)
                    @if($category->category_logo_filen)
                        <li><a href="{{ route('product.index', ['catId' => $category->category_cd]) }}">{{$category->category_mei}}</a>
                    @endif
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('link.商品仕様検討方法.pdf') }}" target="_blank">商品仕様検討方法</a></li>
        <li><a href="{{ route('link.３Dイメージ検討方法.pdf') }}" target="_blank" >3Dイメージ検討方法</a></li>
        <li><a href="{{ route('link.ショールーム案内.pdf') }}" target="_blank">ショールーム案内</a></li>
        <li><a href="{!! $link !!}" target="_blank">必ずお読みください</a></li>
        <li><a href="{{route('faq.index', ['faqType' => Faq::TYPE_REFORM_FAQ]) }}">FAQ（リフォームストア）</a></li>
        <li><a href="{{route('link.LFSリフォームお申し込み～支払フロー.pdf') }}" target="_blank">お申し込み～支払フロー</a></li>
    </ul>
</div>

@stop

@section('foot_content')
<div class="height-20 mgb-30 bd-main"></div>

@if (!$notifyList->isEmpty())
<div class="box box-notify mgb-75" id="reform_notify">
    <h3 class="box-title mgb-8">お知らせ</h3>
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
</div>
@endif

@stop
