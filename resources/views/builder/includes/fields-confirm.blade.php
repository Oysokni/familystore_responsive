<?php
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;
?>

<div class="row">
    <div class="col-xs-3">
        <label for="">お申し込みNo</label>
    </div>
    <div class="col-xs-9">
        <span>{{ $data['kento_plan_id'] }}</span>
    </div>
</div>
<div class="row">
    <div class="col-xs-3">
        <label for="">会員区分/会員番号</label>
    </div>
    <div class="col-xs-9">
        <span>{{ HelperFunc::showUserId() }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">氏名</label>
    </div>
    <div class="col-xs-9">
        <span>{{ $data['sei_local'] }}　{{ $data['mei_local'] }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">電話番号</label>
    </div>
    <div class="col-xs-9">
        <div class="row">
            <div class="col-xs-3">
                <span>{{ $data['idm_denwa_no'] }}</span>
            </div>
            <div class="col-xs-2">
                <label for="">携帯電話番号</label>
            </div>
            <div class="col-xs-7">
                <span>{{ $data['idm_keitai_tel'] }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">メールアドレス</label>
    </div>
    <div class="col-xs-9">
        <span>{{ $data['mail'] }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">住所</label>
    </div>
    <div class="col-xs-9">
        <span>{{ $data['address'] }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">会社名</label>
    </div>
    <div class="col-xs-9">
        <span>{{ $data['company_mei'] }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">所属部署</label>
    </div>
    <div class="col-xs-3">
        <span>{{ $data['syozokubusyo_mei'] }}</span>
    </div>
    <div class="col-xs-2 lxl-right">
        <label for="">社員区分</label>
    </div>
    <div class="col-xs-4 lxl_radio">
        <label class="radio-inline">
            @if ($data['syain_kbn'] == 1)
                <span>社員・嘱託社員</span>
            @elseif ($data['syain_kbn'] == 2)
                <span>パート社員 （アルバイトは不可）</span>
            @endif
        </label>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">連絡方法</label>
    </div>
    <div class="col-xs-9 lxl_checkbox">
        <?php
        $contactMethods = HelperFunc::listContactMethods();
        $contactMethodIdx = 0;
        $contactMethodArr = [];
        foreach ($contactMethods as $key => $label) {
            if (isset($data['renraku_kbn']) && substr($data['renraku_kbn'], $contactMethodIdx, 1) == '1') {
                $contactMethodArr[] = $label;
            }
            $contactMethodIdx++;
        }
        ?>
        {{ $contactMethodArr ? implode('、', $contactMethodArr) : '' }}
    </div>
</div>

<div class="row title_primary">
    <h3>
        <span>●ご紹介いただける方</span>
    </h3>
</div>

<div class="row">
    <label class="col-xs-6">ご紹介者様(貴方様)とお施主様（建築予定者様）の関係</label>
    <label class="col-xs-6">
        <?php
        $builderSyoukais = HelperFunc::listBuilderSyoukais();
        ?>
        @if (isset($data['syoukai_kbn']) && isset($builderSyoukais[$data['syoukai_kbn']]))
            <span>{{ $builderSyoukais[$data['syoukai_kbn']] }}</span>
        @endif
    </label>
</div>

<div class="row row_input">
    <div class="col-xs-3">
        <label for="">フリガナ</label>
    </div>
    <div class="col-xs-9 lxl_input">
        <span>{{ $data['s_sei_kana'] }}</span>　<span>{{ $data['s_mei_kana'] }}</span>
    </div>
</div>

<div class="row row_input">
    <div class="col-xs-3">
        <label for="">氏名</label>
    </div>
    <div class="col-xs-9 lxl_input">
        <span>{{ $data['s_sei_local'] }}</span>　<span>{{ $data['s_mei_local'] }}</span>
    </div>
</div>

<div class="row row_input">
    <div class="col-xs-3">
        <label for="">電話番号</label>
    </div>
    <div class="col-xs-9 lxl_radio">
        <div class="row">
            <div class="col-xs-3">
                <label for="">固定電話</label>
            </div>
            <div class="col-xs-9">
                @if ($data['s_idm_keitai_tel'])
                <span>{{ $data['s_idm_keitai_tel'] }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">携帯電話</label>
            </div>
            <div class="col-xs-9">
                @if ($data['s_idm_denwa_no'])
                <span>{{ $data['s_idm_denwa_no'] }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row row_input">
    <div class="col-xs-3">
        <label for="">メールアドレス </label>
    </div>
    <div class="col-xs-9 lxl_radio">
        <span>{{ $data['s_mail'] }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">住所 </label>
    </div>
    <div class="col-xs-9">
        <div class="row">
            <div class="col-xs-3">
                <label for="">郵便番号</label>
            </div>
            <div class="col-xs-9 lxl_length">
                <span>{{ $data['zip21'] ? $data['zip21'] : ''}}</span>-<span>{{ $data['zip22'] ? $data['zip22'] : ''}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">都道府県名</label>
            </div>
            <div class="col-xs-9">
                @if ($data['s_todouhuken_mei'])
                    <span>{{ $data['s_todouhuken_mei'] }}</span>
                @endif
            </div>
        </div>
        <div class="row lxl_list_input">
            <div class="col-xs-3">
                <label for="">市区町村名</label>
            </div>
            <div class="col-xs-9 ">
                @if ($data['s_sikutyouson_mei'])
                    <span>{{ $data['s_sikutyouson_mei'] }}</span>
                @endif
            </div>
        </div>
        <div class="row lxl_list_input">
            <div class="col-xs-3">
                <label for="">町名番地</label>
            </div>
            <div class="col-xs-9">
                @if ($data['s_tyoumei'])
                    <span>{{ $data['s_tyoumei'] }}</span>
                @endif
            </div>
        </div>
        <div class="row lxl_list_input">
            <div class="col-xs-3">
                <label for="">建物区画名</label>
            </div>
            <div class="col-xs-9">
                @if ($data['s_tat_mei'])
                    <span>{{ $data['s_tat_mei'] }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row title_primary">
    <h3>
        <span>●ご計画内容</span>
    </h3>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">建築予定地 </label>
    </div>
    <div class="col-xs-9">
        <div class="row address">
            <div class="col-lg-2">
                <span>都道府県名 ：</span>
            </div>
            <div class="col-lg-10">
                <span id="bkn_todouhuken_mei">
                    @if ($data['bkn_todouhuken_mei'])
                        <span>{{ $data['bkn_todouhuken_mei'] }}</span>
                    @endif
                </span>
            </div>
        </div>
        <div class="row lxl_city">
            <div class="col-lg-2">
                <span>市町村名</span>
            </div>
            <div class="col-lg-10">
                @if ($data['bkn_sikutyouson_mei'])
                    <span>{{ $data['bkn_sikutyouson_mei'] }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">希望対応先</label>
    </div>
    <div class="col-xs-9">
        <span>{{ (isset($taiouKbn['name'])) ? $taiouKbn['name'] : '' }}</span>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">案件区分</label>
    </div>
    <div class="col-xs-9 lxl_radio">
        <?php
        $builderAnkens = HelperFunc::listBuilderAnkens();
        ?>
        <label>
            @if (isset($data['anken_kbn']) && !empty($data['anken_kbn']) )
                @foreach($data['anken_kbn'] as $key => $nameKbn)
                    @if ($key < (count($data['anken_kbn']) - 1))
                     {{ $builderAnkens[$nameKbn].','.'&nbsp;' }}                     
                    @else 
                     {{ $builderAnkens[$nameKbn] }}
                    @endif
                @endforeach
            @endif
        </label>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">土地有無</label>
    </div>
    <div class="col-xs-9">
        @if ($data['tochi_flg'] != NULL && $data['tochi_flg'] != 0)
            <span>有り</span>
        @endif
        
        @if ($data['tochi_flg'] != NULL && $data['tochi_flg'] =='on' )
            <span>有り</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">予算総額区分</label>
    </div>
    <div class="col-xs-9">
        <?php
        $builderYousans = HelperFunc::listBuilderYosans();
        ?>
        @if (isset($data['yosan_all_kbn']) && isset($builderYousans[$data['yosan_all_kbn']]))
        <span>{{ $builderYousans[$data['yosan_all_kbn']] }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
        <label for="">中古住宅紹介希望区分</label>
    </div>
    <div class="col-xs-2">
        @if ($data['tyuko_flg'] != NULL && $data['tyuko_flg'] != 0)
            <span>希望する</span>
        @endif
        
        @if ($data['tyuko_flg'] != NULL && $data['tyuko_flg'] =='on' )
             <span>希望する</span>
        @endif
    </div>
</div>

<div class="row title_primary">
    <h3>
        <span>●折衝希望先</span>
    </h3>
</div>

@if (isset($data['kibo_builder_txt']))
<div class="row list_city">
    {{ $data['kibo_builder_txt'] }}
</div>
@endif

<div class="row title_primary span_title">
    <h3>
        <span>●ご連絡方法</span>
        <span>（お施主様に対して）</span>
    </h3>
</div>

<div class="row list_checkbox list_radio">
    <?php
    $seshuRenrakus = HelperFunc::listBuilderSeshuRenrakus();
    ?>
    @if (isset($data['seshu_renraku']) && isset($seshuRenrakus[$data['seshu_renraku']]))
        <span>{{ $seshuRenrakus[$data['seshu_renraku']] }}</span>
    @endif
</div>

<div class="row lxl_areatxt">
    <span>その他特記事項（500文字以内）</span><br /><br />
    @if (isset($data['req_memo']) && $data['req_memo'] != NULL)
        <span>{{ $data['req_memo'] }}</span>
    @endif
</div>
