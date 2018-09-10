@extends('layouts.auth')

@section('title')

{{ trans('page.code_invite_title') }}

@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="success-member">
    <div class="body-header">
        <div class="logo-title">
           ご招待コード発行完了
        </div>
    </div>
    <div class="bd-main"></div>

    <div class="row content-row">
        <div class="content-col">
            <div class="content-text text-center">
                 
                <p class=" control-lable text-center">{{ $mail }} へ招待コードを発行いたしました</p>
                
            </div>
        </div>
        <!--end content col-->
    </div>

    <div class="row content-row area-button">
        <div class="content-col text-center">
             <a href="{{ route('auth.login')}}"><button type="button" id="btn-submit" class="btn" >TOP画面へ戻る</button></a>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
