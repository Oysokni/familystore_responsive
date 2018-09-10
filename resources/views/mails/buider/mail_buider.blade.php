@extends('layouts.mail-product')

<?php
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;
use Carbon\Carbon;
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

<table>
    <tr>
        <td colspan="2" style=" width: 150px;"></td>
        <td colspan="1" class="padding-15"><h3>LIXIL Family STORE 住宅購入･紹介 お申し込み完了メール</h3></td>
    </tr>
</table>

<table width="100%" >
    <tbody>


        <tr>
            <td colspan="3" class="padding-15"><label> <b> ●お申し込み者情報 </b></label></td>
            <td  class="padding-15" colspan=""> <span>お申込み日　：　{{ Carbon::now()->format("Y.m.d") }}</span> </td>
        </tr>
        <tr>
            <td  class="padding-15" colspan="2"><label for="">お申し込みNo   </label></td>
            <td colspan="2"  class="padding-15"><span>{{ $data['kento_plan_id'] }}</span></td>
        </tr>
        <tr>
            <td  class="padding-15" colspan="2"><label for="">会員区分/会員番号</label></td>
            <td colspan="2"  class="padding-15"><span>{{ HelperFunc::showUserId() }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label for="">氏名</label></td>
            <td  ><span>{{ $data['sei_local']. '　' .$data['mei_local'] }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="1"  ><label for="">電話番号</label></td>
            <td class="padding-15" ><span>{{ $data['idm_denwa_no'] }}</span></td>
            <td class="padding-15"><label for="">携帯電話番号</label></td>
            <td class="padding-15"><span>{{ $data['idm_keitai_tel'] }}</span></td>

        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label for="">メールアドレス</label></td>
            <td class="padding-15" colspan="2" ><span>{{ $data['mail'] }}</span></td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">住所</label></td>
            <td class="padding-15" colspan="2" ><span>{{ $data['address'] }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2" ><label for="">会社名</label></td>
            <td colspan="2" class="padding-15" >
                <span>{{ $data['company_mei'] ? $data['company_mei'] : '' }}</span>
            </td>
        </tr>
        <tr>
            <td class="padding-15"><label class="pad-top-8">所属部署</label></td>
            <td class="padding-15">  {{ isset($data['syozokubusyo_mei']) ? $data['syozokubusyo_mei'] : '' }}</td>
            <td colspan="" rowspan="" headers="">社員区分</td>
            <td colspan="" rowspan="" headers="">
                <label class="radio-inline">
                    @if ($data['syain_kbn'] == 1)
                        <span>社員・嘱託社員</span>
                    @elseif ($data['syain_kbn'] == 2)
                        <span>パート社員 （アルバイトは不可）</span>
                    @endif
                </label>
            </td>
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
            <td colspan="4" class="padding-15" ><b> <i class="circle"></i> <label class="label-bold pdl-15">●ご紹介いただける方</label></b></td>
        </tr>


        <tr>
            <td colspan="2" class="padding-15" ><span>ご紹介者様(貴方様)とお施主様（建築予定者様）の関係</span></td>
            <?php
                $builderSyoukais = HelperFunc::listBuilderSyoukais();
            ?>
            <td class="padding-15" colspan="2">
                @if (isset($data['syoukai_kbn']) && isset($builderSyoukais[$data['syoukai_kbn']]))
                    <span>{{ $builderSyoukais[$data['syoukai_kbn']] }}</span>
                @endif
            </td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">フリガナ</label></td>
            <td colspan="2" class="padding-15" >
                 <span>{{ $data['s_sei_kana'] }}</span>　<span>{{ $data['s_mei_kana'] }}</span>
            </td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">氏名</label></td>
            <td colspan="2" class="padding-15" >
                <span>{{ $data['s_sei_local'] }}</span>　<span>{{ $data['s_mei_local'] }}</span>
            </td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" > <label for="">電話番号</label></td>
            <td class="padding-15" colspan="2"><span>{{ $data['s_idm_denwa_no'] }}</span></td>
        </tr>
        <tr>
            <td class="padding-15" colspan="2"><label for="">携帯電話番号</label></td>
            <td class="padding-15" colspan="2"><span>{{ $data['s_idm_keitai_tel'] }}</span></td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">メールアドレス</label></td>
            <td colspan="2" class="padding-15" >
                <span>{{ $data['s_mail'] }}</span>
            </td>
        </tr>

        <tr>
            <td colspan="2" ><label class="pad-top-8">住所 </label></td>
            <td colspan="3" >
                <table>
                    <tr>
                        <td colspan="2"> <label>郵便番号</label></td>
                        <td>
                        	<span>{{ $data['zip21'] ? $data['zip21'] : ''}}</span>-
                        	<span>{{ $data['zip22'] ? $data['zip22'] : ''}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>都道府県名</label></td>
                        <td>
                        	@if ($data['s_todouhuken_mei'])
			                    <span>{{ $data['s_todouhuken_mei'] }}</span>
			                @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>市区町村名</label> </td>
                        <td>
                        	@if ($data['s_sikutyouson_mei'])
			                    <span>{{ $data['s_sikutyouson_mei'] }}</span>
			                @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>町名番地</label></td>
                        <td>
                        	@if ($data['s_tyoumei'])
			                    <span>{{ $data['s_tyoumei'] }}</span>
			                @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><label>建物区画名</label></td>
                        <td>
                        	@if ($data['s_tat_mei'])
			                    <span>{{ $data['s_tat_mei'] }}</span>
			                @endif
                        </td>
                    </tr>
                </table>

            </td>
        </tr>

        <tr>
            <td colspan="4" class="padding-15" ><b> <i class="circle"></i> <label class="label-bold pdl-15">●ご計画内容</label></b></td>
        </tr>

        <tr>
            <td colspan="2" ><label class="pad-top-8">建築予定地  </label></td>
            <td colspan="3" >
                <table>
                    <tr>
                        <td colspan="2"> <label>都道府県名 ：</label></td>
                        <td>
                        	@if ($data['bkn_todouhuken_mei'])
                                <span>{{ $data['bkn_todouhuken_mei'] }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">  <label>市町村名</label></td>
                        <td>
                        	@if ($data['bkn_sikutyouson_mei'])
			                    <span>{{ $data['bkn_sikutyouson_mei'] }}</span>
			                @endif
                        </td>
                    </tr>

                </table>

            </td>
        </tr>

	        <tr>
	            <td class="padding-15" colspan="2" ><label for="">希望対応先</label></td>
	            <td colspan="2" class="padding-15" >
	                 <span>{{ (isset($taiouKbn['name'])) ? $taiouKbn['name'] : '' }}</span>
	            </td>
	        </tr>



		<tr>
            <td class="padding-15" colspan="2" ><label for="">案件区分</label></td>
            <td colspan="2" class="padding-15" >
                <?php
                    $builderAnkens = HelperFunc::listBuilderAnkens();
                ?>
                    <label>
                        @if (isset($data['anken_kbn']) && !empty($data['anken_kbn']) )
                            @foreach($data['anken_kbn'] as $key => $nameKbn)
                                @if ($key < (count($data['anken_kbn']) - 1))
                                 {{ $builderAnkens[$nameKbn].','.'&nbsp;' }}                     
                                @else 
                                 {{ $builderAnkens[$nameKbn] }}
                                @endif
                            @endforeach
                        @endif
                    </label>
            </td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">土地有無</label></td>
            <td colspan="2" class="padding-15" >

                @if (isset($data['tochi_flg']) && $data['tochi_flg'] != NULL)
            		<span>有り</span>
        		@endif
            </td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">予算総額区分</label></td>
            <td colspan="2" class="padding-15" >
            	<?php
			        $builderYousans = HelperFunc::listBuilderYosans();
			    ?>
		        @if (isset($data['yosan_all_kbn']) && isset($builderYousans[$data['yosan_all_kbn']]))
			        <span>{{ $builderYousans[$data['yosan_all_kbn']] }}</span>
		        @endif

            </td>
        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><label for="">中古住宅紹介希望区分</label></td>
            <td colspan="2" class="padding-15" >
                @if (isset($data['tyuko_flg']) && $data['tyuko_flg'] != NULL)
		            <span>希望する</span>
		        @endif
            </td>
        </tr>

    </tbody>
</table>
<table>

	<tbody>
		<tr>
            <td colspan="4" class="padding-15" ><b> <i class="circle"></i> <label class="label-bold pdl-15">●折衝希望先</label></b></td>
        </tr>

        <tr>

            @if (isset($data['kibo_builder_txt']))
	            <td colspan="2" class="padding-15" >
	               {{ $data['kibo_builder_txt'] }}
	            </td>
            @endif
        </tr>

        <tr>
            <td colspan="4" class="padding-15" ><b> <i class="circle"></i> 	  <label class="label-bold pdl-15">
	            <span>●ご連絡方法</span>

	   			</label>
	   			</b>
	   			<span>（お施主様に対して）</span>
   			</td>
        </tr>

        <tr>


            <td colspan="2" class="padding-15" >
                <?php
				    $seshuRenrakus = HelperFunc::listBuilderSeshuRenrakus();
				    ?>
				    @if (isset($data['seshu_renraku']) && isset($seshuRenrakus[$data['seshu_renraku']]))
				        <span>{{ $seshuRenrakus[$data['seshu_renraku']] }}</span>
			    @endif
            </td>

        </tr>

        <tr>
            <td class="padding-15" colspan="2" ><span>その他特記事項（500文字以内）</span>
            <label for=""></label>
            </td>

	            <td colspan="2" class="padding-15" >

	            </td>

        </tr>

        <tr>
            <td class="padding-15"  >
            	@if (isset($data['req_memo']) && $data['req_memo'] != NULL)
        			<span>{{ $data['req_memo'] }}</span>
    			@endif
            </td>
        </tr>
	</tbody>
</table>


@endsection
