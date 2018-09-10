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
                    @if (session()->has('iinavi'))
                        <h3 class="nowrap-space text-center">{{ session()->get('iinavi.message') }}</h3>
                        <div class="height-90"></div>
                        <div class="row">
                                <div class="col-xs-offset-3 col-xs-6 pad-right-none">
                                    <button type="button" class="btn-block action-btn action-btn-md action-btn-main" data-dismiss="modal">閉じる</button>
                                </div>
                        </div>
                    @else
                        @if($success == 1)
                        <form action="{{ route('iinavi.post.login') }}" id="form-login-iinavi" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="alert-panel alert-panel-danger hidden"></div>
                            </div>
                            <div class="row">
                                <div class=" form-horizontal form-label-left">
                                    <div class="form-group">
                                        <p class="form-label pad-left-15">ログイン名(メールアドレス)</p>
                                        <div class="input-box col-xs-12" id="email-group">
                                            <input type="text" class="form-control form-field" name="email" value="{{ old('email') }}">
                                            {!! $errors->first('email', '<i class="error form-control-feedback error-icon" data-bv-icon-for="email" style=""></i>') !!}
                                            <span class="error-mess"><p>{{ $errors->first('email') }}</p></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-horizontal form-label-left">
                                    <div class="form-group ">
                                        <p class="form-label pad-left-15">パスワード</p>
                                        <div class="input-box col-xs-12" id="password-group">
                                            <input type="password" class="form-control form-field" name="password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 pad-left-none">
                                    <button type="submit" class="btn-block action-btn action-btn-md action-btn-high" id="btn-login-iinavi">ログイン</button>
                                </div>
                                <div class="col-xs-6 pad-right-none">
                                    <button type="button" class="btn-block action-btn action-btn-md action-btn-main" data-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </form>
                        @elseif($success == 0)
                        <h3 class="nowrap-space">連携に失敗しました。再度検討から初めてください。</h3>
                        <div class="height-90"></div>
                        <div class="row">
                                <div class="col-xs-offset-3 col-xs-6 pad-right-none">
                                    <button type="button" class="btn-block action-btn action-btn-md action-btn-main" data-dismiss="modal">閉じる</button>
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
