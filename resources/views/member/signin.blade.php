@extends('layouts.auth')

@section('title')

{{ trans('page.member_login') }}

@endsection

@section('body_class', 'no-border-header')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
@include('includes.messages')
<form action="{{ route('member.check.register') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-xs-offset-2">
        <h2 class="page-title">従業員　初期登録</h2>
    </div>
    <div class="row content-row">
        <div class="content-col mgl-35">
            <div class="box box-singin">
                <div class="row">
                    <div class=" form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="col-md-2 control-label">会社メールアドレス</label>
                            <div class="input-box col-md-5 {{ $errors->has('email') ? 'has-error' : ''}}">
                                <input type="text" class="form-control form-field" name="email" value="{{ old('email') }}">
                                {!! $errors->first('email', '<i class="error form-control-feedback error-icon" data-bv-icon-for="email" style=""></i>') !!}
                                <span class="error-mess"><p>{{ $errors->first('email') }}</p></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row area-password">
                    <div class=" form-horizontal form-label-left">
                    <div class="form-group ">
                        <label class="col-md-2 control-label">パスコード</label>
                        <div class="input-box col-md-5 {{ $errors->has('passcode') ? 'has-error' : ''}}">
                            <input type="password" class="form-control form-field" name="passcode" id="password-field" value="{{ old('password') }}">
                            <i toggle="#password-field" class="img-icon visibility field-icon toggle-password"></i>
                            {!! $errors->first('passcode', '<i class="error form-control-feedback error-icon-password error-icon" data-bv-icon-for="password" style=""></i>') !!}
                            <span class="error-mess"><p>{{ $errors->first('passcode') }}</p></span>
                        </div>
                        <div class="col-md-4">
                            <p>※パスコードは <a href="http://www.intra.lixil.co.jp/contents/aba00336/passcode.htm" target="_blank">こちら</a> でご確認ください</p>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <!--end content col-->
        </div>
    </div>

    <div class="col-xs-offset-2">
        <div class="area-note">
            <p><label class="circle"></label>申請書で申請する方は <a href="http://www.intra.lixil.co.jp/contents/aba00336/special.htm">こちら</a> で確認ください</p>
        </div>
    </div>

    <div class="row content-row area-button">
        <div class="content-col mgl-35 text-center">
            <button class="btn btn-block action-btn action-btn-md action-btn-high action-btn-yallo" id="btn-submit">送信する</button>
        </div>
    </div>
</form>
@endsection

@section('footer')

@endsection
