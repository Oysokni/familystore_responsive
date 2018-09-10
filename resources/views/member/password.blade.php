@extends('layouts.auth')

@section('title')

{{ trans('page.member_register') }}

@endsection

@section('body_class', 'no-border-header')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="password-member">
    <div class="body-header">
        <div class="logo-title">
            従業員　会員登録
        </div>
    </div>
    <div class="bd-main"></div>
@if (isset($user) && count($user))
<form action="{{ route('member.register.password', ['guid' => $user->guid]) }}" method="POST">
    <input type="hidden" name='email' value='{{ $user->mail }}'/>
    {{ csrf_field() }}
    <div class="row content-row">
        <div class="content-col mgl-35">
            <div class="title-box">
                <p class="form-label">パスワードを設定してください。</p>
                <p class="form-label">パスワード入力後、送信ボタンを押していただければ本登録完了となります。</p>
            </div>
            <div class="box box-border">
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
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                {!! $errors->first('password', '<i class="error form-control-feedback" data-bv-icon-for="password" style=""></i>') !!}
                                {!! $errors->first('password', '<label class="help-block">:message</label>') !!}
                            </div>
                            <div class="col-md-4">
                                <p>※パスワードは8文字以上、英字+数字</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="input-box col-md-5 col-md-offset-3 {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
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
        <div class="content-col mgl-35 text-center">
            <button class="btn btn-block action-btn action-btn-md action-btn-gray" id="btn-submit">送信する</button>
        </div>
    </div>
</form>
@else
<div class="row content-row">
    <div class="content-col">
        <div class="box">
            <div class="text-fail">
                <p>有効期限が切れています。初期登録から再度登録申請してください。尚、ログイン画面から初期登録を行う場合は、はじめての方、LIXILグループ従業員の方をクリックしていただきますと初期登録画面となります。よろしくお願いします。</p>
            </div>
        </div>
    </div>
</div>
<div class="row content-row area-button">
    <div class="content-col mgl-35 text-center">
        <a href="{{ route('auth.login')}}"><button type="button" class="btn btn-block action-btn action-btn-md action-btn-gray" id="btn-submit">ログイン画面へ戻る</button></a>
    </div>
</div>
@endif
</div>

@endsection

@section('footer')

@endsection
