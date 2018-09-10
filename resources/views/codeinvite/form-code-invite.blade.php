@extends('layouts.front')

@section('title')

{{ trans('page.code_invite_title') }}

@endsection
@section('body_class', 'top-page ')
@section('head')
    
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fixconfig.css') }}">
    
@endsection

@section('content')
<?php
use Illuminate\Support\Facades\Input;

$old = Input::old();
?>
@section('breadcrumb')
    <div class="nav-breadcrumb invite-breadc">
        @include('includes.breadcrumb')
    </div>
@stop
@include('includes.messages')

    <div class="">
        

        <h2 class="invite-title"><i class="invite-title-icon img-icon img-67-45 img-invitation-invite"></i>招待コードの発行</h2>

        <div class="label-items category-items items">
            <div class="media item invite-top mgb-25">
                <div class="media-left pull-left">
                    <span class="text-btn text-btn-blue">概要</span>
                </div>
                <div class="media-body">
                    <ul class="list-unstyled">
                        <li>LIXILグループで働く皆さんのご家族の方がLIXIL Family STOREをご利用できるようにするための機能です。</li>
                        <li>招待されたご家族の方が、招待コードを使ってLIXIL Family STORE ファミリー会員として登録することで、</li>
                        <li>リフォームストアで、リフォーム工事のお申込みができるようになります。</li>
                        <li>※ LIXIL会員１人につき、ご家族の方を年間５人までファミリー会員として招待することができます。</li>
                        <li>※ ご家族の方のPCメールアドレスが必要になります。（携帯メールアドレスは不可となります）</li>
                    </ul>
                </div>
            </div>
          
        </div>
        <div class="invite-box">
            <div class="media-left pull-left">
                <span class="text-btn-invite text-btn-blue">手順</span>
            </div>
            
            <div class="box-info">
                <div class="box-01">
                    <div class="button-tex">
                        <span class="text-invite-btn">（１）招待コード発行機能を使って招待する</span>
                    </div>
                </div>
                <div class="media-body">
                   
                    <ul class="text-ul-invite mgt-10">
                        <li>① 下記の『招待コードを発行』ボタンを押下する</li>
                        <li>② 『招待者の氏名』、『招待者のPCメールアドレス』、『あなたとの関係』を入力する</li>
                        <li>③ 『招待する』ボタンを押下し、『招待コード内容確認画面』で内容を確認した上で『招待する』ボタンを押下する</li>
                        <li>以上で、入力したメールアドレスの招待者に招待コードと会員登録サイトをお知らせするメールが送付されます。</li>
                    </ul>
                </div>
            </div>
            
            <div class="box-info">
                <div class="box-01">
                    <div class="button-tex">
                        <span class="text-invite-btn">（２）招待された方がファミリー会員登録申請をする</span>
                    </div>
                </div>
                <div class="media-body">
                   
                    <ul class="text-ul-invite mgt-10">
                        <li>① LIXIL Family STORE から招待メールが、招待者（ご家族の方）に届きます。</li>
                        <li>② 招待メールに記載されているURLをクリックしてLIXIL Family STORE サイトを開く。</li>
                        <li>③ 招待メールに記載されている『招待コード』と、招待者（ご家族の方）のメールアドレスで、ファミリー会員登録申請
   をしていただきます。</li>
                        <li>※注意：メール記載の有効期限内に登録申請して下さい。有効期限を過ぎて申請されない場合は、再度（１）からやり直しになります。</li>
                        <li>有効期限は、招待メールを送付した日から約１週間となります。</li>
                    </ul>
                </div>
            </div>
            
            <div class="box-info mgb-50">
                <div class="box-01">
                    <div class="button-tex">
                        <span class="text-invite-btn">（３）招待された方がファミリー会員に本登録する</span>
                    </div>
                </div>
                <div class="media-body">
                   
                    <ul class="text-ul-invite mgt-10">
                        <li>① LIXIL Family STORE から会員登録メールが、招待者（ご家族の方）に届きます。</li>
                        <li>② 会員登録メールに記載されているURLをクリックしてLIXIL Family STORE 会員本登録画面を開く。</li>
                        <li>③ パスワードを設定して、本登録をしていただきます。</li>
                        <li>以上で、招待者（ご家族の方）がファミリー会員として登録完了しました。ログインしてご利用いただけます。</li>
                        <li>※注意、メール記載の有効期限内に本登録して下さい。有効期限を過ぎて本登録されない場合は、再度（１）からやり直しになります。</li>
                        
                    </ul>
                </div>
            </div>
            
        </div>
    </div>


