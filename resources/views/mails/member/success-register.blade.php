@extends('layouts.mail')
@section('css')
<style>
    div {
        margin: 9px 0px;
    }
</style>
@endsection
@section('content')
<div>{{ $name }} 様</div>
<div>本登録が完了いたしました。</div>
<div>下記URLよりログイン出来ます。</div>
<div style="margin-bottom: 20px;">
    <a href="{{ route('auth.login') }}" target="_blank">
        {{ route('auth.login') }}
    </a>
</div>
<div>今後ともLIXIL Family STOREをよろしくお願いいたします。</div>
<div>※当メールに心当たりの無い場合は、誠に恐れ入りますがメールの内容をLIXIL Famly STORE 事務局（lffs@lixil.com）へ転送していただいた後、破棄していただきますようお願い致します。</div>
@endsection
