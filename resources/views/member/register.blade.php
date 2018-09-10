@extends('layouts.auth')

@section('title')

{{ trans('page.member_register') }}

@endsection

@section('body_class', 'no-border-header')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<?php
use Illuminate\Support\Facades\Input;

$old = Input::old();
?>
<div class="register-member">
    <div class="body-header">
        <div class="logo-title">
            会員登録（LIXILグループ従業員の方）
        </div>
    </div>
    <div class="text-right bread">
    </div>
    <div class="steps row">
        <div class="list-steps col-xs-10 col-xs-offset-2 mgl-80">
            <div class="col-xs-4 active">
                <span>1</span>
                <span>会員情報入力</span>
            </div>
            <div class="col-xs-4">
                <span>2</span>
                <span>入力内容確認</span>
            </div>
            <div class="col-xs-4">
                <span>3</span>
                <span>会員登録完了</span>
            </div>
        </div>
    </div>
    <div class="form-register-member">
        <form action="{{ route('member.register') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="mail" @if(isset($newMember) && count($newMember)) value="{{ $newMember['mail'] }}" @endif/>
            <div class="form-label title-form"">会員情報入力</div>
            <div class=" form-horizontal form-label-left">
                <div class="form-body">

                    <!-- label email -->
                    <div class="form-group">
                        <div class="col-xs-3">
                            <p class="control-label">メールアドレス</p>
                        </div>
                        <div class="input-box col-xs-5">
                            <p class="control-label"> @if(isset($newMember) && count($newMember)) {{ $newMember['mail'] }} @endif</p>
                        </div>
                    </div>
                    <!-- end label email -->

                    <!-- input name member -->
                    <div class="form-group">
                        <div class="col-xs-3">
                            <p class="control-label">氏名</p>
                        </div>
                        <div class="input-box col-xs-3 {{ $errors->has('sei_local') ? 'has-error' : ''}}">
                            <div class="row mgb-15">
                                <div class="col-xs-3 mgt-5">
                                    <span>氏</span>
                                </div>
                                <div class="col-xs-9 {{ $errors->has('mei_local') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="sei_local"
                                           @if(isset($old['sei_local'])) value="{{ old('sei_local') }}"
                                           @elseif(isset($newMember['sei_local'])) value="{!! $newMember['sei_local'] !!}" @endif />
                                           {!! $errors->first('sei_local', '<i class="error form-control-feedback" data-bv-icon-for="sei_local" style=""></i>') !!}
                                    {!! $errors->first('sei_local', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 mgt-5">
                                    <span>セイ</span>
                                </div>
                                <div class="col-xs-9 {{ $errors->has('sei_kana') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="sei_kana"
                                           @if(isset($old['sei_kana'])) value="{{ old('sei_kana') }}"
                                           @elseif(isset($newMember['sei_kana'])) value="{!! $newMember['sei_kana'] !!}" @endif />
                                           {!! $errors->first('sei_kana', '<i class="error form-control-feedback" data-bv-icon-for="sei_kana" style=""></i>') !!}
                                    {!! $errors->first('sei_kana', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="input-box col-xs-3">
                            <div class="row mgb-15">
                                <div class="col-xs-3 mgt-5">
                                    <span>名</span>
                                </div>
                                <div class="col-xs-9 {{ $errors->has('mei_local') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="mei_local"
                                           @if(isset($old['mei_local'])) value="{{ old('mei_local') }}"
                                           @elseif(isset($newMember['sei_local'])) value="{!! $newMember['mei_local'] !!}" @endif />
                                           {!! $errors->first('mei_local', '<i class="error form-control-feedback" data-bv-icon-for="mei_local" style=""></i>') !!}
                                    {!! $errors->first('mei_local', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                            <div class="row mgb-15">
                                <div class="col-xs-3 mgt-5">
                                    <span>メイ</span>
                                </div>
                                <div class="col-xs-9 {{ $errors->has('mei_kana') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="mei_kana"
                                           @if(isset($old['mei_kana'])) value="{{ old('mei_kana') }}"
                                           @elseif(isset($newMember['mei_kana'])) value="{!! $newMember['mei_kana'] !!}" @endif />
                                           {!! $errors->first('mei_kana', '<i class="error form-control-feedback" data-bv-icon-for="mei_kana" style=""></i>') !!}
                                    {!! $errors->first('mei_kana', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end input name member -->

                    <!-- input number phone member -->
                    <div class="form-group">
                        <div class="col-xs-3">
                            <p class="control-label">電話番号</p>
                        </div>
                        <div class="col-xs-9 number-phone">
                            <div class="row">
                                <div class="input-box col-xs-2">
                                    <p class="control-label">固定電話</p>
                                </div>
                                <div class="input-box col-xs-4 {{ $errors->has('idm_denwa_no') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="idm_denwa_no"
                                           @if(isset($old['idm_denwa_no'])) value="{{ old('idm_denwa_no') }}"
                                           @elseif(isset($newMember['idm_denwa_no'])) value="{!! $newMember['idm_denwa_no'] !!}" @endif />
                                    {!! $errors->first('idm_denwa_no', '<i class="error form-control-feedback" data-bv-icon-for="idm_denwa_no" style=""></i>') !!}
                                    {!! $errors->first('idm_denwa_no', '<span class="error-mess">:message</span>') !!}
                                </div>
                                <div class="input-box col-xs-6">
                                    <p class="control-label mgt-10-x">固定電話、携帯電話、両方もしくはどちらか片方を入力してください。
（番号ハイフン無し、半角数字）</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-box col-xs-2">
                                    <p class="control-label">携帯電話</p>
                                </div>
                                <div class="input-box col-xs-4 {{ $errors->has('idm_keitai_tel') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="idm_keitai_tel"
                                           @if(isset($old['idm_keitai_tel'])) value="{{ old('idm_keitai_tel') }}"
                                           @elseif(isset($newMember['idm_keitai_tel'])) value="{!! $newMember['idm_keitai_tel'] !!}" @endif />
                                    {!! $errors->first('idm_keitai_tel', '<i class="error form-control-feedback" data-bv-icon-for="idm_keitai_tel" style=""></i>') !!}
                                    {!! $errors->first('idm_keitai_tel', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input number phone member -->

                    <!-- input zip_no, address member -->
                    <div class="form-group">
                        <div class="col-xs-3">
                            <p class="control-label">自宅住所</p>
                        </div>
                        <div class="col-xs-9 address-member">
                            <div class="row zip-no">
                                <div class="input-box">
                                    <p class="control-label col-xs-2">郵便番号</p>
                                </div>
                                <div class="input-box col-xs-10 zip">
                                    <div class="input-box col-xs-2 zip-zip {{ $errors->has('zip_first') ? 'has-error' : ''}} ">
                                        <input type="text" class="form-control" size="3" maxlength="3" name="zip_first"
                                               @if(isset($old['zip_first'])) value="{{ old('zip_first') }}"
                                               @elseif(isset($newMember['zip_first'])) value="{!! $newMember['zip_first'] !!}" @endif />
                                               {!! $errors->first('zip_first', '<i class="error form-control-feedback" data-bv-icon-for="zip_first" style=""></i>') !!}
                                    </div>
                                    <span class="hyphen">-</span>
                                    <div class="input-box col-xs-2 zip-zip {{ $errors->has('zip_second') ? 'has-error' : ''}} ">
                                        <input type="text" class="form-control" size="4" maxlength="4" name="zip_second"
                                               @if(isset($old['zip_second'])) value="{{ old('zip_second') }}"
                                               @elseif(isset($newMember['zip_second'])) value="{!! $newMember['zip_second'] !!}" @endif />
                                               {!! $errors->first('zip_second', '<i class="error form-control-feedback" data-bv-icon-for="zip_second" style=""></i>') !!}
                                    </div>
                                    <button type="button" class="btn-add-zip">自動住所入力</button>
                                    <span>※郵便番号を入力後、クリックしてください。</span>
                                </div>
                                <div class="col-xs-10 col-xs-offset-2 {{ $errors->has('zip_second') || $errors->has('zip_first')  ? 'has-error' : ''}}">
                                    @if (!empty($errors->first('zip_first')) || !empty($errors->first('zip_second')))
                                    <span class="error-mess">{{ $errors->first('zip_first') }}</span>
                                    <span class="error-mess">{{ $errors->first('zip_second') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-box col-xs-2 ">
                                    <p class="control-label">都道府県名</p>
                                </div>
                                <div class="input-box col-xs-3 {{ $errors->has('todouhuken_mei') ? 'has-error' : ''}}">
                                     <select class="form-control" name="todouhuken_mei">
                                        <option></option>
                                        @if(isset($province) && count($province))
                                            @foreach($province as $key => $value)
                                                <option value="{{ $key }}"
                                                    @if(isset($old['todouhuken_mei']) && old('todouhuken_mei') == $key) selected
                                                    @elseif(isset($newMember['todouhuken_mei']) && $key == $newMember['todouhuken_mei']) selected @endif
                                                >{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {!! $errors->first('todouhuken_mei', '<i class="error form-control-feedback" data-bv-icon-for="todouhuken_mei" style=""></i>') !!}
                                    {!! $errors->first('todouhuken_mei', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-box col-xs-2 ">
                                    <p class="control-label">市区町村名</p>
                                </div>
                                <div class="input-box col-xs-6 {{ $errors->has('sikutyouson_mei') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="sikutyouson_mei"
                                           @if(isset($old['sikutyouson_mei'])) value="{{ old('sikutyouson_mei') }}"
                                           @elseif(isset($newMember['sikutyouson_mei'])) value="{!! $newMember['sikutyouson_mei'] !!}" @endif />
                                    {!! $errors->first('sikutyouson_mei', '<i class="error form-control-feedback" data-bv-icon-for="sikutyouson_mei" style=""></i>') !!}
                                    {!! $errors->first('sikutyouson_mei', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-box col-xs-2">
                                    <p class="control-label">町名番地</p>
                                </div>
                                <div class="input-box col-xs-6 {{ $errors->has('tyoumei') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="tyoumei"
                                           @if(isset($old['tyoumei'])) value="{{ old('tyoumei') }}"
                                           @elseif(isset($newMember['tyoumei'])) value="{!! $newMember['tyoumei'] !!}" @endif />
                                    {!! $errors->first('tyoumei', '<i class="error form-control-feedback" data-bv-icon-for="tyoumei" style=""></i>') !!}
                                    {!! $errors->first('tyoumei', '<span class="error-mess">:message</span>') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-box col-xs-2">
                                    <p class="control-label">建物区画名</p>
                                </div>
                                <div class="input-box col-xs-6 {{ $errors->has('tat_mei') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" name="tat_mei"
                                           @if(isset($old['tat_mei'])) value="{{ old('tat_mei') }}"
                                           @elseif(isset($newMember['tat_mei'])) value="{!! $newMember['tat_mei'] !!}" @endif />
                                    {!! $errors->first('tat_mei', '<i class="error form-control-feedback" data-bv-icon-for="tat_mei" style=""></i>') !!}
                                    {!! $errors->first('tat_mei', '<span class="error-mess">:message</span>') !!}
                                </div>
                                <div class="input-box col-xs-4">
                                    <p class="control-label">（建物名、部屋番号）</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input zipcode, address member -->
                </div>

                <div class="form-footer form-group">
                    <div class="col-xs-4 group-table">
                        <a href="{{ route('member.form.check.register') }}" class="btn-previous action-btn">前の画面に戻る<i class="img-icon img-36-30 img-arrow-left icon-right"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn-next action-btn"><i class="img-icon img-36-30 img-arrow-right icon-left"></i>次に進む</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script>
        $(function() {
            $('.btn-add-zip').click(function(){
                AjaxZip3.zip2addr('zip_first', 'zip_second', 'todouhuken_mei', 'sikutyouson_mei',  'tyoumei');
            });
        });
</script>
@endsection