<div class="register-member  ">
    <div class="form-register-member">
        <form action="{{ route('code.invite.post-code') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-label title-form mgt-35 mgl-67"><b>招待機能</b></div>
            <div class="row mgl-67">
                @if(isset($dataSyoutaiKanri))
                <?php
                   $date = \Carbon\Carbon::parse($dataSyoutaiKanri->syoutai_end_ymd)->addDay(1)->format('Y/m/d');
                ?>
                    @if($dataSyoutaiKanri->syoutai_cnt < $dataSyoutaiKanri->syoutai_lmt_cnt )
                    <b>
                        <p class="control-label">
                            <span class="txt-square"> ■ </span> 前回までの招待者数： {{$dataSyoutaiKanri->syoutai_cnt}} 回 （年間５回まで）
                        </p>
                    </b>
                    @elseif($dataSyoutaiKanri->syoutai_cnt >= $dataSyoutaiKanri->syoutai_lmt_cnt )

                    <b>
                        <p class="control-label">
                            <span class="txt-square"> ■ </span> 前回までの招待者数： {{$dataSyoutaiKanri->syoutai_cnt}} 回 （年間５回まで）
                        </p>
                        <p class="control-label">
                                招待回数が最大 {{$dataSyoutaiKanri->syoutai_lmt_cnt }}  回に達しています。(期間：{{$dataSyoutaiKanri->syoutai_start_ymd}}～{{$dataSyoutaiKanri->syoutai_end_ymd}})    
                                次回発行は   {{ $date }}、  以降になります。
                        </p>
                    </b>
                    @endif
                @endif
            </div>
            <div class=" form-horizontal form-label-left mgl-36">
                <div class="form-body">

                    <!-- label email -->
                    <div class="form-group box-none"></div>
                    <!-- end label email -->

                    <!-- input code invite-->
                    <div class="form-group box-none">
                        <div class=" input-box col-xs-3">
                           @if($dataSyoutaiKanri->syoutai_cnt < $dataSyoutaiKanri->syoutai_lmt_cnt ) 
                                <button tabindex="1" type="button" class="btn input-button action-btn {{ $errors->has('syoutai_cd') ? 'btop' : ''}}"  id="random-code" data-toggle="modal" data-target="#exampleModalLong">招待コードの発行</button>
                            @elseif($dataSyoutaiKanri->syoutai_cnt >= $dataSyoutaiKanri->syoutai_lmt_cnt)
                             <button tabindex="1" type="button" class="btn input-button action-btn {{ $errors->has('syoutai_cd') ? 'btop' : ''}}"  id="show-modal" data-toggle="modal" data-target="#exampleModalLong">招待コードを発行</button>
                            @endif
                        </div>
                        <div class="input-box col-xs-4 {{ $errors->has('syoutai_cd') ? 'has-error' : ''}}">
                            <input type="text" class="form-control" name="syoutai_cd" id="code-intive" 
                                @if(isset($old['syoutai_cd'])) value="{{ old('syoutai_cd') }}"
                                @elseif(isset($codeInvite['syoutai_cd'])) value="{!! $codeInvite['syoutai_cd'] !!}" @endif
                            readonly="readonly" tabindex="1"  maxlength="10"  placeholder="※自動発行" >
                                
                            
                            {!! $errors->first('syoutai_cd', '<i class="error form-control-feedback" data-bv-icon-for="syoutai_cd" ></i>') !!}
                            {!! $errors->first('syoutai_cd', '<span class="error-mess">:message</span>') !!}
                        </div>
                        <div class="input-box col-xs-3">  
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                     <div class="col-xs-11 logo-col">
                                        <a href="http://lixil.dev/user/login" class="logo">
                                            <img class="logo-img" src="/images/logo.png" alt="Lixil" title="Lixil">
                                        </a>
                                        <h1 class="logo-title">
                                            <span>LIXIL Family STORE</span>
                                        </h1>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true"><i class="close"></i></span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <p class="control-label" > 招待回数が最大x回に達しています。招待コードを発行できません。 </p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                            
                        </div>
                       
                    </div>
                    <!-- end inputcode invite-->
                   
                    <!-- input name member-->
                    <div class="form-group box-none">
                        <div class="col-xs-3">
                            <p class="control-label"><span class="txt-square"> ■ </span>招待者の氏名</p>
                        </div>
                        <div class="input-box col-xs-2 {{ $errors->has('syoutai_sei') ? 'has-error' : ''}}">
                            <input type="text" class="form-control" name="syoutai_sei"  
                                @if(isset($old['syoutai_sei'])) value="{{ old('syoutai_sei')}}"
                                @elseif(isset($codeInvite['syoutai_sei'])) value="{!! $codeInvite['syoutai_sei'] !!}" @endif
                            maxlength="40" tabindex="2" placeholder="姓：" >
                            {!! $errors->first('syoutai_sei', '<i class="error form-control-feedback" data-bv-icon-for="syoutai_sei" style=""></i>') !!}
                            {!! $errors->first('syoutai_sei', '<span class="error-mess">:message</span>') !!}
                        </div>
                        <div class="input-box col-xs-2 {{ $errors->has('syoutai_mei') ? 'has-error' : ''}}">
                            <input type="text" class="form-control" name="syoutai_mei" 
                                @if(isset($old['syoutai_mei'])) value="{{ old('syoutai_mei')}}"
                                @elseif(isset($codeInvite['syoutai_mei'])) value="{!! $codeInvite['syoutai_mei'] !!}" @endif
                            maxlength="50" tabindex="3"  placeholder="名：" >
                            {!! $errors->first('syoutai_mei', '<i class="error form-control-feedback" data-bv-icon-for="syoutai_mei" style=""></i>') !!}
                            {!! $errors->first('syoutai_mei', '<span class="error-mess">:message</span>') !!}
                        </div>
                       
                    </div>
                    <!-- end input name member -->
                    
                    <!-- input Invitee's email address -->
                    <div class="form-group box-none">
                        <div class="col-xs-3">
                            <p class="control-label"><span class="txt-square"> ■ </span> 招待者のメールアドレス</p>
                        </div>
                        <div class="input-box col-xs-4 {{ $errors->has('syoutai_mail') ? 'has-error' : ''}}">
                            <input type="text" class="form-control" name="syoutai_mail" 
                                   @if(isset($old['syoutai_mei'])) value="{{ old('syoutai_mail')}}"
                                @elseif(isset($codeInvite['syoutai_mei'])) value="{!! $codeInvite['syoutai_mail'] !!}" @endif
                            maxlength="40" tabindex="4">
                            {!! $errors->first('syoutai_mail', '<i class="error form-control-feedback" data-bv-icon-for="syoutai_mail" style=""></i>') !!}
                            {!! $errors->first('syoutai_mail', '<span class="error-mess">:message</span>') !!}
                        </div>
                    </div>
                    <!-- end input Invitee's email address -->
                    
                    
                    <!-- input Invitee's email address -->
                    <div class="form-group box-none">
                        <div class="col-xs-3">
                            <p class="control-label"> <span class="txt-square"> ■ </span>あなたとのご関係</p>
                        </div>
                        <div class="input-box col-xs-4 mgl-21 mgt-17">
                            <div class="container">
                               <div class="input-box col-xs-4 {{ $errors->has('kankei_flg') ? 'has-error' : ''}}">
                                   <input id="kankei_flg" type="checkbox" name="kankei_flg" 
                                        @if(isset($old['kankei_flg'])) checked
                                        @elseif(isset($codeInvite['kankei_flg'])) checked @endif
                                    value="01" width="10"> 
                                    <label tabindex="4" class="code-lable" for="kankei_flg"> 家族 </label><br>
                                    {!! $errors->first('kankei_flg', '<span class="error-mess">:message</span>') !!}
                               </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input Invitee's email address -->

                </div>
                

                <div class="form-footer form-group">
                    <div class="col-xs-10 mgl-36">
                        <button class="btn-next action-btn" tabindex="5">招待する（招待内容確認画面へ）</button>
                    </div>
                </div>

            </div>

        </form>
        
       
        <div class="to-top-box-invite to-top-box">
                <a href="#" class="text-nounderline">
                    <i class="lxl-icon-circle circle-main arrow_upward"></i>
                    <span tabindex="6" class="text-desc text-border">ページトップ</span>
                </a>
        </div>
        
        
    </div>
    
</div>

@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script> 
@endsection