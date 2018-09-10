<div class="cart-head">
    <div class="title-page">
        <h3 class="mgb-10">手続き</h3>
    </div>
    <div class="steps mgb-30">
        <div class="row">
            <div class="col-xs-2 lxl_ul">
                <ul>
                    <li>Step 1</li>
                    <li>申し込む</li>
                </ul>
            </div>

            <span class="arrow-1 arrow"><i class="arrow_forward"></i></span>
            <div class="col-xs-2 lxl_ul">
                <ul>
                    <li>Step 2 </li>
                    <li>店舗と打ち合わせ</li>
                </ul>
            </div>
            <span class="arrow-2 arrow"><i class="arrow_forward"></i></span>
            <div class="col-xs-2 lxl_ul">
                <ul>
                    <li>Step 3</li>
                    <li>店舗と契約</li>
                </ul>
            </div>
            <span class="arrow-3 arrow"><i class="arrow_forward"></i></span>
            <div class="col-xs-2 lxl_ul">
                <ul>
                    <li>Step 4</li>
                    <li>リフォーム工事</li>
                </ul>
            </div>
            <span class="arrow-4 arrow"><i class="arrow_forward"></i></span>
            <div class="col-xs-2 lxl_ul">
                <ul>
                    <li>Step 5</li>
                    <li>お支払い</li>
                </ul>
            </div>
        </div>
        @if (isset($back))
        <div class="height-20"></div>
        <div class="row">
            <div class="col-xs-6">
                <a href="{{ route('cart.list.product') }}" class="text-bold">
                    <i class="lxl-icon-circle circle-high arrow_back icon-right"></i>
                    <span>カートに戻る</span>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
