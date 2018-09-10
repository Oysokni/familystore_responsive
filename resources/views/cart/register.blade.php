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

@section('breadcrumb')
<div class="nav-breadcrumb">
    @include('includes.breadcrumb')
</div>
@stop

@section('content')

<div class="cart-register-product">

    <h2 class="page-title cl-family">
        <i class="lxl-reform lxl-title"></i> リフォームストア お申し込み
    </h2>

    @include('includes.messages')

    @include('cart.includes.head', ['back' => true])

    <div class="body_content">
        <h3 class="mgb-10">お申し込み</h3>
        <div class="bd-2px"></div>
        <div class="form-content">
            <form action="{{ route('cart.confirm.register') }}" method="post">
                {!! csrf_field() !!}

                <div class="row-border">
                    <div class="row title_primary">
                        <div class="col-xs-9 pad-left-5">
                            <p class="mar-bottom-none"><i class="circle"></i><label class="label-bold pad-left-15">お申し込み者情報</label></p>
                        </div>
                        <div class="col-xs-3 xil_date">
                            <span>お申込み日　：　{{ Carbon::now()->format("Y.m.d") }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label for="">会員区分/会員番号</label>
                        </div>
                        <div class="col-xs-9">
                            <span>{{ HelperFunc::showUserId($currentUser) }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label for="">氏名</label>
                        </div>
                        <div class="col-xs-9">
                            <span>{{ $currentUser->sei_local. '　' .$currentUser->mei_local }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label for="">電話番号</label>
                        </div>
                        <div class="col-xs-9">
                            <div class="">
                                <div class="col-xs-3 pad-left-none">
                                    <span>{{ $currentUser->idm_denwa_no }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <label for="">携帯電話番号</label>
                                </div>
                                <div class="col-xs-7">
                                    <span>{{ $currentUser->idm_keitai_tel }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label for="">メールアドレス</label>
                        </div>
                        <div class="col-xs-9">
                            <span>{{ $currentUser->mail }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label for="">住所</label>
                        </div>
                        <div class="col-xs-9">
                            <span>〒{{ implode("-", $currentUser->getArrZipNo()) .'　'. $currentUser->todouhuken_mei . $currentUser->sikutyouson_mei . $currentUser->tyoumei }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label for="">会社名</label>
                        </div>
                        <div class="col-xs-9">
                            <span>{{ $currentUser->company_mei }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label class="pad-top-8">所属部署</label>
                        </div>
                        <div class="col-xs-3 ">
                            <input type="text" name="syozokubusyo_mei" id="syozokubusyo_mei" value="{{ old('syozokubusyo_mei') }}" class="form-control" tabindex="1">
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <label class="pad-top-4">連絡方法</label>
                        </div>
                        <div class="col-xs-9 lxl_checkbox">
                            <?php
                            $oldRenrakuKbn = old('renraku_kbn_check');
                            $contactMethods = HelperFunc::listContactMethods();
                            ?>
                            @foreach ($contactMethods as $key => $label)
                            <div class="checkbox">
                                <input type="checkbox"  name="renraku_kbn_check[{{ $key }}]" id="renraku_kbn_{{ $key }}"
                                       {{ isset($oldRenrakuKbn[$key]) && $oldRenrakuKbn[$key] ? 'checked' : '' }}>
                                <label tabindex="{{ $key +1 }}" for="renraku_kbn_{{ $key }}">{{ $label }}</label>
                            </div>
                            @endforeach
                            <div class="checkbox">
                                <label>※複数選択可</label>
                            </div>
                            <br>
                            <span class="error-mess">{{ $errors->first('renraku_kbn_check') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row title_primary">
                        <div class="col-xs-12 pad-top-25 pad-left-5">
                            <p class="mar-bottom-none lxl_input_relative"><i class="circle"></i><label class="label-bold pad-left-15">リフォーム内容</label></p>
                        </div>
                    </div>
                </div>

                @if (in_array($currentUser->memberType(), [ViewConst::USER_TYPE_LIME_NORMAL, ViewConst::USER_TYPE_LIME_SPECIAL]))
                <div class="check-disable-area">
                    <div class="row-border">
                        <div class="row">
                            <div class="col-xs-3">
                                <span>リフォーム場所</span>
                            </div>
                            <?php
                            $reformLocates = HelperFunc::listLocationsReform();
                            $errorTaisyou = HelperFunc::errorField('taisyou_kbn');
                            ?>
                            <div class="col-xs-9 lxl_checkbox lxl_radio check-disable" data-type="radio">
                                @foreach ($reformLocates as $key => $label)
                                <input type="radio" name="taisyou_kbn" value="{{ $key }}" id="taisyou_kbn_{{ $key }}"
                                       @if ($key == ViewConst::REFORM_LOCATE_HOME) data-disable=".taisyou-kbn-1" @endif
                                       @if (old('taisyou_kbn') == $key ||
                                            (!old('taisyou_kbn') && $key == ViewConst::REFORM_LOCATE_HOME)) checked @endif>
                                <label class="radio-inline" tabindex="{{ $key +4 }}" for="taisyou_kbn_{{ $key }}">{{ $label }}</label>
                                @endforeach
                                {!! $errorTaisyou !!}
                                <p class="mgt-10">※ ■単身赴任等で、会員登録した現住所以外に会員所有のご自宅がある場合、お申し込み可能です。</p>
                                <p class="pdl-15">  ■会員ご自身が現在お住まいでない別住所（会員登録住所以外）のご実家場合、</p>
                                <p class="mgl-17">・本人所有（本人が名義人に含まれている）のご実家は、お申し込み可能です。</p>
                                <p class="mgl-17">・本人所有でないご実家の場合は、お申し込み対象外となります。</p>
                                <p class="mgl-17">この場合は、ご実家にお住まいの名義人であるご家族の方を、ファミリー会員に招待し、</p>
                                <p class="mgl-17"> ご家族の方からお申込みいただいてください。</p>
                            </div>
                        </div>
                    </div>

                    <div class="row-border">
                        <div class="row title_primary">
                            <div class="col-xs-12 text-bold">
                                <span>リフォームを希望される建物の住所</span>
                                <span class="red_color">※自宅 現住所の場合は、記入不要です。</span>
                            </div>
                        </div>
                    </div>

                    <!--zipcode-->
                    <div class="row-border disable-area">
                        <div class="row">
                            <div class="col-xs-3">
                                <label class="pad-top-8">住所（リフォーム場所）</label>
                            </div>
                            <div class="col-xs-9 address-member">
                                <div class="row zip-no">
                                    <?php
                                    $zipNo = $currentUser->getArrZipNo();
                                    $oldZipNo1 = old('bkn_zip_no1');
                                    $oldZipNo2 = old('bkn_zip_no2');

                                    $errorZip1 = HelperFunc::errorField('bkn_zip_no1');
                                    $errorZip2 = HelperFunc::errorField('bkn_zip_no2');
                                    ?>
                                    <div class="col-xs-2">
                                        <label class="pad-top-8">郵便番号</label>
                                    </div>
                                    <div class="col-xs-10 lxl_length">
                                        <div class="col-xs-2 input-zip">
                                            <input type="text" name="bkn_zip_no1" id="s_zip_no1" size="3" maxlength="3"
                                                   data-default="{{ $zipNo[0] }}"
                                                   value="{{ $oldZipNo1 ? $oldZipNo1 : $zipNo[0] }}"
                                                   class="form-control taisyou-kbn-1{{ $errorZip1 ? ' field-error' : '' }}" tabindex="8">
                                            {!! $errorZip1 ? '<div class="error-mess"></div>' : '' !!}
                                        </div>
                                        <span class="hype">-</span>
                                        <div class="col-xs-2 input-zip">
                                            <input type="text" name="bkn_zip_no2" id="s_zip_no2" size="4" maxlength="4"
                                                   data-default="{{ $zipNo[1] }}"
                                                   value="{{ $oldZipNo2 ? $oldZipNo2 : $zipNo[1] }}"
                                                   class="form-control taisyou-kbn-1{{ $errorZip2 ? ' field-error' : '' }}" tabindex="9">
                                            {!! $errorZip2 ? '<div class="error-mess"></div>' : '' !!}
                                        </div>
                                        <button type="button" class="color_gray zipcode-gen-btn taisyou-kbn-1">自動住所入力</button>
                                        <span>※郵便番号を入力後、クリックしてください。</span>
                                    </div>
                                    <div class="col-xs-10 col-xs-offset-2">
                                        {!! ($errorZip1 && !$errorZip2) ? $errorZip1 : $errorZip2 !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-2">
                                        <label class="pad-top-8">都道府県名</label>
                                    </div>
                                    <div class="col-xs-10">
                                        <?php
                                        $todouhukenMei = old('bkn_todouhuken_mei') ? old('bkn_todouhuken_mei') : $currentUser->todouhuken_mei;
                                        $errorTodouhuken = HelperFunc::errorField('todouhuken_mei');
                                        ?>
                                        <select class="select lxl_width_checkbox form-control taisyou-kbn-1{{ $errorTodouhuken ? ' field-error' : '' }}"
                                                name="bkn_todouhuken_mei" id="pref21"
                                                data-default="{{ $currentUser->todouhuken_mei }}" tabindex="10">
                                            @if ($provinces)
                                                @foreach ($provinces as $key => $value)
                                                <option value="{{ $key }}" {{ $key == $todouhukenMei ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        {!! $errorTodouhuken !!}
                                    </div>
                                </div>
                                <div class="row lxl_list_input">
                                    <div class="col-xs-2">
                                        <label class="pad-top-8">市区町村名</label>
                                    </div>
                                    <div class="col-xs-10 row">
                                        <?php $errorSikutyouson = HelperFunc::errorField('bkn_sikutyouson_mei'); ?>
                                        <div class="col-xs-6">
                                            <input type="text" name="bkn_sikutyouson_mei" size="40"
                                                   value="{{ old('bkn_sikutyouson_mei') ? old('bkn_sikutyouson_mei') : $currentUser->sikutyouson_mei }}"
                                                   data-default="{{ $currentUser->sikutyouson_mei }}"
                                                   class="addr21 form-control taisyou-kbn-1{{ $errorSikutyouson ? ' field-error' : '' }}" tabindex="11" >
                                            {!! $errorSikutyouson !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row lxl_list_input">
                                    <div class="col-xs-2">
                                        <label class="pad-top-8">町名番地</label>
                                    </div>
                                    <div class="col-xs-10 row">
                                        <?php $errorSikutyouson = HelperFunc::errorField('bkn_tyoumei'); ?>
                                        <div class="col-xs-6">
                                            <input type="text" name="bkn_tyoumei" size="40"
                                                   value="{{ old('bkn_tyoumei') ? old('bkn_tyoumei') : $currentUser->tyoumei }}"
                                                   data-default="{{ $currentUser->tyoumei }}"
                                                   class="strt21 form-control taisyou-kbn-1{{ $errorSikutyouson ? ' field-error' : '' }}" tabindex="12">
                                            {!! $errorSikutyouson !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row lxl_list_input">
                                    <div class="col-xs-2">
                                        <label class="pad-top-8">建物区画名</label>
                                    </div>
                                    <div class="col-xs-10 row">
                                        <?php $errorTatMei = HelperFunc::errorField('bkn_tat_mei'); ?>
                                        <div class="col-xs-6">
                                            <input type="text" name="bkn_tat_mei" id="tat_mei"
                                                   value="{{ old('bkn_tat_mei') ? old('bkn_tat_mei') : $currentUser->tat_mei }}"
                                                   data-default="{{ $currentUser->tat_mei }}"
                                                   class="form-control taisyou-kbn-1{{ $errorTatMei ? ' field-error' : '' }}" tabindex="13">
                                            {!! $errorTatMei !!}
                                        </div>
                                        <div class="col-xs-6 line-height-span pad-top-8">
                                            <span>（建物名、部屋番号）</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end zipcode-->
                </div>
                @else
                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <span>リフォーム場所</span>
                        </div>
                        <div class="col-xs-4">
                            <span class="red_color">会員登録住所（自宅）</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3">
                            <span>建築種別</span>
                        </div>
                        <div class="col-xs-9 lxl_checkbox lxl_radio">
                            <?php
                            $oldTatsyuruiKbn = old('tatsyurui_kbn') ? old('tatsyurui_kbn') : ViewConst::TYPE_BUILDING_HOUSE;
                            $typeBuildings = HelperFunc::typeBuildings();
                            $errorTatsyurui = HelperFunc::errorField('tatsyurui_kbn');
                            ?>
                            @foreach ($typeBuildings as $type => $label)
                            <input type="radio" name="tatsyurui_kbn" value="{{ $type }}" id="tatsyurui_kbn_{{ $type }}"
                                   {{ $oldTatsyuruiKbn == $type ? 'checked' : '' }}>
                            <label class="radio-inline" tabindex="{{ $key + 13}}" for="tatsyurui_kbn_{{ $type }}">{{ $label }}</label>
                            @endforeach
                            {!! $errorTatsyurui !!}
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <?php $errorTiknensu = HelperFunc::errorField('tiknensu_kbn'); ?>
                        <div class="col-xs-3 pad-top-8">
                            <span>築年数</span>
                        </div>
                        <div class="col-xs-4">
                            <?php
                                $listTiknensus = HelperFunc::listTiknensus();
                                $tiknensu_kbn = old('tiknensu_kbn');
                            ?>
                            <select class="select lxl_width_checkbox-1 form-control" name="tiknensu_kbn" tabindex="17">
                                <option value="">選択してください</option>
                                @foreach ($listTiknensus as $key => $label)
                                <option value="{{ $key }}" {{ $tiknensu_kbn === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errorTiknensu)
                        <div class="col-xs-9 col-xs-offset-3">
                            {!! $errorTiknensu !!}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3 pad-top-8">
                            <span>ご予算</span>
                        </div>
                        <div class="col-xs-9">
                            <?php
                            $listYosans = HelperFunc::listReformYosans();
                            $oldYosan = old('reform_yosan_kbn');
                            ?>
                            <select class="select lxl_width_checkbox-1 form-control" name="reform_yosan_kbn" tabindex="18">
                                <option value="">選択してください</option>
                                @foreach ($listYosans as $key => $label)
                                <option value="{{ $key }}" {{ $oldYosan === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row-border">
                        <div class="row">
                            <div class="col-xs-3 pad-top-8 mgb-14">
                                <span>ご計画の部位</span>
                            </div>
                            <div class="col-xs-9 group-checkbox">
                                @if (!$categories->isEmpty())
                                    <?php
                                    $catLen = $categories->count();
                                    $catCols = 4;
                                    $numCatInCols = (int) ceil($catLen / $catCols);
                                    ?>
                                    <div class="row lxl_checkbox">
                                        @for ($col = 0; $col < $catCols; $col++)
                                        <div class="col-xs-3">
                                            <?php
                                            $idxStart = $numCatInCols * $col;
                                            $idxEnd = $numCatInCols * ($col + 1);
                                            if ($idxEnd >= $catLen) {
                                                $idxEnd = $catLen;
                                            }
                                            $reformBuiCheck = old('reform_bui_check');
                                            ?>
                                            @for ($idx = $idxStart; $idx < $idxEnd; $idx++)
                                                <?php $cat = $categories[$idx]; ?>
                                                <div class="checkbox">
                                                    <input type="checkbox" name="reform_bui_check[{{ $cat->id . '' }}]" id="reform_bui_{{ $cat->id }}"
                                                           {{ in_array($cat->id, $category_ids) ? 'checked disabled' : '' }}
                                                           {{ $reformBuiCheck && in_array($cat->id, array_keys($reformBuiCheck)) ? 'checked' : ''}}>
                                                    <label tabindex="{{ $key +18}}" for="reform_bui_{{ $cat->id }}">{{ $cat->name }}</label>
                                                </div>
                                            @endfor
                                        </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-border">
                    <div class="row">
                        <div class="col-xs-3 pad-top-8">
                            <span>ご希望時期</span>
                        </div>
                        <div class="col-xs-9 lxl_input_relative">
                            <?php
                            $listDesiredTimes = HelperFunc::listKiboDates();
                            $oldDatePlan = old('kibo_date');
                            ?>
                            <select class="select lxl_width_checkbox form-control" name="kibo_date" tabindex="31">
                                @foreach ($listDesiredTimes as $key => $label)
                                <option value="{{ $key }}" {{ $oldDatePlan === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row-border">
                    <?php $errorReqMemo = HelperFunc::errorField('req_memo'); ?>
                    <div class="mgb-5">その他特記事項（500文字以内）</div>
                    <textarea class="form-field{{ $errorReqMemo ? ' field-error' : '' }}" name="req_memo" tabindex="32">{{ old('req_memo') }}</textarea>
                    {!! $errorReqMemo !!}
                </div>

                <div class="row-border">
                    <div class="row title_primary lxl_del_border">
                        <div class="col-xs-12 pad-top-25 pad-left-5">
                            <p class="mar-bottom-none lxl_input_relative">
                                <i class="circle"></i> <label class="label-bold pad-left-15">お申込み 検討プラン</label>
                            </p>
                        </div>
                    </div>
                </div>

                @include('cart.includes.registed-products')

                <div class="height-20"></div>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{ route('cart.list.product') }}" class="text-bold" tabindex="33">
                            <i class="lxl-icon-circle circle-high arrow_back icon-right"></i>
                            <span>カートに戻る</span>
                        </a>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="submit" name="" tabindex="34" class="btn" id="third_button">次に進む</button>
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
@endsection
