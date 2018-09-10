<?php
use App\Models\Reform;
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;
use Carbon\Carbon;
?>

<div class="row-border">
    <div class="row title_primary">
        <div class="col-xs-9 pdl-5">
            <p class="mar-bottom-none"><i class="circle"></i><label class="label-bold pdl-15">お申し込み者情報</label></p>
        </div>
        <div class="col-xs-3 xil_date">
            <span>お申込み日　：　{{ Carbon::now()->format("Y.m.d") }}</span>
        </div>
    </div>
</div>
@if (isset($kento_plan_no) && $kento_plan_no != null) 
<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <label for="">お申し込みNo</label>
        </div>
        <div class="col-xs-9">
                {{ $kento_plan_no }}
        </div>
    </div>
</div>
@endif
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
                <div class="col-xs-3 pdl-none">
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
            <span>〒{{ $currentUser->zip_no .'　'. $currentUser->todouhuken_mei . $currentUser->sikutyouson_mei . $currentUser->tyoumei }}</span>
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <label for="">会社名</label>
        </div>
        <div class="col-xs-9">
            <span>{{ $currentUser->company_mei ? $currentUser->company_mei : '' }}</span>
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <label class="pad-top-8">所属部署</label>
        </div>
        <div class="col-xs-3 ">
            {{ isset($data['syozokubusyo_mei']) ? $data['syozokubusyo_mei'] : '' }}
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
            $contactMethods = HelperFunc::listContactMethods();
            $contactMethodIdx = 0;
            $contactMethodArr = [];
            foreach ($contactMethods as $key => $label) {
                if (substr($data['renraku_kbn'], $contactMethodIdx, 1) == '1') {
                    $contactMethodArr[] = $label;
                }
                $contactMethodIdx++;
            }
            ?>
            {{ $contactMethodArr ? implode('、', $contactMethodArr) : '' }}
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row title_primary">
        <div class="col-xs-12 pad-top-25 pdl-5">
            <p class="mar-bottom-none lxl_input_relative"><i class="circle"></i><label class="label-bold pdl-15">リフォーム内容</label></p>
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
            ?>
            <div class="col-xs-9 lxl_checkbox lxl_radio check-disable" data-type="radio">
                {{ isset($reformLocates[$data['taisyou_kbn']]) ? $reformLocates[$data['taisyou_kbn']] : '' }}
            </div>
        </div>
    </div>

    <!--zipcode-->
    <div class="row-border">
        <div class="row form-group">
            <div class="col-xs-3">
                <label class="pad-top-8">住所 </label>
            </div>
            <div class="col-xs-9 address-member">
                <div class="row zip-no">
                    <div class="col-xs-2">
                        <label>郵便番号</label>
                    </div>
                    <div class="col-xs-10 lxl_length">
                        {{ isset($data['zip_no']) ? $data['zip_no'] : '' }}
                    </div>
                </div>

                <div class="row mgb-10">
                    <div class="col-xs-2">
                        <label>都道府県名</label>
                    </div>
                    <div class="col-xs-10">
                        {{ isset($data['bkn_todouhuken_mei']) ? $data['bkn_todouhuken_mei'] : '' }}
                    </div>
                </div>
                <div class="row lxl_list_input">
                    <div class="col-xs-2">
                        <label>市区町村名</label>
                    </div>
                    <div class="col-xs-10 row">
                        <div class="col-xs-6">
                            {{ isset($data['bkn_sikutyouson_mei']) ? $data['bkn_sikutyouson_mei'] : '' }}
                        </div>
                    </div>
                </div>
                <div class="row lxl_list_input">
                    <div class="col-xs-2">
                        <label>町名番地</label>
                    </div>
                    <div class="col-xs-10 row">
                        <div class="col-xs-6">
                            {{ isset($data['bkn_tyoumei']) ? $data['bkn_tyoumei'] : '' }}
                        </div>
                    </div>
                </div>
                <div class="row lxl_list_input">
                    <div class="col-xs-2">
                        <label>建物区画名</label>
                    </div>
                    <div class="col-xs-10 row">
                        <div class="col-xs-6">
                            {{ isset($data['bkn_tat_mei']) ? $data['bkn_tat_mei'] : '' }}
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
            $typeBuildings = HelperFunc::typeBuildings();
            $tatSyurui = isset($data['tatsyurui_kbn']) ? $data['tatsyurui_kbn'] : null;
            ?>
            {{ $tatSyurui && isset($typeBuildings[$tatSyurui]) ? $typeBuildings[$tatSyurui] : '' }}
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <span>築年数</span>
        </div>
        <div class="col-xs-9">
            <?php
            $listTiknensus = HelperFunc::listTiknensus();
            $tiknensuKbn = isset($data['tiknensu_kbn']) ? $data['tiknensu_kbn'] : null;
            ?>
            {{ $tiknensuKbn && isset($listTiknensus[$tiknensuKbn]) ? $listTiknensus[$tiknensuKbn] : '' }}
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <span>ご予算</span>
        </div>
        <div class="col-xs-9">
            <?php
            $reformYosans = HelperFunc::listReformYosans();
            $reformYosanKbn = isset($data['reform_yosan_kbn']) ? $data['reform_yosan_kbn'] : null;
            ?>
            {{ $reformYosanKbn && isset($reformYosans[$reformYosanKbn]) ? $reformYosans[$reformYosanKbn] : '' }}
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <span>ご計画の部位</span>
        </div>
        <div class="col-xs-9 group-checkbox">
            @if (isset($data['reform_bui']) && $data['reform_bui'])
                {{ Reform::renderNameByReformBui($data['reform_bui'], $categories) }}
            @endif
        </div>
    </div>
</div>

<div class="row-border">
    <div class="row">
        <div class="col-xs-3">
            <span>ご希望時期</span>
        </div>
        <div class="col-xs-9">
            <?php 
            $listDesiredTimes = HelperFunc::listKiboDates(); 
            ?>
            @if (isset($data['kibo_date']) && isset($listDesiredTimes[$data['kibo_date']]))
                {{ $listDesiredTimes[$data['kibo_date']] }}
            @endif
        </div>
    </div>
</div>

<div class="row-border">
    <div class="mgb-5">その他特記事項（500文字以内）</div>
    <div class="pre-line-space">{{ isset($data['req_memo']) ? $data['req_memo'] : '' }}</div>
</div>

<div class="height-20"></div>
<div class="row-border lxl_del_border">
    <div class="row title_primary">
        <div class="col-xs-12 pad-top-25 pdl-5">
            <p class="mar-bottom-none lxl_input_relative">
                <i class="circle"></i> <label class="label-bold pdl-15">お申込み 検討プラン</label>
            </p>
        </div>
    </div>
</div>
