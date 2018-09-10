<?php
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;

$optionIinavi = Session::get('enavi');
?>

@if (!$products->isEmpty())
<div class="products list-products">
    @foreach ($products as $product)
    <?php
    $arrayFields = [
        ['カテゴリー', $product->category_mei],
        ['商品名', $product->syouhin_mei],
        ['プラン名', $product->plan_mei]
    ];

    //pattern 3
    if ($product->syouhin_toroku_kbn == ViewConst::TYPE_REGIS_PROD_EST_KENGINE || $product->syouhin_toroku_kbn == ViewConst::TYPE_REGIS_PROD_TPL_KENGINE) {
        $arrayFields[] = ['プランNo', HelperFunc::getPlanNumberHtml($product)];
    }
    //pattern 1 or 2;
    $arrayFields[] = ['プラン価格', HelperFunc::cartPlanPriceHtml($product)];
    //pattern 5
    $hasProdIinavi = false;
    if (isset($optionIinavi[$product->shopping_id]) && ($prodIinavi = $optionIinavi[$product->shopping_id])) {
        if ($prodIinavi['enavi_mitsu_cd3'] || $prodIinavi['enavi_mitsu_cd4']) {
            $hasProdIinavi = true;
        }
    }

    if ($product->enavi_mitsu_cd3 != '' || $product->enavi_mitsu_cd4 != '') {
        $hasProdIinavi = true;
    }

    if (in_array($product->syouhin_toroku_kbn, [ViewConst::TYPE_REGIS_PROD_COMMON, ViewConst::TYPE_REGIS_PROD_EST_IINAVI])
            && $hasProdIinavi) {
        $arrayFields[] = ['いいナビ見積No', isset($prodIinavi['enavi_mitsu_cd3']) ? $prodIinavi['enavi_mitsu_cd3'] : $product->enavi_mitsu_cd3];
        $arrayFields[] = ['いいナビアクセスコード', isset($prodIinavi['enavi_mitsu_cd4']) ? $prodIinavi['enavi_mitsu_cd4'] : $product->enavi_mitsu_cd4];
    }
    ?>
    <div class="product">
        <div class="row">
            <div class="col-xs-9 item-desc-col text-desc">
                @foreach ($arrayFields as $field)
                <div class="desc-field row">
                    <span class="desc-title col-xs-3">{{ $field[0] }}</span>
                    <span class="desc-value col-xs-9">{{ $field[1] }}</span>
                </div>
                @endforeach
            </div>

            <div class="col-xs-3 item-thumb-col">
                <a href="#" class="thumb-img thumbh-240">
                    <img class="img-responsive" src="{{ $product->getImageSrcByCol('plan_image_filen') }}"
                         title="{{ $product->syouhin_mei }}" alt="{{ $product->syouhin_mei }}">
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
