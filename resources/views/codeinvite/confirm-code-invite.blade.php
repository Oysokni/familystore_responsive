@extends('layouts.front')

@section('title')

{{ trans('page.code_invite_title') }}

@endsection
@section('body_class', 'top-page')
@section('head')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<link rel="stylesheet" href="{{ asset('css/fixconfig.css') }}">

@endsection

@section('content')
@section('breadcrumb')
<div class="nav-breadcrumb invite-breadc">
    @include('includes.breadcrumb')
</div>
@stop
@include('includes.messages')
    <h2 class="invite-title"><i class="invite-title-icon img-icon img-67-45 img-invitation-invite"></i>招待コードの発行</h2>
<div class="register-member">
    <div class="form-register-member">
        <form action="{{ route('code.invite.post-confirm-code')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-label title-form mgt-35">招待内容確認</div>
            <div class=" form-horizontal form-label-left mgl-36">
                <div class="form-body">

                    <!-- label name -->
                    <div class=" form-group box-none">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> □ </span> 招待元LIXIL会員名 <span class="text-from-2"> :</span></p>
                        </div>
                        
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                
                                <lable class="control-label">{{ $dataSyoutai['name'] }}</lable> 
                            </div>
                        </div>
                    </div>
                    <!-- end label name -->
                    
                    <!-- label Emaill -->
                    <div class="form-group box-none">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> □ </span>招待元LIXIL会員メールアドレス <span class="text-from-2"> :</span></p>
                        </div>
                        
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                
                                <lable class="control-label">{{ $dataSyoutai['mail'] }}</lable> 
                            </div>
                        </div>
                    </div>
                    <!-- end label email -->
                    
                    <!-- label  company_mei-->
                    <div class="form-group box-none">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> □ </span>招待元LIXIL会員所属会社名 <span class="text-from-2"> :</span></p>
                        </div>
                        
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                <lable class="control-label">{{ $dataSyoutai['company_mei'] }}</lable> 
                            </div>
                        </div>
                    </div>
                    <!-- end label company_mei -->

                    <!-- input code invite-->
                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> ■ </span> 招待コード <span class="text-from-2"> :</span></p>
                        </div>
                        <div class="input-box col-xs-4">
                            <div class="text-from-4">
                                <p class="control-label" > {{ $dataSyoutai['syoutai_cd'] }} </p>
                            </div>
                        </div>
                    </div>
                    <!-- end inputcode invite-->
                    
                     <!-- input name member-->
                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> ■ </span> 招待者の名前 <span class="text-from-2"> :</span></p>
                        </div>
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                <lable class="control-label">{{ $dataSyoutai['syoutai_sei'] }}</lable>　<lable class="control-label">{{ $dataSyoutai['syoutai_mei'] }}</lable>
                            </div>
                        </div>
                    </div>

                    <!-- end input name member -->
                    
                    
                    <!-- input name member-->
                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> ■ </span> 招待者のメールアドレス  <span class="text-from-2"> :</span></p>
                        </div>
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                <lable class="control-label">{{ $dataSyoutai['syoutai_mail'] }}</lable> 
                            </div>
                        </div>
                    </div>

                    <!-- end input name member -->
                   
                    
                    <!-- input Invitee's email address -->
                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="control-label code-lable">  <span class="txt-square"> ■ </span> あなたとのご関係  <span class="text-from-2"> :</span></p>
                        </div>
                        <div class="text-from-3">
                            <div class="input-box col-xs-4">     
                                @if( $dataSyoutai['kankei_flg'] == "01")
                                    <label> 家族 </label>
                                @elseif($dataSyoutai['kankei_flg'] == "02")
                                    <label> 親等以内 </label>
                                @elseif($dataSyoutai['kankei_flg'] == "03")
                                    <label> 親戚 </label>
                                @elseif($dataSyoutai['kankei_flg'] == "04")
                                    <label> 友人 </label>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- end input Invitee's email address -->
                    
                    <!-- input name member-->
                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> ■ </span> 招待メール発行日  <span class="text-from-2"> :</span></p>
                        </div>
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                <lable class="control-label">{{ $dataSyoutai['start_date'] }}</lable> 
                            </div>
                        </div>
                    </div>

                    <!-- end input name member -->
                    
                    <!-- input name member-->
                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="control-label"> <span class="txt-square"> ■ </span> 有効期日  <span class="text-from-2"> :</span></p>
                        </div>
                        <div class="input-box col-xs-8">
                            <div class="text-from-3">
                                <lable class="control-label">{{ $dataSyoutai['end_date'] }}</lable> 
                            </div>
                        </div>
                    </div>

                    <!-- end input name member -->

                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-10 mgb-20">
                    <p class="control-label"> ※上記内容を含んだメールが、招待者に送信されます。よろしければ、『招待する』をクリック下さい。</p>
                </div>
                </div>
                <div class="form-footer form-group">
                    <div class="col-xs-2">
                        <div class="previous text-left text-top-18">
                            
                            <a href="{{ route("code.invite.invite")}}" class="text"> <i class="lxl-icon-circle circle-high keyboard_backspace icon-right"></i> 戻る</a>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <button class="btn-next action-btn" tabindex="13">招待する（招待メールが送信されます）</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('footer')
    
@endsection