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
<!--end header-->

<section id="body_content">
    <div class="container">
        <div class="row login-iinavi">
            <div class="content-col">
                <div class="box box-singin login-form col-xs-6 col-xs-offset-3">
                    @if (isset($confirm) && $confirm = 1)
                    <div class="row">
                        <h2>
                            <p class="text-center">いいナビサービスとの連携を行います。</p>
                            <p class="text-center">よろしいですか？</p>
                        </h2>
                    </div>
                    <div class="height-90"></div>
                    <div class="row">
                        <div class="col-xs-offset-3 col-xs-6 pad-right-none">
                            <button type="submit" class="btn-block action-btn action-btn-md action-btn-high"
                                    id="update-info-iinavi" data-url="{{ route('iinavi.update') }}"> 連携する</button>
                        </div>
                    </div>
                    @elseif(isset($success))
                        @if ($success == 1)
                        <div class="row">
                            <h2>
                                <p class="text-center">連携に成功しました。</p>
                            </h2>
                        </div>
                        <div class="height-90"></div>
                        <div class="row">
                            <div class="col-xs-offset-3 col-xs-6 pad-right-none">
                                <button type="button" class="btn-block action-btn action-btn-md action-btn-main" data-dismiss="modal"> 閉じる</button>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <h2>
                                <p class="text-center">連携に失敗しました。</p>
                            </h2>
                        </div>
                        <div class="height-90"></div>
                        <div class="row">
                            <div class="col-xs-offset-3 col-xs-6 pad-right-none">
                                <button type="button" class="btn-block action-btn action-btn-md action-btn-main" data-dismiss="modal"> 閉じる</button>
                            </div>
                        </div>
                        @endif
                    @endif


                </div>
                <!--end content col-->
            </div>
        </div>

    </div>
</section>
