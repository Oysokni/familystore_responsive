@extends('layouts.auth')

@section('title')

{{ trans('page.family_login') }}

@endsection

@section('head')
    <link rel="stylesheet" href="/css/confirm.css">
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
@include('includes.messages')
<div class="password-member">
    <div class="body-header">
        <div class="logo-title">
            家族 / 招待者 会員登録
        </div>
    </div>
    <div class="bd-main"></div>
@if (isset($user) && count($user))
<form action="{{ url('update-passdword',$guid)}}" method="POST">
    {{ csrf_field() }}
    <div class="row content-row">
        <div class="content-col">
            <div class="title-box">
                <p class="form-label">パスワードを設定してください。</p>
            <p class="form-label">パスワード入力後、送信ボタンを押していただければ本登録完了となります。</p>
            </div>
            <div class="box">
                <div class="row">
                    <div class=" form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="col-md-3 control-label">ID（メールアドレス）</label>
                            <div class="input-box col-md-5 text-email">
                                <span>{{ $user->mail }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row area-password">
                    <div class=" form-horizontal form-label-left">
                        <div class="form-group ">
                            <label class="col-md-3 control-label">パスワード</label>
                            <div class="input-box col-md-5 {{ $errors->has('password') ? 'has-error' : ''}}">
                                <input type="password" class="form-control  " name="password" >
                                {!! $errors->first('password', '<i class="error form-control-feedback" data-bv-icon-for="password" style=""></i>') !!}
                                {!! $errors->first('password', '<label class="help-block">:message</label>') !!}
                            </div>
                            <div class="col-md-4">
                                <p>※パスワードは8文字以上、英字+数字</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="input-box col-md-5 col-md-offset-3 {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                <input type="password" class="form-control " name="password_confirmation" >
                                {!! $errors->first('password_confirmation', '<i class="error form-control-feedback" data-bv-icon-for="password_confirmation" style=""></i>') !!}
                                {!! $errors->first('password_confirmation', '<label class="help-block">:message</label>') !!}
                            </div>
                            <div class="col-md-4">
                                <p>※確認用として再度入力ください</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end content col-->
    </div>

    <div class="row content-row area-button">
        <div class="content-col text-center form-footer ">
            <button  class="btn btn-previous" id="btn-submit">送信する</button>
        </div>
    </div>
</form>
@else
<div class="row content-row">
    <div class="content-col">
        <div class="box">
            <div class="text-fail">
                <p>有効期限が切れています。招待者のLIXIL会員の方に連絡いただき、再度、招待コードを発行し、招待していただてください。よろしくお願いします。</p>
            </div>
        </div>
    </div>
</div>
 <div class="row content-row area-button">
    <div class="content-col text-center">
         <a href="{{ route('auth.login')}}"><button type="button" id="btn-submit" class="btn " >ログイン画面へ戻る</button></a>
    </div>
</div>
@endif
</div>

@endsection

@section('footer')

@endsection
