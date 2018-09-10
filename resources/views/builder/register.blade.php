<?php
use Carbon\Carbon;
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;

$oldData = Session::has('infoUser') ? Session::get('infoUser') : null;

?>
@extends('layouts.layout_building')

@section('title')
    {{ trans('builder.builder_register')}}
@endsection
@section('style')
     <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{asset('/css/building/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart/style.css') }}">
@endsection

@section('content')
<div class="container body_content">
    @if ($errors->has('syain_kbn'))
        {!! $errors->first('syain_kbn', '<div class="alert-panel alert-panel-danger">:message</div>') !!}
    @elseif ($errors->has('syoukai_kbn'))
        {!! $errors->first('syoukai_kbn', '<div class="alert-panel alert-panel-danger">:message</div>') !!}
    @endif
    <form action="{{ route('builder.register.post') }}" method="post">
        {!! csrf_field() !!}
        <div class="row title_primary">
            <div class="col-xs-9">
                <h3>
                    <span>●お申し込み者情報</span>
                </h3>
            </div>
            <div class="col-xs-3 xil_date">
                <span>お申込み日　：　{{date("Y.m.d", time())}}</span>
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
                <span>{{$infoUser->sei_local}}　{{$infoUser->mei_local}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">電話番号</label>
            </div>
            <div class="col-xs-9">
                <div class="row">
                    <div class="col-xs-3">
                        <span>{{$infoUser->idm_denwa_no}}</span>
                    </div>
                    <div class="col-xs-2">
                        <label for="">携帯電話番号</label>
                    </div>
                    <div class="col-xs-7">
                        <span>{{$infoUser->idm_keitai_tel}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">メールアドレス</label>
            </div>
            <div class="col-xs-9">
                <span>{{$infoUser->mail}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">住所</label>
            </div>
            <div class="col-xs-9">
                <span>〒{{substr($infoUser->zip_no, 0, 3)}}-{{substr($infoUser->zip_no, 3, 6)}}　{{$infoUser->todouhuken_mei}}{{$infoUser->sikutyouson_mei}}{{$infoUser->tyoumei}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">会社名</label>
            </div>
            <div class="col-xs-9">
                <span>{{$infoUser->company_mei}}</span>
            </div>
        </div>
        <div class="row department">
            <div class="col-xs-3">
                <label class="pad-top-8" for="">所属部署</label>
            </div>
            <div class="col-xs-3">
                <input type="text" name="syozokubusyo_mei" id="syozokubusyo_mei" class="form-control" tabindex="1"
                @if(old('syozokubusyo_mei') != null)
                    value="{{ old('syozokubusyo_mei') }}"
                @elseif(isset($oldData['syozokubusyo_mei']))
                    value="{{ $oldData['syozokubusyo_mei'] }}"
                @else
                    value=""
                @endif
                />
            </div>
            <div class="col-xs-1 pad-top-8">
                <label for="">社員区分</label>
            </div>
            <div class="col-xs-5 radio-type-emp">
                <?php
                    $oldSyainKbn = null;
                    if (old('syain_kbn') != null ) {
                        $oldSyainKbn = old('syain_kbn');
                    } elseif (isset($oldData['syain_kbn'])) {
                        $oldSyainKbn = $oldData['syain_kbn'];
                    }
                ?>
                <div class="custom-radio">
                    <input type="radio" value="1" name="syain_kbn" id="syain_kbn_first" {{($oldSyainKbn == 1) ? 'checked' : ''}} checked>
                    <label class="" for="syain_kbn_first" tabindex="2">社員・嘱託社員</label>
                </div>
                <div class="custom-radio">
                    <input type="radio" value="2" name="syain_kbn" id="syain_kbn_second"  {{ ($oldSyainKbn == 2) ? 'checked' : '' }}>
                    <label class="" for="syain_kbn_second" tabindex="3">パート社員 （アルバイトは不可）</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="" class="pad-top-8">連絡方法</label>
            </div>
            <div class="col-xs-9 lxl_checkbox">
                <?php
                $oldRenrakuKbn = null;
                if (old('renraku_kbn_check') != null ) {
                    $oldRenrakuKbn = old('renraku_kbn_check');
                } elseif (isset($oldData['renraku_kbn'])) {
                    $oldRenrakuKbn = $oldData['renraku_kbn'];
                }
                $contactMethods = HelperFunc::listContactMethods();
                ?>
                @foreach ($contactMethods as $key => $label)
                <div class="checkbox">
                    <div class="custom-checkbox">
                        <input type="checkbox" name="renraku_kbn_check[{{ $key }}]" id="renraku_kbn_{{ $key }}"
                               {{ isset($oldRenrakuKbn[$key]) && $oldRenrakuKbn[$key] ? 'checked' : '' }}>
                        <label  tabindex="{{ $key + 3}}" for="renraku_kbn_{{ $key }}">{{ $label }}</label>
                    </div>
                </div>
                @endforeach
                <div class="checkbox">
                    <label>※複数選択可</label>
                </div>
                <br>
                <span class="error-mess">{{ $errors->first('renraku_kbn_check') }}</span>
            </div>
        </div>

        <div class="row title_primary">
            <h3>
                <span>●ご紹介いただける方</span>
            </h3>
        </div>
        <div class="row lxl_checkbox lxl_radio">
            <label>ご紹介者様(貴方様)とお施主様（建築予定者様）の関係</label><br />
            <div class="group-relation col-xs-8 col-xs-offset-1">
                <?php
                $builderSyoukais = HelperFunc::listBuilderSyoukais();
                $oldSyoukaiKbn = null;
                if (old('syoukai_kbn') != null ) {
                    $oldSyoukaiKbn = old('syoukai_kbn');
                } elseif (isset($oldData['syoukai_kbn'])) {
                    $oldSyoukaiKbn = $oldData['syoukai_kbn'];
                }
                ?>

                @foreach ($builderSyoukais as $key => $label)
                <div class="custom-radio">
                    <input type="radio" name="syoukai_kbn" id="syoukai_kbn_{{ $key }}" value="{{ $key }}"
                           {{ $oldSyoukaiKbn == $key
                                || (!$oldSyoukaiKbn && $key == ViewConst::BUILDER_SYOUKAI_SELF) ? 'checked' : '' }}>
                    <label tabindex="{{$key + 6}}" class="radio-inline first_checkbox" for="syoukai_kbn_{{ $key }}">{{ $label }}</label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row title_primary">
            <h3>
                <span>ご紹介いただける方の情報</span>
                <span class="red_color">※ご本人の場合は、記入不要です。</span>
            </h3>
        </div>
        <div id="div-disable">
            <div class="row row_input">
                <div class="col-xs-3">
                    <label class="pad-top-8" for="">フリガナ</label>
                </div>
                <div class="col-xs-9 lxl_input row">
                    <div class="col-xs-3 {{ $errors->has('s_sei_kana') ? 'has-error' : ''}}">
                        <?php
                            $oldSSeiKana = null;
                            if (old('s_sei_kana') != null ) {
                                $oldSSeiKana = old('s_sei_kana');
                            } elseif (isset($oldData['s_sei_kana'])) {
                                $oldSSeiKana = $oldData['s_sei_kana'];
                            }
                        ?>
                        <input type="text" name="s_sei_kana" id="s_sei_kana" value="{{ $oldSSeiKana }}" class="form-control" tabindex="13">
                        {!! $errors->first('s_sei_kana', '<i class="error form-control-feedback" data-bv-icon-for="s_sei_kana" style=""></i>') !!}
                        {!! $errors->first('s_sei_kana', '<label class="help-block">:message</label>') !!}
                    </div>
                    <div class="col-xs-3 {{ $errors->has('s_mei_kana') ? 'has-error' : ''}}">
                        <?php
                            $oldSMeiKana = null;
                            if (old('s_mei_kana') != null ) {
                                $oldSMeiKana = old('s_mei_kana');
                            } elseif (isset($oldData['s_mei_kana'])) {
                                $oldSMeiKana = $oldData['s_mei_kana'];
                            }
                        ?>
                        <input type="text" name="s_mei_kana" id="s_mei_kana" value="{{ $oldSMeiKana }}" class="form-control" tabindex="14">
                        {!! $errors->first('s_mei_kana', '<i class="error form-control-feedback" data-bv-icon-for="s_mei_kana" style=""></i>') !!}
                        {!! $errors->first('s_mei_kana', '<label class="help-block">:message</label>') !!}
                    </div>
                    <div class="col-xs-3 line-height-span">
                        <span>（全角カタカナ）</span>
                    </div>

                </div>
            </div>
            <div class="row row_input">
                <div class="col-xs-3">
                    <label class="pad-top-8" for="">氏名</label>
                </div>
                <div class="col-xs-9 lxl_input row">
                    <div class="col-xs-3 {{ $errors->has('s_sei_local') ? 'has-error' : ''}}">
                        <?php
                            $oldSSeiLocal = null;
                            if (old('s_sei_local') != null ) {
                                $oldSSeiLocal = old('s_sei_local');
                            } elseif (isset($oldData['s_sei_local'])) {
                                $oldSSeiLocal = $oldData['s_sei_local'];
                            }
                        ?>
                        <input type="text" name="s_sei_local" id="s_sei_local" value="{{ $oldSSeiLocal }}" class="form-control" tabindex="15">
                        {!! $errors->first('s_sei_local', '<i class="error form-control-feedback" data-bv-icon-for="s_sei_local" style=""></i>') !!}
                        {!! $errors->first('s_sei_local', '<label class="help-block">:message</label>') !!}
                    </div>
                    <div class="col-xs-3 {{ $errors->has('s_mei_local') ? 'has-error' : ''}}">
                        <?php
                            $oldSMeiLocal = null;
                            if (old('s_mei_local') != null ) {
                                $oldSMeiLocal = old('s_mei_local');
                            } elseif (isset($oldData['s_mei_local'])) {
                                $oldSMeiLocal = $oldData['s_mei_local'];
                            }
                        ?>
                        <input type="text" name="s_mei_local" id="s_mei_local" value="{{ $oldSMeiLocal }}" class="form-control" tabindex="16">
                        {!! $errors->first('s_mei_local', '<i class="error form-control-feedback" data-bv-icon-for="s_mei_local" style=""></i>') !!}
                        {!! $errors->first('s_mei_local', '<label class="help-block">:message</label>') !!}
                    </div>
                </div>
            </div>
            <div class="row row_input">
                <div class="col-xs-3">
                    <label for="" class="pad-top-8">電話番号</label>
                </div>
                <div class="col-xs-9">
                    <div class="row pdb-6">
                        <div class="col-xs-2">
                            <p class="control-label">固定電話</p>
                        </div>
                        <div class="col-xs-4 {{ $errors->has('s_idm_denwa_no') ? 'has-error' : ''}}">
                            <?php
                                $oldSIdmDenwaNo = null;
                                if (old('s_idm_denwa_no') != null ) {
                                    $oldSIdmDenwaNo = old('s_idm_denwa_no');
                                } elseif (isset($oldData['s_idm_denwa_no'])) {
                                    $oldSIdmDenwaNo = $oldData['s_idm_denwa_no'];
                                }
                            ?>
                            <input type="text" name="s_idm_denwa_no" id="s_idm_denwa_no" value="{{ $oldSIdmDenwaNo }}" class="form-control" tabindex="17">
                            {!! $errors->first('s_idm_denwa_no', '<i class="error form-control-feedback" data-bv-icon-for="s_idm_denwa_no" style=""></i>') !!}
                            {!! $errors->first('s_idm_denwa_no', '<label class="help-block">:message</label>') !!}
                        </div>
                        <div class="input-box col-xs-6">
                            <span class="control-label mgt-10-x">固定電話、携帯電話、両方もしくはどちらか片方を入力してください。（番号ハイフン無し、半角数字）</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2">
                            <p class="control-label">携帯電話</p>
                        </div>
                        <div class="col-xs-4 {{ $errors->has('s_idm_keitai_tel') ? 'has-error' : ''}}">
                            <?php
                                $oldSIdmKeitaiTel = null;
                                if (old('s_idm_keitai_tel') != null ) {
                                    $oldSIdmKeitaiTel = old('s_idm_keitai_tel');
                                } elseif (isset($oldData['s_idm_keitai_tel'])) {
                                    $oldSIdmKeitaiTel = $oldData['s_idm_keitai_tel'];
                                }
                            ?>
                            <input type="text" name="s_idm_keitai_tel" id="s_idm_keitai_tel" value="{{ old('s_idm_keitai_tel') }}" class="form-control" tabindex="18">
                            {!! $errors->first('s_idm_keitai_tel', '<i class="error form-control-feedback" data-bv-icon-for="s_idm_keitai_tel" style=""></i>') !!}
                            {!! $errors->first('s_idm_keitai_tel', '<label class="help-block">:message</label>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_input">
                <div class="col-xs-3">
                    <label for="" class="pad-top-8">メールアドレス </label>
                </div>
                <div class="col-xs-9 row">
                    <div class="col-xs-4 {{ $errors->has('s_mail') ? 'has-error' : ''}}">
                        <?php
                            $oldSMail = null;
                            if (old('s_mail') != null ) {
                                $oldSMail = old('s_mail');
                            } elseif (isset($oldData['s_mail'])) {
                                $oldSMail = $oldData['s_mail'];
                            }
                        ?>
                        <input type="text" name="s_mail" id="s_mail" value="{{ $oldSMail }}" class="form-control" tabindex="20">
                        {!! $errors->first('s_mail', '<i class="error form-control-feedback" data-bv-icon-for="s_mail" style=""></i>') !!}
                        {!! $errors->first('s_mail', '<label class="help-block">:message</label>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 padding-span">
                    <label for="">住所 </label>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-2 padding-span">
                            <label for="">郵便番号</label>
                        </div>
                        <div class="col-xs-10 lxl_length row">
                            <div class="col-xs-2 {{ $errors->has('zip21') ? 'has-error' : ''}}">
                                <?php
                                    $oldZip21 = null;
                                    if (old('zip21') != null ) {
                                        $oldZip21 = old('zip21');
                                    } elseif (isset($oldData['zip21'])) {
                                        $oldZip21 = $oldData['zip21'];
                                    }
                                ?>
                                <input type="text" name="zip21" id="s_zip_no1" size="3" maxlength="3" value="{{ $oldZip21 }}" class="form-control" tabindex="21">
                                {!! $errors->first('zip21', '<i class="error form-control-feedback" data-bv-icon-for="zip21" style=""></i>') !!}
                                {!! $errors->first('zip21', '<label class="help-block">:message</label>') !!}
                            </div>
                            <div class="lxl-pos">-</div>
                            <div class="col-xs-2 {{ $errors->has('zip22') ? 'has-error' : ''}}">
                                <?php
                                    $oldZip22 = null;
                                    if (old('zip22') != null ) {
                                        $oldZip22 = old('zip22');
                                    } elseif (isset($oldData['zip22'])) {
                                        $oldZip22 = $oldData['zip22'];
                                    }
                                ?>
                                <input type="text" name="zip22" id="s_zip_no2" size="4" maxlength="4" value="{{ $oldZip22 }}" class="form-control" tabindex="22">
                                {!! $errors->first('zip22', '<i class="error form-control-feedback" data-bv-icon-for="zip22" style=""></i>') !!}
                                {!! $errors->first('zip22', '<label class="help-block">:message</label>') !!}
                            </div>
                            <div class="col-xs-8 line-height-span lxl-line-height">
                                <button type="button" class="color_gray js-button" tabindex="23">自動住所入力</button>
                                <span>※郵便番号を入力後、クリックしてください。</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 padding-span">
                            <label for="">都道府県名</label>
                        </div>
                        <div class="col-xs-4 row_input {{ $errors->has('pref21') ? 'has-error' : ''}}">
                            <?php
                                $oldPref21 = '';
                                if (old('addr21') != null ) {
                                    $oldPref21 = old('pref21');
                                } elseif (isset($oldData['s_todouhuken_mei'])) {
                                    $oldPref21 = $oldData['s_todouhuken_mei'];
                                }
                            ?>
                            <select class="select form-control" name="pref21" id="pref21" tabindex="24">
                                <option></option>
                                @foreach($provinces as $key =>$province)
                                <option value="{{ $key }}" {{ $oldPref21 == $key ? 'selected' : '' }}>{{ $province }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('pref21', '<i class="error form-control-feedback" data-bv-icon-for="pref21" style=""></i>') !!}
                            {!! $errors->first('pref21', '<label class="help-block">:message</label>') !!}
                        </div>
                    </div>
                    <div class="row lxl_list_input">
                        <div class="col-xs-2 padding-span">
                            <label for="">市区町村名</label>
                        </div>
                        <div class="col-xs-10 row">
                            <div class="col-xs-6 {{ $errors->has('addr21') ? 'has-error' : ''}}">
                                <?php
                                    $oldAddr21 = null;
                                    if (old('addr21') != null ) {
                                        $oldAddr21 = old('addr21');
                                    } elseif (isset($oldData['s_sikutyouson_mei'])) {
                                        $oldAddr21 = $oldData['s_sikutyouson_mei'];
                                    }
                                ?>
                                <input type="text" name="addr21" size="40" value="{{ $oldAddr21 }}" class="addr21 form-control" tabindex="25" >
                                {!! $errors->first('addr21', '<i class="error form-control-feedback" data-bv-icon-for="addr21" style=""></i>') !!}
                                {!! $errors->first('addr21', '<label class="help-block">:message</label>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row lxl_list_input">
                        <div class="col-xs-2 padding-span">
                            <label for="">町名番地</label>
                        </div>
                        <div class="col-xs-10 row">
                            <div class="col-xs-6 {{ $errors->has('strt21') ? 'has-error' : ''}}">
                                <?php
                                    $oldStrt21 = null;
                                    if (old('strt21') != null ) {
                                        $oldStrt21 = old('strt21');
                                    } elseif (isset($oldData['s_tyoumei'])) {
                                        $oldStrt21 = $oldData['s_tyoumei'];
                                    }
                                ?>
                                <input type="text" name="strt21" size="40" value="{{ $oldStrt21 }}" class="strt21 form-control" tabindex="26">
                                {!! $errors->first('strt21', '<i class="error form-control-feedback" data-bv-icon-for="strt21" style=""></i>') !!}
                                {!! $errors->first('strt21', '<label class="help-block">:message</label>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row lxl_list_input">
                        <div class="col-xs-2 padding-span">
                            <label for="">建物区画名</label>
                        </div>
                        <div class="col-xs-10 row">
                            <div class="col-xs-6 {{ $errors->has('s_tat_mei') ? 'has-error' : ''}}">
                                <?php
                                    $oldSTatMei = null;
                                    if (old('s_tat_mei') != null ) {
                                        $oldSTatMei = old('s_tat_mei');
                                    } elseif (isset($oldData['s_tat_mei'])) {
                                        $oldSTatMei = $oldData['s_tat_mei'];
                                    }
                                ?>
                                <input type="text" name="s_tat_mei" id="s_tat_mei" value="{{ $oldSTatMei }}" class="form-control" tabindex="27">
                                {!! $errors->first('s_tat_mei', '<i class="error form-control-feedback" data-bv-icon-for="s_tat_mei" style=""></i>') !!}
                                {!! $errors->first('s_tat_mei', '<label class="help-block">:message</label>') !!}
                            </div>
                            <div class="col-xs-6 line-height-span">
                                <span>（建物名、部屋番号）</span>
                            </div>

                        </div>
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
                        <span id="bkn_todouhuken_mei">{{ (isset($districtName)) ? $districtName : '' }}</span>
                        <input type="hidden" name="bkn_todouhuken_mei" class="bkn_todouhuken_mei" value="{{ (isset($districtName)) ? $districtName : '' }}">
                    </div>
                </div>
                <div class="row lxl_city">
                    <div class="col-lg-2 padding-span">
                        <span>市区町村名</span>
                    </div>
                    <div class="col-lg-10 row">
                        <?php
                            $oldBknSikutyousonMei = null;
                            if( old('bkn_sikutyouson_mei') != null) {
                                $oldBknSikutyousonMei = old('bkn_sikutyouson_mei');
                            } elseif (isset($oldData['bkn_sikutyouson_mei'])) {
                                $oldBknSikutyousonMei = $oldData['bkn_sikutyouson_mei'];
                            }
                        ?>
                        <div class="col-xs-6 {{ $errors->has('bkn_sikutyouson_mei') ? 'has-error' : ''}}">
                            <input type="text" name="bkn_sikutyouson_mei" id="bkn_sikutyouson_mei" value="{{ $oldBknSikutyousonMei }}" class="form-control" tabindex="28">
                            {!! $errors->first('bkn_sikutyouson_mei', '<i class="error form-control-feedback" data-bv-icon-for="bkn_sikutyouson_mei" style=""></i>') !!}
                            {!! $errors->first('bkn_sikutyouson_mei', '<label class="help-block">:message</label>') !!}
                        </div>
                        <div class="col-xs-6 line-height-span">
                            <span>※決まっていれば、ご記入ください</span>
                        </div>
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
                <input type="hidden" name="kibotaio_kbn" value="{{ (isset($taiouKbn['code'])) ? $taiouKbn['code'] : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">案件区分</label>
            </div>
            <div class="col-xs-9 lxl_radio">
                <?php
                    $typecheck01 = array(1, 2, 3, 4, 6, 7, 8, 9);
                    $typecheck02 = array(5, 6, 7, 8, 9);
                ?>
                <div class="custom-checkbox left-mgr-10">
                    <input type="checkbox" name="anken_kbn[]" value="01" id="anken_kbn_01"
                        @if (old('anken_kbn') == '01'|| in_array( $type ,$typecheck01))
                          checked
                        @endif
                    >

                    <label tabindex="29" class="radio-inline" for="anken_kbn_01">新築</label>
                </div>
                <div class="custom-checkbox left-mgr-10">
                    <input type="checkbox" name="anken_kbn[]" value="02" id="anken_kbn_02"
                        @if (old('anken_kbn') == '02')
                           checked
                        @endif
                    >
                    <label tabindex="30" class="radio-inline" for="anken_kbn_02">建替え</label>
                </div>
                <div class="custom-checkbox left-mgr-10">
                    <input type="checkbox" name="anken_kbn[]" value="03" id="anken_kbn_03"
                        @if (old('anken_kbn') == '03')
                           checked
                        @endif
                    >
                    <label tabindex="31" class="radio-inline" for="anken_kbn_03">分譲</label>
                </div>

                <div class="custom-checkbox left-mgr-10">
                    <input type="checkbox" name="anken_kbn[]" value="04" id="anken_kbn_04"
                        @if (old('anken_kbn') == '04'|| in_array( $type ,$typecheck02))
                           checked
                        @endif
                    >
                    <label tabindex="32" class="radio-inline" for="anken_kbn_04">マンション</label>
                </div>

                <div class="custom-checkbox left-mgr-10">
                    <input type="checkbox" name="anken_kbn[]" value="05" id="anken_kbn_05" >
                    <label tabindex="33" class="radio-inline" for="anken_kbn_05">分譲</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">土地有無</label>
            </div>
            <div class="col-xs-9">
                <div class="custom-checkbox">
                    <?php
                        $oldTochiFlg = null;
                        if (old('tochi_flg') != null) {
                            $oldTochiFlg = old('tochi_flg');
                        } elseif (isset($oldData['tochi_flg'])) {
                            $oldTochiFlg = $oldData['tochi_flg'];
                        }
                    ?>
                    <input type="checkbox" name="tochi_flg" id="tochi_flg" {{ $oldTochiFlg != null ? 'checked' : '' }}>
                    <label for="tochi_flg" tabindex="33">有り</label>
                    <span>※建築予定の土地をお持ちで、その土地で建築を検討されている方はチェックを入れてください</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="" class="pad-top-8">予算総額区分</label>
            </div>
            <div class="col-xs-9">
                <?php
                    $builderYousans = HelperFunc::listBuilderYosans();
                    $oldYosanAllKbn = null;
                    if (old('yosan_all_kbn') != null) {
                        $oldYosanAllKbn = old('yosan_all_kbn');
                    } elseif (isset($oldData['yosan_all_kbn'])) {
                        $oldYosanAllKbn = $oldData['yosan_all_kbn'];
                    }
                ?>
                <select class="select lxl_width_checkbox form-control" name="yosan_all_kbn" tabindex="34">
                    @foreach ($builderYousans as $key => $label)
                        <option value="{{ $key }}" {{ $oldYosanAllKbn == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label for="">中古住宅紹介希望区分</label>
            </div>
            <div class="col-xs-2 {{ $errors->has('tyuko_flg') ? 'has-error' : ''}}">
                <div class="custom-checkbox">
                   <?php
                    $oldTyukoFlg = null;
                    if (old('tyuko_flg') != null) {
                        $oldTyukoFlg = old('tyuko_flg');
                    } elseif (isset($oldData['tyuko_flg'])) {
                        $oldTyukoFlg = $oldData['tyuko_flg'];
                    }
                ?>
                <input type="checkbox" name="tyuko_flg" id="tyuko_flg" {{ $oldTyukoFlg != null ? 'checked' : '' }}>
                <label for="tyuko_flg" tabindex="35">希望する</label>
                {!! $errors->first('tyuko_flg', '<label class="help-block">:message</label>') !!}
                </div>
            </div>
            <div class="col-xs-7">
                <span>※中古住宅も合わせて提案ご希望の方はこちらにチェックを入れてください</span><br />
                <span>・チェックをされた方には、株式会社LIXILリアルティからもコンタクトさせていただきます。</span>
            </div>
        </div>
        <div class="row title_primary">
            <h3>
                <span>●折衝希望先</span>
            </h3>
        </div>

        @if (isset($builders) && $builders)
        <div class="row list_city">
            <span id="kibo_builder">
                {{ implode(" ● ",$builders) }}
                @foreach($builders as $key => $value)
                   <input type="hidden" name="kibo_builder[]" value="{{ $key }}" />
                @endforeach
            </span>
            <input type="hidden" name="kibo_builder_txt" id="kibo_builder_txt" value="{{ (isset($builders) && $builders) ? implode(" ● ",$builders) : '' }}">
        </div>
        @endif

        <div class="row title_primary span_title">
            <h3>
                <span>●ご連絡方法</span>
                <span>（お施主様に対して）</span>
            </h3>
        </div>
        <div class="row list_checkbox list_radio contact-method">
            <?php
            $seshuRenrakus = HelperFunc::listBuilderSeshuRenrakus();
            $oldSeshuRenraku = null;
            if (old('seshu_renraku') != null) {
                $oldSeshuRenraku = old('seshu_renraku');
            }elseif(isset($oldData['seshu_renraku'])) {
                $oldSeshuRenraku = $oldData['seshu_renraku'];
            }
            ?>
            <ul>
                @foreach ($seshuRenrakus as $key => $label)
                <li>
                    <div class="custom-radio">
                        <input type="radio" name="seshu_renraku" id="seshu_renraku_{{ $key }}" value="{{ $key }}"
                               {{ ($oldSeshuRenraku == $key || (!$oldSeshuRenraku && $key == '01')) ? 'checked' : '' }}>
                        <label tabindex="{{ $key +35}}" for="seshu_renraku_{{ $key }}">{{ $label }}</label>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="row lxl_item_row">
            <div class="col-xs-2">
                <span>ご確認</span>
            </div>
            <div class="col-xs-10 pdl-0">
                <div class="checkbox orange_color">
                    <span class="red_color mgl-17 font-size-17"><b>今回の案件を検討するにあたって、各展示場等で名簿記載や折衝をしていません。</b></span>
                </div><br>
                <div class="checkbox red_color_input custom-checkbox">
                    <input type="checkbox" name="check_test" id="check_test">
                    <label tabindex="39" for="check_test" class="red_color"><b class="font-size-17">必ずチェック下さい。</b></label>
                </div>

                {!! $errors->first('check_test', '<label class="help-block">:message</label>') !!}
            </div>
        </div>
        <div class="row lxl_item_row border-bottom-none-builder">
            <div class="col-xs-2">
                <span>規約同意</span>
            </div>
            <div class="col-xs-7 check-role">
                <div class="checkbox orange_color">
                    <span class="red_color mgl-17 font-size-17" ><b>LIXIL Family STORE 住宅購入･紹介の規約に同意します。</b></span>
                </div><br>
                <div class="checkbox red_color_input custom-checkbox">
                    <input type="checkbox" name="check_role" id="check_role">
                    <label tabindex="40" for="check_role" class="red_color" ><b class="font-size-17">必ずチェック下さい。</b></label>

                </div>

                {!! $errors->first('check_role', '<label class="help-block">:message</label>') !!}
            </div>
        </div>
        <div class="row lxl_item_row border-bottom-none-builder">
            <div class="col-xs-3 button-modal float-right">
                <a id="contract-popup" tabindex="41" href="" target="_blank" class="btn-primary btn_introduce">住宅購入･紹介 利用規約を確認する</a>
            </div>
        </div>
        <div class="row lxl_areatxt">
            <span>その他特記事項（500文字以内）</span>
            <div class="panding-bottom-20 mgt-10">
                <?php
                $oldReqMemo = null;
                if (old('req_memo') != null) {
                    $oldReqMemo = old('req_memo');
                }elseif(isset($oldData['req_memo'])) {
                    $oldReqMemo = $oldData['req_memo'];
                }
                ?>
                <textarea name="req_memo" class="text-art-box" tabindex="42" >{!! $oldReqMemo !!}</textarea>
                {!! HelperFunc::errorField('req_memo') !!}
            </div>
        </div>
        <div class="row lxl_submit ">
            <button type="submit" tabindex="43" class="btn_submit action-btn custom-btn btn-auto " >次に進む</button>
        </div>
    </form>
    <div class="row lxl_back">
        <i class="lxl-icon-circle circle-high keyboard_backspace icon-right"></i>
        <a  tabindex="44" href="{{ $urlBack!= '' ? $urlBack : route('builder.index') }}">戻る</a>
    </div>
</div>
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

@section('javascript')
    <script>
        var inforUser = {!! json_encode($infoUser->toArray()) !!};
        var BUILDER_SYOUKAI_SELF = '{{ ViewConst::BUILDER_SYOUKAI_SELF }}';
        var linkPdfOfUser = "{!! route('link.LIXIL_Family_STORE住宅購入紹介版利用規約（住宅購入）LIXIL社員.pdf') !!}";
        var linkPdfOther = "{!! route('link.LIXIL_Family_STORE住宅購入紹介版利用規約（案件紹介）LIXIL社員.pdf') !!}";
    </script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="{{ asset('js/building/register.js') }}" charset="UTF-8"></script>
@endsection
