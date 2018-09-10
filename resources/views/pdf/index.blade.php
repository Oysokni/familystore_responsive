<?php

use App\Helpers\ViewConst;
?>
<header>
    <div class="container">
        <div class="row row-header">
            <div class="col-xs-5 logo-col">
                <a href="{{ route('auth.login') }}" class="logo">
                    <img class="logo-img" src="/images/logo.png" alt="Lixil" title="Lixil">
                </a>
                <h1 class="logo-title">
                    <span>LIXIL Family STORE</span>
                </h1>
            </div>
        </div>
    </div>
</header>

<section id="body_content">
    <div class="container">
        <div class="wrapper">
                <div class="row text-desc">
                    <div class="mgb-20">
                        <p>（１）会員本人が住宅を購入する場合は、住宅購入利用規約が適用されます。</p>
                    </div>
                    <div class="text-center mgb-30">
                        <a href="{{ route('link.LIXIL_Family_STORE住宅購入紹介版利用規約（住宅購入）LIXIL社員.pdf') }}" target="_blank" class="action-btn action-btn-building action-btn-high pdf-btn">住宅購入 利用規約 を確認する</a>
                    </div>
                </div>

                <div class="row text-desc">
                    <div class="mgb-20">
                        <p>（２）友人・知人の住宅購入案件を紹介する場合は、案件紹介利用規約が適用されます。</p>
                    </div>
                    <div class="text-center mgb-30">
                        <a href="{{ route('link.LIXIL_Family_STORE住宅購入紹介版利用規約（案件紹介）LIXIL社員.pdf') }}" target="_blank" class="action-btn action-btn-building action-btn-high pdf-btn">案件紹介 利用規約 を確認する</a>
                    </div>
                </div>

                <div class="row text-desc">
                    <div class="col-xs-12">
                        <p class="pdf-note">※会員本人が住宅購入を申し込む場合と、友人・知人の住宅購入案件を紹介する場合とで、利用規約が異なります。利用目的に応じて確認下さい。</p>
                    </div>

                </div>
        </div>
    </div>
</section>



