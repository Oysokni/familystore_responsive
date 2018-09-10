@extends('layouts.mail-product')

<?php
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;
use Carbon\Carbon;
use App\Models\Reform;
$optionIinavi = Session::get('enavi');
?>

@section('css')
    <style type="text/css">
        .padding-15 {

            padding-bottom: 15px;
        }

        .circle {
            width: 14px;
            height: 14px;
            background-color: rgb(0, 0, 0);
            top: 4px;
            position: absolute;
            border-radius: 100%;
            margin: 0px 5px 0px 0px;
        }
    </style>
@stop

@section('content')

<table width="100%">
    <tr>
        <td colspan="2" style=" width: 90px;"></td>
        <td colspan="1" class="padding-15"><h3>LIXIL Family STORE リフォームお申し込み完了メール</h3> </td>
    </tr>
</table>

<table width="100%" >
    <tbody>
        <tr>
            <td colspan="3" class="padding-15"><label> <b> ●お申し込み者情報 </b></label></td>
            <td  class="padding-15" colspan=""> <span>お申込み日　：　{{ Carbon::now()->format("Y.m.d") }}</span> </td>
        </tr>
        @if (isset($kento_plan_no) && $kento_plan_no != null) 
        <tr>
            <td colspan="2" ><label class="pad-top-8"> ■お申し込みNo </label></td>
            <td colspan="3" >
                <table>
                    <tr>
                        <td>{{ $kento_plan_no }}</td>
                    </tr>
                </table>
                
            </td>
        </tr>
        @endif
        
        
        <tr>
            <td  class="padding-15" colspan="2"><label for="">会員区分/会員番号</label></td>
            <td colspan="2"  class="padding-15"><span>{{ HelperFunc::showUserId($currentUser) }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label for="">氏名</label></td>
            <td  ><span>{{ $currentUser->sei_local. '　' .$currentUser->mei_local }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="1"  ><label for="">電話番号</label></td>
            <td class="padding-15" ><span>{{ $currentUser->idm_denwa_no }}</span></td>
            <td class="padding-15"><label for="">携帯電話番号</label></td>
            <td class="padding-15"><span>{{ $currentUser->idm_keitai_tel }}</span></td>

        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label for="">メールアドレス</label></td>
            <td class="padding-15" colspan="2" ><span>{{ $currentUser->mail }}</span></td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">住所</label></td>
            <td class="padding-15" colspan="2" ><span>〒{{ $currentUser->zip_no .'　'. $currentUser->todouhuken_mei . $currentUser->sikutyouson_mei . $currentUser->tyoumei }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label for="">会社名</label></td>
            <td colspan="2" class="padding-15" >
                <span>{{ $currentUser->company_mei ? $currentUser->company_mei : '' }}</span>
            </td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label class="pad-top-8">所属部署</label></td>
            <td class="padding-15" colspan="2">  {{ isset($data['syozokubusyo_mei']) ? $data['syozokubusyo_mei'] : '' }}</td>
            <td colspan="" rowspan="" headers=""></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2"> <label class="pad-top-4">連絡方法</label></td>
            <td class="padding-15" colspan="2">
                 <?php
                        $contactMethods = HelperFunc::listContactMethods();
                        $contactMethodIdx = 0;
                        $contactMethodArr = [];
                        foreach ($contactMethods as $key => $label) {
                            if (substr($data['renraku_kbn'], $contactMethodIdx, 1) == '1') {
                                $contactMethodArr[] = $label;
                            }
                            $contactMethodIdx++;
                        }
                        ?>
                        {{ $contactMethodArr ? implode('、', $contactMethodArr) : '' }}
            </td>
        </tr>

        <tr>
            <td colspan="4" class="padding-15" ><b> <i class="circle"></i> <label class="label-bold pdl-15">● リフォーム内容</label></b></td>
        </tr>

        @if (in_array($currentUser->memberType(), [ViewConst::USER_TYPE_LIME_NORMAL, ViewConst::USER_TYPE_LIME_SPECIAL]))
        <tr>
            <td colspan="2" class="padding-15" ><span>リフォーム場所</span></td>
            <?php
                $reformLocates = HelperFunc::listLocationsReform();
            ?>
            <td class="padding-15" colspan="2">
                {{ isset($reformLocates[$data['taisyou_kbn']]) ? $reformLocates[$data['taisyou_kbn']] : '' }}
            </td>
        </tr>

        <tr>
            <td colspan="2" ><label class="pad-top-8">住所 </label></td>
            <td colspan="3" >
                <table>
                    <tr>
                        <td colspan="2"> <label>郵便番号</label></td>
                        <td>{{ isset($data['zip_no']) ? $data['zip_no'] : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>都道府県名</label></td>
                        <td>{{ isset($data['bkn_todouhuken_mei']) ? $data['bkn_todouhuken_mei'] : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>市区町村名</label> </td>
                        <td>{{ isset($data['bkn_sikutyouson_mei']) ? $data['bkn_sikutyouson_mei'] : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>町名番地</label></td>
                        <td>{{ isset($data['bkn_tyoumei']) ? $data['bkn_tyoumei'] : '' }}</td>
                    </tr>

                    <tr>
                        <td colspan="2"><label>建物区画名</label></td>
                        <td>{{ isset($data['bkn_tat_mei']) ? $data['bkn_tat_mei'] : '' }}</td>
                    </tr>
                </table>
                
            </td>
        </tr>
        @endif

        <tr>
             <td colspan="2" class="padding-15" ><span>建築種別</span></td>
             <td>
                <?php
                $typeBuildings = HelperFunc::typeBuildings();
                $tatSyurui = isset($data['tatsyurui_kbn']) ? $data['tatsyurui_kbn'] : null;
                ?>
                {{ $tatSyurui && isset($typeBuildings[$tatSyurui]) ? $typeBuildings[$tatSyurui] : '' }}
            </td>
        </tr>

        <tr>
             <td colspan="2" class="padding-15" ><span>築年数</span></td>
             <td>
                <?php
                $listTiknensus = HelperFunc::listTiknensus();
                $tiknensuKbn = isset($data['tiknensu_kbn']) ? $data['tiknensu_kbn'] : null;
                ?>
                {{ $tiknensuKbn && isset($listTiknensus[$tiknensuKbn]) ? $listTiknensus[$tiknensuKbn] : '' }}
                </td>
        </tr>

        <tr>
             <td colspan="2" class="padding-15" ><span>ご予算</span></td>
             <td>
                 <?php
                        $reformYosans = HelperFunc::listReformYosans();
                        $reformYosanKbn = isset($data['reform_yosan_kbn']) ? $data['reform_yosan_kbn'] : null;
                        ?>
                        {{ $reformYosanKbn && isset($reformYosans[$reformYosanKbn]) ? $reformYosans[$reformYosanKbn] : '' }}
            </td>
        </tr>

        <tr>
             <td colspan="2" class="padding-15" ><span>ご計画の部位</span></td>
             <td>
                @if (isset($data['reform_bui']) && $data['reform_bui'])
                    {{ Reform::renderNameByReformBui($data['reform_bui'], $categories) }}
                @endif
            </td>
        </tr>

        <tr>
             <td colspan="2" class="padding-15" > <span>ご希望時期</span></td>
             <td>
                <?php 
                        $listDesiredTimes = HelperFunc::listKiboDates(); 
                        ?>
                        @if (isset($data['kibo_date']) && isset($listDesiredTimes[$data['kibo_date']]))
                            {{ $listDesiredTimes[$data['kibo_date']] }}
                        @endif
            </td>
        </tr>

        <tr>
            <td colspan="4" class="padding-15" ><b> <i class="circle"></i> <label class="label-bold pdl-15">● お申込み 検討プラン</label></b></td>
        </tr>

        <tr>
            <td colspan="4" class="padding-15" >
               @if (!$products->isEmpty())
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
                   $arrayFields[] = ['プラン価格', HelperFunc::cartPlanPriceHtml($product, $currentUser)];
                   //pattern 5
                   $hasProdIinavi = false;
                   if (isset($optionIinavi[$product->shopping_id]) && ($prodIinavi = $optionIinavi[$product->shopping_id])) {
                       if ($prodIinavi['enavi_mitsu_cd3'] && $prodIinavi['enavi_mitsu_cd4']) {
                           $hasProdIinavi = true;
                       }
                   }
                   if (in_array($product->syouhin_toroku_kbn, [ViewConst::TYPE_REGIS_PROD_COMMON, ViewConst::TYPE_REGIS_PROD_EST_IINAVI]) && $hasProdIinavi) {
                       $arrayFields[] = ['いいナビ見積No', $product->enavi_mitsu_cd3];
                       $arrayFields[] = ['いいナビアクセスコード', $product->enavi_mitsu_cd4];
                   }
                   ?>
                    
                    <table>
                    
                        <tbody>
                            @foreach ($arrayFields as $field)
                            <tr>
                                
                                <td colspan="4" ><span class="desc-title col-xs-3">{{ $field[0] }}</span></td>
                                
                                <td colspan="2" ><span style="margin-left: 182px;" class="desc-value col-xs-9">{{ $field[1] }}</span></td>
                            </tr>
                           
                            
                            @endforeach
                            
                            <tr>
                                <td colspan="4" style="border-bottom: 1px solid;" ></td>
                                <td colspan="4" style="width: 562px; border-bottom: 1px solid;" ></td>
                            </tr>
                        </tbody>
                    </table>
                   
                   @endforeach
                @endif
                </td>
        </tr>
        
        

    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td class="padding-15" colspan="2" ><span>その他特記事項（500文字以内）</span>
            <label for=""></label>
            </td>

            <td colspan="2" class="padding-15" ></td>

        </tr>

        <tr>
            <td class="padding-15"  >
            	{{ isset($data['req_memo']) ? $data['req_memo'] : '' }}
            </td>
        </tr>
    </tbody>
</table>


@endsection