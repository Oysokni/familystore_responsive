<?php
use Carbon\Carbon;
use App\Helpers\HelperFunc;
?>

@extends('layouts.auth')

@section('title', trans('page.family_login'))

@section('head')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jspdf/pdf_viewer.css') }}">
@endsection

@section('content')

@include('includes.messages')

<div class="register-member">
    <div class="body-header">
        <div class="logo-title">
            会員登録（ 家族・招待者の方）
        </div>
    </div>
    <div class="text-right bread">
    </div>
    <div class="steps row">
        <div class="list-steps col-xs-10 col-xs-offset-2 mgl-80">
            <div class="col-xs-4 ">
                <span>1</span>
                <span>会員情報入力</span>
            </div>
            <div class="col-xs-4 active">
                <span>2</span>
                <span>入力内容確認</span>
            </div>
            <div class="col-xs-4">
                <span>3</span>
                <span>会員登録完了</span>
            </div>
        </div>
    </div>
    <form action="{{ url('success-full-register-family')}}" method="POST">
        {{ csrf_field() }}

        <div class="form-label title-form">会員情報</div>
        <div class="container">

            <div class="col-sm-12">
                <div class="col-md-3">
                    <p class="padding-left-20"><strong>メールアドレス</strong></p>
                </div>
                <div class="col-md-9">
                    <p class="note-header"><strong>{{ $member['mail'] }}</strong></p>
                </div>
            </div>
        </div>
        <div class="height-20 mgb-30 bd-main "></div>

        <div class="container">

            <div class="col-sm-12">
                <div class="col-md-3">
                    <p class="padding-left-20"><strong>氏名 </strong></p>
                </div>
                <div class="col-md-9">
                    <p class="note-header"><strong>{{ $member['sei_local']}} {{ $member ['mei_local']}}</strong></p>
                    <p class="note-header"><strong>{{ $member['sei_kana'] }}　{{ $member['mei_kana'] }}</strong></p>
                </div>
            </div>
        </div>
        <div class="height-20 mgb-30 bd-main "></div>

        <div class="container">

            <div class="col-sm-12">
                <div class="col-md-3">
                    <p class="padding-left-20"><strong>電話番号</strong></p>
                </div>
                <div class="col-md-9" style="margin: 0px; padding: 0px;">
                    <div class="row">

                        <div class="panding-bottom-20">
                            <div class="col-md-2">
                                <p class="note-header"><strong>固定電話</strong></p>
                            </div>
                            <div class="col-md-8">
                                <p class="note-header"><strong>{{ $member['idm_denwa_no']}}</strong></p>
                            </div>
                        </div>
                        <div class="height-20 mgb-30 bd-main "></div>
                        <div class="panding-bottom-20">
                            <div class="col-md-2">
                                <p class="note-header"><strong>携帯電話</strong></p>
                            </div>
                            <div class="col-md-8">
                                <p class="note-header"><strong>{{ $member['idm_keitai_tel']}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="height-20 mgb-30 bd-main "></div>

        <div class="container">

            <div class="col-sm-12">
                <div class="col-md-3">
                    <p class="padding-left-20"><strong>自宅住所</strong></p>
                </div>
                <div class="col-md-9" style="margin: 0px; padding: 0px;">
                    <div class="row">
                        <div class="confirm-text">
                            <div class="col-md-2">
                                <p class="note-header"><strong>郵便番号</strong></p>
                            </div>
                            <div class="col-md-10">
                                <p class="note-header"><strong>{{ $member ['zip_first']}} - {{ $member ['zip_second']}} </strong></p>
                            </div>
                        </div>

                        <div class="">
                            <div class="col-md-2">
                                <p class="note-header"><strong>都道府県名</strong></p>
                            </div>
                            <div class="col-md-10">
                                <p class="note-header"><strong>{{ $member ['todouhuken_mei']}}</strong></p>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-md-2">
                                <p class="note-header"><strong>市区町村名</strong></p>
                            </div>
                            <div class="col-md-10">
                                <p class="note-header"><strong>{{ $member ['sikutyouson_mei']}}</strong></p>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-md-2">
                                <p class="note-header"><strong>町名番地</strong></p>
                            </div>
                            <div class="col-md-10">
                                <p class="note-header"><strong>{{ $member ['tyoumei']}}</strong></p>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-md-2">
                                <p class="note-header"><strong>建物区画名</strong></p>
                            </div>
                            <div class="col-md-10">
                                <p class="note-header"><strong>{{ $member ['tat_mei']}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="height-20 mgb-30 bd-main "></div>

        <div class="container">

            <div class="form-label title-form">誓約書</div>
            <div class="row panding-bottom-20">
                <div class="container">
                    @if(empty($registerPolicy))
                    <div class="text-art-box-1">
                        <h3>利用規約とか注意書きとか諸々のエリア見出し</h3>
                        <p>テキスト14pt&レギュラー リストは「・」（ナカグロ）を用いず のリスト表示にすること </p>
                        <p>背景の塗りつぶしカラーは#f7f8f9<p>
                    </div>
                    @else
                    <div class="text-art-box-1" style="height: 700px">
                        <div id="pdf_viewer" class="pdfViewer singlePageView"
                             style="height: 100%; width: 100%; overflow: auto; padding: 10px 0px 10px 170px;"></div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row panding-bottom-20">
                <div class="container text-center">
                    <input id="agree" type="checkbox" name="agree" width="10" disabled="disabled">
                    <label for="agree"> 同意する </label>
                    <p>※誓約書に同意の上、次にお進みください</p>
                    <p>※最後までお読みいただかないとチェックできません</p>
                    <span class="error-mess">{{ $errors->first('agree') }}</span>
                </div>
            </div>

        </div>

        <div class="row" >
            <div class="form-footer">
                <div class="col-xs-4">
                    <div class="form-group group-table full-width">
                        <a href="{{ route('register_family.register_family') }}" class="btn-previous action-btn">前の画面に戻る<i class="img-icon img-36-30 img-arrow-left icon-right"></i></a>
                    </div>
                </div>
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="form-group">
                        <button type="submit" name="btn-submit"  class="btn-next action-btn custom-btn" tabindex="13"><i class="img-icon img-36-30 img-arrow-right icon-left"></i>次に進む</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--end box-->
@endsection
@section('footer')
<script src="{{ asset('plugins/jspdf/compatibility.js') }}"></script>
<script src="{{ asset('plugins/jspdf/pdf.js') }}"></script>
<script src="{{ asset('plugins/jspdf/pdf_viewer.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

<script>
    $(document).ready(function(){
        $("#pdf_viewer").load("{{ asset('policys/html/pdftohtml_4/family.html') }}");
    });
</script>
@endsection
