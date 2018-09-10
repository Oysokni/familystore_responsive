@extends('layouts.mail')

@section('css')

@stop

@section('content')
<p><strong>{{ $name }} 様</strong></p>
<br />

<p>
    この度、株式会社LIXIL <b>  {{ $invite_person }} </b>  様より、LIXIL Family STORE ファミリー会員
    として会員登録いただくために、ご招待されました。
</p>
<p>
    つきましては、<b> {{$dateend}} </b> までに、LIXIL Family STOREの会員登録を
下記手順にそって行っていただきますよう、お願い申し上げます。
</p>
<p>＜手順＞</p>
    
<p>１）記載のURLでLIXIL Family STORE サイトの 家族/招待者 初期登録画面を開きます。</p>
<p>２）初期登録画面にて、このメールが届いたメールアドレスと招待コードを入力して下さい。</p>
<p>３）画面内容に従って会員情報を記入いただき、登録申請ボタンを押して下さい。</p>
<p>４）LIXIL Family STORE より会員登録メールが届きますので、そのメール内容に従って、</p>
<p>メール記載のURLで会員登録画面を開きパスワードを登録してファミリー会員登録完了です。</p>
<p>※会員登録後、下記URLに、ID（メールアドレス）とご自身で設定したパスワードを入力し、
   <p>LIXIL Family STORE にログインしてご利用下さい。</p>

   招待コード ：  <b>{{ $code}}</b>
   
</p>
LIXIL Family STORE 会員登録   <a href="{{route('register_family.register_family')}}">{{route('register_family.register_family')}}</a>
<p>より良い住まいと暮らしづくりに、LIXIL Family STOREをご活用下さい。</p> 
<p>※本メールはシステムより自動送信しております。</p>
<p style="margin-left:10px;">送信専用のため、このメールにご質問などをいただいてもお答えすることは出来ません。</p>
<p>※ご質問、お問い合わせは、下記『LIXIL Family STORE 事務局』までメールにてお願い致します。</p>
<p>LIXIL Family STORE 事務局 （メール：lffs@lixil.com）</p>

@stop
