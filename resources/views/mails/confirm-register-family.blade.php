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
<div>
    <p>この度、LIXIL Family STORE  ファミリー会員登録申請いただき、ありがとうございます。</p>
    <p>まだ会員登録は完了しておりません。</p>
    <p>このメールに記載された、『本登録用のURL』から本登録をお願い致します。</p>

</div>
<div>
    <p>つきましては、<b>{{ $date_limit }} </b> 日までに、</p>
    <p>本登録を下記手順にそって行っていただきますよう、お願い申し上げます。</p>
    <p style="font-size: 12px; font-style: normal;"> <i>※尚、上記の期限を過ぎた場合は、LIXIL会員の方から、再度、招待を行ってもらう必要がありますので、ご注意ください。</i></p>
</div>
<div>
    <p>＜手順＞ </p>
    <p>１）下記記載の『本登録用のURL』で本登録画面を開きます。</p>
    <p>２）表示内容に従って、パスワードを設定して下さい。</p>
    <p>３）登録ボタンを押して会員登録完了です。</p>
</div>
<div>
    <p>＜本登録用のURL＞</p>
    LIXIL Family STORE 会員本登録 : <a href="{{  url('update-passdword',$guid)}}" target="_blank">
        {{ url('update-passdword',$guid) }}
    </a>
</div>
<div>
    <p>＜LIXIL Family STORE ログイン＞</p>
    <p>本登録後、下記URL の LIXIL Family STORE ログイン画面で、</p>
    <p>ID（メールアドレス）と、ご自身で設定したパスワードを入力し、ログインしてご利用下さい。</p>
    <p>LIXIL Family STORE ： 
        <a href="{{ route('auth.login') }}" target="_blank">
            {{ route('auth.login') }}
        </a>
     </p>
    <p>より良い住まいと暮らしづくりに、LIXIL Family STOREをご活用下さい。</p>
</div>

<div>※本メールはシステムより自動送信しております。</div>
<div>   送信専用のため、このメールにご質問などをいただいてもお答えすることは出来ません。</div>
<div>※ご質問、お問い合わせは、下記『LIXIL Family STORE 事務局』までメールにてお願い致します。</div>
<div>LIXIL Family STORE 事務局 （メール：lffs@lixil.com）</div>
@endsection
