<?php
use Carbon\Carbon;
?>

@extends('layouts.auth')

@section('title', trans('page.family_login'))

@section('body_class', 'top-page no-border-header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    
@endsection

@section('content')
@include('includes.messages')
<section id="body_content">
            <div class="container">
            
                <form method="POST" action = "{{ url('post-accuracy-family') }}" >
                    {{csrf_field()}}
                    <div class="col-xs-offset-2">
                        <h2 class="page-title">家族/招待者　初期登録</h2>
                    </div>
                    <div class="row content-row">
                        <div class="content-col mgl-35">
                            <div class="box box-singin">
                                <div class="row">
                                    <div class=" form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">招待メールアドレス（携帯メールはNG）</label>
                                            <div class="input-box col-md-5 @if($errors->first('syoutai_mail')) has-error @endif">
                                                <input type="text" class="form-control form-field" name="syoutai_mail" value="{{ old('syoutai_mail')}}" maxlength="255" tabindex="1">
                                                {!! $errors->first('syoutai_mail', '<i class="error form-control-feedback" data-bv-icon-for="syoutai_mail" style=""></i>') !!}
                                                <span class="error-mess"><p>{{ $errors->first('syoutai_mail') }}</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row area-password">
                                    <div class=" form-horizontal form-label-left">
                                    <div class="form-group ">
                                        <label class="col-md-4 control-label">招待コード</label>
                                        <div class="input-box col-md-5 @if($errors->first('syoutai_cd')) has-error @endif">
                                            <input type="text" class="form-control form-field" name="syoutai_cd" id="InputCode" placeholder="" maxlength="255" value="{{ old('syoutai_cd') }}" tabindex="2">
                                            {!! $errors->first('syoutai_cd', '<i class=" form-control-feedback error" data-bv-icon-for="syoutai_cd" style=""></i>') !!}
                                            <span class="error-mess"><p>{{ $errors->first('syoutai_cd') }}</p></span>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </div>
                            <!--end content col-->
                        </div>
                    </div>

                    <div class="row content-row area-button">
                        <div class="content-col mgl-35 text-center">
                            <button class="btn btn-block action-btn action-btn-md action-btn-high action-btn-yallo" tabindex="3" id="btn-submit">送信する</button>
                        </div>
                    </div>
                </form>
            </div>
</section>

@stop