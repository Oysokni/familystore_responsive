<?php
use App\Models\Faq;
?>
<div class="bar-box">
    <h3 class="bar-title-2">住宅購入･紹介</h3>
    <ul class="category-list cat-2">
        <li class="active">
            <a href="#">ビルダー検索</a>
        </li>
        <li>
            <a href="#" id="contract-popup" data-toggle="modal" url="{{ route('pdf.index') }}" data-target="#policiesModal"> 必ずお読みください</a>
        </li>
        <li><a href="{{ route('link.LIXIL_Family_STORE_住宅購入紹介特典.pdf') }}" target="_blank">住宅購入･紹介の特典</a></li>
        <li><a href="{{ route('faq.index', ['faqType' => Faq::TYPE_BUILDER_FAQ]) }}">FAQ（住宅購入･紹介版）</a></li>
        <li><a href="{{route('link.LIXIL_Family_STORE_住宅購入紹介フロー.pdf') }}" target="_blank">お申し込み～特典授受</a></li>
    </ul>
</div>

<div class="toleft-box">
    <div class="bar-box-3">
        <div class="step-1">
            <p>Step 1</p>
            <p>希望する住宅の場所（都道府県）を、<br/>地図のクリックで選択するか、<br/>プルダウンメニューより選択下さい。</p>
        </div>
        <div class="step-2">
            <p>Step 2</p>
            <p>希望する住宅の種類を選択して下さい。<br/>尚、一戸建てを選択した場合に、<br/>LIXILグループFC加盟ビルダーや<br/>スーパーウォール対応ビルダーも対象<br/>としたい場合は、希望対応先の種類も<br/>チェックして下さい。（複数選択可能）<br/>※大手は必須となります。</p>
        </div>
        <div class="step-search">
            <p>※離島や極寒地等、地域によっては<br/>対応不可の場所もあります。<br/>折衝時、最初にご確認下さい。</p>
        </div>
        <div class="step-3">
            <p>Step 3</p>
            <p>検索するボタンを押して、対象となる<br/>紹介可能ビルダー一覧のリストを表示し、<br/>リストより折衝希望先を選択して下さい。</p>
            <br/>
        </div>
        <div class="last-step">
            <div class="last-step-note">
                <p>選択にあたっての注意<br/>※印のハウスメーカーは必ず３社以上<br/>チェックして下さい。<br/>尚、チェックする数は、ハウスメーカー含め１５社まで選択可能です。</p>
                <br/>
            </div>
            <div class="last-step-guide">
                <p>紹介して欲しいビルダー様のチェックを<br/>行ったら、住宅購入・紹介を申込む<br/>ボタンを押してください。</p>
            </div>
        </div>
    </div>
</div>