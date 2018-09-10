<?php
use Carbon\Carbon;
use App\Models\User;
use App\Models\Faq;
use App\Helpers\ViewConst;
?>

@extends('layouts.front')

@section('title', $title)

@section('breadcrumb')
    <div class="nav-breadcrumb">
        @include('includes.breadcrumb')
    </div>
@endsection

@section('content-col')
<div class="box bd-main-2">
    <h3 class="wrap-title wrap-title-family">
        <i class="lxl-reform lxl-title"></i> リフォームストア　{{ isset($subCategory) ? $subCategory->subcategory_mei : $category->category_mei }}商品
    </h3>
    <div class="box">
        <h3 class="box-title">{{ $category->category_mei . 'リフォーム工事概要' }}</h3>
        <div class="row grid-items items">
            <div class="list-data">
                {!! $category->product_process !!}
            </div>
            <div class="table-product">
                @foreach($plans as $plan)
                    <div class="row">
                        <div class="col-xs-4 sidebar">
                            <div class="row">
                                <div class="logo">
                                    <img class="img-responsive" src="{{ $plan->getImageSrcByCol('syouhin_logo_filen')}}" alt="商品ロゴ（またはテキスト）"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="img">
                                    <img class="img-responsive" src="{{ $plan->getImageSrcByCol('plan_image_filen') }}" alt="プラン写真" align="middle"/>
                                </div>
                            </div>
                            <div class="row">
                                <a href="{{$plan->link_url_1}}" target="blank" class="action-btn view-btn">LIXIL HP で確認する</a>
                            </div>
                            <div class="row">
                                @if($plan->syouhin_3D_kbn == '02')
                                <button data-link="https://sv.k-engine.jp/p14rw/?type=3d&remodelingNameId={{ $remodelingNameId }}&quotationId={{ $userType == User::CH_LIME ? $plan->kengine_plan_cd1 : $plan->kengine_plan_cd2 }}"
                                        data-token="{{ csrf_token()}}" data-url="{{ route('kengine.link.infor') }}" type="button" class="btn-hover button-label-violet open-link">
                                    ３Dで見る
                                </button>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-8 pad-right-none">
                            <div class="row name-product">
                                <label>{{ $plan->plan_mei }}</label>
                            </div>
                            <div class="row cost">
                                @if($plan->kakakuhyouji_kbn == '03')
                                <div>打ち合わせ後ショップから見積が提出されます。</div>
                                @else
                                <div class="cost-1">{{ number_format(ViewConst::TEMP_PLANS_PRICE[$plan->syouhin_plan_id][0] * 1000) }}円</div>
                                <span class="arrow-right">→</span>
                                <div class="cost-2">{{ number_format($userType == User::CH_LIME ? ViewConst::TEMP_PLANS_PRICE[$plan->syouhin_plan_id][1] * 1000 : ViewConst::TEMP_PLANS_PRICE[$plan->syouhin_plan_id][2] * 1000) }}円@if($plan->kakakuhyouji_kbn == '01')<span>～</span>@endif</div>
                                <div class="text-note ">（工事費込、税別）</div>
                                @endif
                            </div>
                            <div class="product-cart">
                                <form method="post" action="{{ route('product.save') }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="category_cd" value="{{$plan->category_cd}}"/>
                                    <input type="hidden" name="subcategory_cd" value="{{$plan->subcategory_cd}}"/>
                                    <input type="hidden" name="syouhin_plan_id" value="{{$plan->syouhin_plan_id}}"/>
                                    <input type="hidden" name="syahan_kakeritsu" value="{{$userType == User::CH_LIME ? '0.4' : '0.5'}}"/>
                                    <input type="hidden" name="reform_cost_10_1" value="{{$plan->reform_cost_10}}"/>
                                    <input type="hidden" name="reform_cost_20" value="{{$plan->reform_cost_20}}"/>
                                    <input type="hidden" name="reform_cost_30" value="{{$plan->reform_cost_30}}"/>
                                    <input type="hidden" name="reform_cost_90" value="{{$plan->reform_cost_90}}"/>
                                    <input type="hidden" name="kengine_plan_cd1" value="{{$plan->kengine_plan_cd1}}"/>
                                    <input type="hidden" name="kengine_plan_cd2" value="{{$plan->kengine_plan_cd2}}"/>
                                    <input type="hidden" name="enavi_mitsu_cd1" value="{{$plan->enavi_mitsu_cd1}}"/>
                                    <input type="hidden" name="enavi_mitsu_cd2" value="{{$plan->enavi_mitsu_cd2}}"/>
                                    <input type="hidden" name="cat_id" value="{{$catId}}"/>
                                    <input type="hidden" name="sub_cat_id" value="{{$subCatId}}"/>
                                    <button type="submit" class="btn-block action-btn add-cart-btn">
                                        <i class="lxl-empty-cart"></i>カートに入れる
                                    </button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row explain-one">
                                <div>{!! nl2br($plan->setumei_bun_1) !!}</div>
                            </div>
                            <div class="row explain-two">
                                <div>{!! nl2br($plan->setumei_bun_2) !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $plans->links() !!}
        </div>
    </div>
</div>
@endsection

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
        <li>
            <a href="{{ route('page.reform') }}">対象商品</a>
            <ul class="subs-cat">
                @foreach($categories as $category)
                    @if($category->category_logo_filen)
                        @if($category->category_cd == $catId)
                            <li class="{{ $catId && !$subCatId ? 'active': '' }}"><a href="{{ route('product.index', ['catId' => $category->category_cd]) }}">{{$category->category_mei}}</a>
                                <ul class="subs-cat">
                                    @foreach($subCategories as $subCategory)
                                        @if($subCategory->subcategory_cd == $subCatId)
                                            <li class="active"><a href="{{ route('product.index', ['catId' => $category->category_cd, 'subCatId' => $subCategory->subcategory_cd]) }}">{{$subCategory->subcategory_mei}}</a>
                                        @else
                                            <li><a href="{{ route('product.index', ['catId' => $category->category_cd, 'subCatId' => $subCategory->subcategory_cd]) }}">{{$subCategory->subcategory_mei}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('product.index', ['catId' => $category->category_cd]) }}">{{$category->category_mei}}</a>
                        @endif
                    @endif
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('link.商品仕様検討方法.pdf') }}" target="_blank">商品仕様検討方法</a></li>
        <li><a href="{{ route('link.３Dイメージ検討方法.pdf') }}" target="_blank" >3Dイメージ検討方法</a></li>
        <li><a href="{{ route('link.ショールーム案内.pdf') }}" target="_blank">ショールーム案内</a></li>
        <li><a href="{{$reformPolicy}}" target="_blank">必ずお読みください</a></li>
        <li><a href="{{route('faq.index', ['faqType' => Faq::TYPE_REFORM_FAQ]) }}">FAQ（リフォームストア）</a></li>
        <li><a href="{{route('link.LFSリフォームお申し込み～支払フロー.pdf') }}" target="_blank">お申し込み～支払フロー</a></li>
    </ul>
</div>
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
@endsection

@section('footer')
<script type="text/javascript" src="/js/product/index.js"></script>
<script src="{{ asset('js/postlink.js') }}"></script>
@endsection
