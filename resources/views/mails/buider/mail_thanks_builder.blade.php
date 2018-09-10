@extends('layouts.mail')

@section('css')

@stop

@section('content')
<p><strong>{{ $name }} 様</strong></p>
<br />
<p>この度、LIXIL Family STORE  住宅購入･紹介、お申込みありがとうございます。</p>
<p>ご指定の連絡方法に従い、担当よりご連絡させていただきますのでお待ちください。</p>
<p>ご連絡のない場合は、下記にご連絡ください。</p>
<br />
<p>■LIXIL Family STORE 住宅購入･紹介 専用お問い合わせ先</p>
<ul >
    <li>お問い合わせ先 ：LIXIL Family STORE 住宅購入･紹介版 申込み事務局</li>
    <li>メールアドレス ：lfssyoukai@lixil.com</li>
</ul>
<br />
<p>■お申し込み日  ：{{$date}}</p>
<p>■お申し込みNo ：{{$idKento}}</p>
<p>尚、お申し込みの内容を確認する場合は、LIXIL Family STORE にログインしていただき、</p>
<p>住宅購入･紹介のページで、右上の、『お申し込み内容』をクリックして、ご確認ください。</p>
LIXIL Family STORE ログイン ：<a href="{{ route('auth.login') }}" target="_blank">
                                {{ route('auth.login') }}
                            </a>
<br/>
<p>※本メールはシステムより自動送信しております。</p>
<p style="margin-left: 20px;">   送信専用のため、このメールにご質問などをいただいてもお答えすることは出来ませんのでご注意ください。</p>
<p style="margin-left: 20px;">   お申し込み内容に関するお問い合わせも、上記、住宅購入･紹介専用お問い合わせ先へお願い致します。</p>
<p style="margin-left: 20px;">   尚、お問い合わせの際は、上記お申し込み日、お申し込みNo、ご氏名、ログインメールアドレスをお伝えください。</p>
<p>LIXIL Family STORE 事務局</p>
<p></p>
@stop