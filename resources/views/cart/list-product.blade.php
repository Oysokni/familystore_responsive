@extends('layouts.front')

@section('title')

{{ trans('cart.cart_title') }}

@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('/css/cart/list_product.css') }}">
@endsection

@section('breadcrumb')
    <div class="nav-breadcrumb">
        @include('includes.breadcrumb')
    </div>
@endsection
<?php
use App\Models\User;
use App\Models\Shopping;
use App\Models\Faq;
use Illuminate\Support\Facades\Input;
use App\Helpers\ViewConst;

$old = Input::old();
if (isset($old['shopping'])) {
    $oldShopping = $old['shopping'];
}
$optionIinavi = Session::has('enavi') ? Session::get('enavi') : null;

?>
@section('content')
<div class="cart-list-product">
    <h2 class="page-title cl-family"><i class="lxl-reform lxl-title"></i> リフォームストア <span class="pad-left-15">カート</span></h2>
    <form class="form-product" action="{{ route('cart.update.product') }}" method="POST">
    <div class="row cart-top">
        <div class="col-xs-9">
            @include('cart.includes.head')
            @if(isset($listProduct) && count($listProduct))
            <div class="row">
                <div class="col-xs-8 lixl-text-note">
                    <i class="square"></i><label>お申込み商品を選択（複数選択可能）して、お申込み下さい。</label>
                </div>
                <div class="col-xs-4 button-submit">
                    <button type="submit" class="custom-btn-submit btn btn-orange action-btn">申し込む</button>
                </div>
            </div>
            <div class="row previous-top">
                <div class="previous text-left">
                    <i class="lxl-icon-circle circle-high keyboard_backspace icon-right"></i>
                    <a @if($urlBack != '') href="{{ $urlBack }}"  @else href="{{ route('page.reform') }}" @endif class="text">ショッピングを続ける</a>
                </div>
            </div>
            @else
            <div class="head-not-product">
                <h3 class="mgb-10">お申し込み商品</h3>
                <div class="error-message pad-top-25">
                    <div class="alert-panel alert-panel-danger text-bold">現在申し込み商品がありません。</div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-xs-3">
            <div class="nav-right">
                <ul>
                    <li><a href="{{ route('link.商品仕様検討方法.pdf') }}" target="_blank">商品仕様検討方法</a></li>
                    <li><a href="{{ route('link.３Dイメージ検討方法.pdf')}}" target="_blank" >3Dイメージ検討方法</a></li>
                    <li><a href="{{ route('link.ショールーム案内.pdf')}}" target="_blank">ショールーム案内</a></li>
                    <li><a href="{{$reformPolicy}}" target="_blank">必ずお読みください</a></li>
                    <li><a href="{{route('faq.index', ['faqType' => Faq::TYPE_REFORM_FAQ]) }}">FAQ（リフォームストア）</a></li>
                    <li><a href="{{route('link.LFSリフォームお申し込み～支払フロー.pdf') }}" target="_blank">お申し込み～支払フロー</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row list-content">
        @if(isset($listProduct) && count($listProduct))
        <h3 class="mgb-10">お申し込み商品</h3>
        @endif
        @include('includes.messages')
        <div class="list-product">
            {{ csrf_field() }}
            <?php $index = 0;  ?>
            @if(isset($listProduct) && count($listProduct))
            @foreach($listProduct as $item)
            <div class="box box-product">
                <div class="row body-box content equal-cols">
                    <input type="hidden" name="shopping[{{ $index }}][shopping_id]" class="shopping_id" value="{{ $item->shopping_id }}"/>
                    <div class="col-xs-9 box-left">
                        <div class="row">
                            <div class="col-xs-12 head">
                                <div class="pull-left">
                                    <input type="checkbox" name="shopping[{{ $index }}][check]" id="check-box-{{ $index }}"
                                            @if(isset($oldShopping[$index]))
                                                 @if(isset($oldShopping[$index]['check']))
                                                     checked
                                                 @endif
                                           @elseif($item->req_form_status == Shopping::STATUS_CREATETING_FORM)
                                                checked
                                           @endif />
                                           <label for="check-box-{{ $index }}"><i class="img-icon keyboard_backspace"></i> 選択する場合チェックして下さい</label>
                                </div>
                                <div class="pull-right">
                                    このプランを削除する<i class="clear" data-url="{{ route('cart.list.destroy.product') }}"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 sidebar">
                                    <div class="row">
                                        <div class="logo">
                                            <img class="img-responsive" src="{{ $item->getImageSrcByCol('syouhin_logo_filen')}}" alt="商品ロゴ（またはテキスト）"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="img fix-size-img">
                                            <img class="img-responsive" src="{{ $item->getImageSrcByCol('plan_image_filen') }}" alt="プラン写真" />
                                        </div>
                                    </div>
                                    <div class="row">
                                         <a href="{{ $item->link_url_1 }}" target="_blank" class="action-btn view-btn">LIXIL HP で確認する</a>
                                    </div>
                                    <div class="row">
                                        @if($item->syouhin_3D_kbn == '02')
                                        <button data-link="https://sv.k-engine.jp/p14rw/?type=3d&remodelingNameId={{ $remodelingNameId }}&quotationId={{ $userType == User::CH_LIME ? $item->kengine_plan_cd1 : $item->kengine_plan_cd2 }}"
                                                data-token="{{ csrf_token()}}" data-url="{{ route('kengine.link.infor') }}" type="button" class="btn-hover button-label-violet open-link">
                                            ３Dで見る
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-8 pad-right-none">
                                    <div class="row name-product">
                                        <label>{{ $item->plan_mei }}</label>
                                    </div>
                                    <div class="row cost">
                                        @if($item->kakakuhyouji_kbn == '03')
                                        <div>打ち合わせ後ショップから見積が提出されます。</div>
                                        @else
                                        <div class="cost-1">{{ number_format(ViewConst::TEMP_PLANS_PRICE[$item->syouhin_plan_id][0] * 1000) }}円</div>
                                        <span class="arrow-right">→</span>
                                        <div class="cost-2">{{ number_format($userType == User::CH_LIME ? ViewConst::TEMP_PLANS_PRICE[$item->syouhin_plan_id][1] * 1000 : ViewConst::TEMP_PLANS_PRICE[$item->syouhin_plan_id][2] * 1000) }}円@if($item->kakakuhyouji_kbn == '01')<span>～</span>@endif</div>
                                        <div class="text-note ">（工事費込、税別）</div>
                                        @endif
                                    </div>
                                    <div class="row explain-one">
                                        <div>{!! nl2br($item->setumei_bun_1) !!}</div>
                                    </div>
                                    <div class="row explain-two">
                                        <div>{!! nl2br($item->setumei_bun_2) !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if($item->syouhin_3D_kbn == '02')
                    <!--                        <div class="col-xs-3 box-right ">
                                                <div class="row radio-group">
                                                    <div>
                                                        <input type="radio" name="shopping[{{ $index }}][enavi]" id="first_plans_{{ $index }}" value="1" checked="checked" />
                                                        <label for="first_plans_{{ $index }}">元プランを有効にする</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="shopping[{{ $index }}][enavi]" value="2" id="test_result_{{ $index }}" />
                                                        <label for="test_result_{{ $index }}">検討結果を有効にする</label>
                                                    </div>
                                                </div>
                                                <div class="row lixl-kengine">
                                                    <button type="button" class="text-bold btn-hover button-label-violet">このプランを３Dで検討する</button>
                                                    <div class="note-3d">
                                                        <p>このプランを元に、商品仕様や空間を変更して、リフォーム内容を自分でカスタマイズして、概算見積もりを行う。</p>
                                                        <p>※３Dイメージ検討方法参照</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <p class="not-down-line">
                                                            <i class="square"></i>
                                                            <label class="control-label">検討後プランNo</label>
                                                            <button type="button" class="text-bold">確認/再編集</button>
                                                        </p>
                                                        <div class="input-group">
                                                            <input type="text" name="shopping[{{ $index }}][enavi_mitsu_cd3]" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <p>
                                                            <i class="square"></i>
                                                            <label class="control-label">検討後概算見積もり金額</label>
                                                        <p>
                                                        <div class="input-group">
                                                            <input type="text" name="shopping[{{ $index }}][enavi_mitsu_cd4]" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <p>
                                                            <i class="square"></i>
                                                            <label class="control-label">検討後イメージ</label>
                                                        <p>
                                                        <div class="input-group">
                                                            <textarea name="shopping[{{ $index }}][kengine_plan_cd3]" class="form-control" cols="22" rows="8"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                    @elseif($item->syouhin_toroku_kbn == '01' && $item->kakakuhyouji_kbn == '03')
                     <div class="col-xs-3 box-right ">
                        <div class="row radio-group">
                            <div>
                                <input type="radio" name="shopping[{{ $index }}][enavi]" id="first_plans_{{ $index }}" value="1"
                                     @if(isset($oldShopping[$index]))
                                        @if(isset($oldShopping[$index]['enavi']) && $oldShopping[$index]['enavi'] == 1)
                                            checked
                                        @endif
                                    @elseif(!isset($optionIinavi[$item->shopping_id]))
                                        checked="checked"
                                    @endif />
                                <label for="first_plans_{{ $index }}">元プランを有効にする</label>
                            </div>
                            <div>
                                <input type="radio" name="shopping[{{ $index }}][enavi]" value="2" id="test_result_{{ $index }}"
                                        @if(isset($oldShopping[$index]))
                                            @if(isset($oldShopping[$index]['enavi']) && $oldShopping[$index]['enavi'] == 2)
                                                checked
                                            @endif
                                        @elseif(isset($optionIinavi[$item->shopping_id]))
                                            checked="checked"
                                        @endif />
                                <label for="test_result_{{ $index }}">検討結果を有効にする</label>
                            </div>
                        </div>
                        <div class="row lixl-kengine">
                           <button data-link="http://www.biz-lixil.com/service/proptool/planning/" data-url="{{ route('iinavi.check') }}"
                                    class="text-bold btn-hover button-label-gray a-button enavi-popup" type="button">参考として商品仕様を検討する</button>
                            <div class="note-3d">
                                <p>商品仕様を”いいナビ”を活用して検討できます。検討内容を申込みに反映したい場合は、検討後のいいナビで見積もり表示された、見積No、アクセスコードを下記に記入下さい。</p>
                                <p>※商品仕様検討方法参照</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <p class="not-down-line">
                                    <i class="square"></i>
                                    <label class="control-label">いいナビ見積No</label>
                                </p>
                                <div class="input-group">
                                    <input type="text" name="shopping[{{ $index }}][enavi_mitsu_cd3]" class="form-control"
                                        @if(isset($oldShopping[$index]) && isset($oldShopping[$index]['enavi_mitsu_cd3']))
                                            value="{{ $oldShopping[$index]['enavi_mitsu_cd3'] }}"
                                        @elseif(isset($optionIinavi[$item->shopping_id]['enavi_mitsu_cd3']))
                                            value="{!! $optionIinavi[$item->shopping_id]['enavi_mitsu_cd3'] !!}"
                                        @endif />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <p>
                                    <i class="square"></i>
                                    <label class="control-label">いいナビアクセスコード</label>
                                <p>
                                <div class="input-group">
                                    <input type="text" name="shopping[{{ $index }}][enavi_mitsu_cd4]" class="form-control"
                                        @if(isset($oldShopping[$index]) && isset($oldShopping[$index]['enavi_mitsu_cd4']))
                                            value="{{ $oldShopping[$index]['enavi_mitsu_cd4'] }}"
                                        @elseif(isset($optionIinavi[$item->shopping_id]['enavi_mitsu_cd4']))
                                            value="{!! $optionIinavi[$item->shopping_id]['enavi_mitsu_cd4'] !!}"
                                        @endif />
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-xs-3">
                    </div>
                    @endif
                </div>

            </div>
            <?php $index++;  ?>
            @endforeach
            @endif
        </div>
    </div>
    <div class="row cart-list-footer">
        <div class="col-xs-9">
            @if(isset($listProduct) && count($listProduct))
            <div class="row">
                <div class="col-xs-8 lixl-text-note">
                    <i class="square"></i><label>お申込み商品を選択（複数選択可能）して、お申込み下さい。</label>
                </div>
                <div class="col-xs-4 button-submit">
                    <button class="custom-btn-submit btn btn-orange action-btn">申し込む</button>
                </div>
            </div>
            @endif
            <div class="col-xs-3"></div>
        </div>
        <div class="col-xs-3"></div>
        <div class="col-xs-9">
            <div class="row previous-top">
                <div class="previous text-left">
                    <i class="lxl-icon-circle circle-high keyboard_backspace icon-right"></i>
                    <a @if($urlBack != '') href="{{ $urlBack }}"  @else href="{{ route('page.reform') }}" @endif class="text">ショッピングを続ける</a>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="to-top to-top-box text-right pad-top-25">
                <a href="#" class="text-nounderline">
                    <i class="lxl-icon-circle circle-main arrow_upward"></i>
                    <span class="text-desc text-border">ページトップ</span>
                </a>
            </div>
        </div>
    </div>
    </form>
</div>

{{-- Modal login enavi  --}}
<div id="infor-iinavi" class="modal fade" role="dialog" data-url="{{ route('iinavi.remove.session') }}">
    <div class="modal-dialog custom-dialog">

        <!-- Modal content-->
        <div class="modal-content custom-content">
            <div class="modal-body custom-body">
                <button type="button" data-dismiss="modal"><i class="close"></i></button>
            </div>
        </div>

    </div>
</div>
{{-- End modal login enavi  --}}

@endsection

@section('footer')
<script src="{{ asset('js/cart/script.js') }}"></script>
<script src="{{ asset('js/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('js/postlink.js') }}"></script>
<script src="/iinavi/js/iinavi.js"></script>
<script>
    $(function() {
        if ($('#system').hasClass('ie9')) {
            $(".row.equal-cols > [class*='col-']").matchHeight();
        }
    });
</script>
@endsection
