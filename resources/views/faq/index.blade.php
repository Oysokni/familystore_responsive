@extends('layouts.front')

@section('title', $title)

@section('head')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('breadcrumb')
    <div class="nav-breadcrumb nav-2">
        @include('includes.breadcrumb')
    </div>
@endsection
<?php
use App\Models\Faq;
?>
@section('content')
<div class="box">
    @if($faqType == Faq::TYPE_REFORM_FAQ)
    <h2>FAQ（リフォームストア）</h2>
    @elseif($faqType == Faq::TYPE_BUILDER_FAQ)
    <h2>FAQ（住宅購入･紹介版）</h2>
    @endif
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
            $num1 =0;
            $num2 =0;
            $num3 =0;
            $num4 =0;
            $num5 =0;
            foreach($faqs as $key => $faq) {
                if($faq['ask_bunrui'] === '会員登録') {
                   $num1 = $num1 +1;
                }

                if($faq['ask_bunrui'] === '制度・申込み') {
                   $num2 = $num2 +1;
                }

                if($faq['ask_bunrui'] === '工事・対応') {
                    $num3 = $num3 +1;
                }

                if($faq['ask_bunrui'] === '商品・価格') {
                    $num4 = $num4 +1;
                }

                if($faq['ask_bunrui'] === '請求・支払') {
                    $num5 = $num5 +1;
                }

            }
        ?>
        @if ($num1 >0)
        <table class="table-faq"  >
            <thead class="thead-inverse">
                <tr>
                    <th class="th-faq">分類</th>
                    <th class="th-faq">よくある質問</th>
                    <th class="th-faq">回答</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($faqs))
                    @foreach ($faqs as $key => $faq)
                        @if($faq['ask_bunrui'] === '会員登録')
                            <tr class="border-faq">
                                <td class="border-faq width-10 "><p class="mgb-20">{{ $faq['ask_bunrui']}}</p></td>
                                <td class="border-faq width-45">{{ $faq['ask_message'] }}</td>
                                <td class="border-faq width-45 ">{{ $faq['ques_message'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        @endif
        @if ($num2 >0)
        <table class="table-faq"  >
            <thead class="thead-inverse">
                <tr>
                    <th class="th-faq">分類</th>
                    <th class="th-faq">よくある質問</th>
                    <th class="th-faq">回答</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($faqs))
                    @foreach ($faqs as $key => $faq)
                        @if($faq['ask_bunrui'] === '制度・申込み')
                            <tr class="border-faq">
                                <td class="border-faq width-10 "><p class="mgb-20">{{ $faq['ask_bunrui'] }}
                                @if ($faq['faq_taisyou_kbn'] == 2 )
                                <br>リフォーム
                                @elseif ($faq['faq_taisyou_kbn'] == 3)
                                <br>住宅購入紹介
                                @endif
                                </p></td>
                                <td class="border-faq width-45">{{ $faq['ask_message'] }}</td>
                                <td class="border-faq width-45 ">{{ $faq['ques_message'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        @endif
        @if ($num3 >0)
        <table class="table-faq"  >
            <thead class="thead-inverse">
                <tr>
                    <th class="th-faq">分類</th>
                    <th class="th-faq">よくある質問</th>
                    <th class="th-faq">回答</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($faqs))
                    @foreach ($faqs as $key => $faq)
                        @if($faq['ask_bunrui'] === '工事・対応')
                            <tr class="border-faq">
                                <td class="border-faq width-10 "><p class="mgb-20">{{ $faq['ask_bunrui'] }}
                                    @if ($faq['faq_taisyou_kbn'] == 2 )
                                    <br>リフォーム
                                    @elseif ($faq['faq_taisyou_kbn'] == 3)
                                    <br>住宅購入紹介
                                    @endif
                                </p></td>
                                <td class="border-faq width-45">{{ $faq['ask_message'] }}</td>
                                <td class="border-faq width-45 ">{{ $faq['ques_message'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        @endif

        @if ($num4 >0)
        <table class="table-faq"  >
            <thead class="thead-inverse">
                <tr>
                    <th class="th-faq">分類</th>
                    <th class="th-faq">よくある質問</th>
                    <th class="th-faq">回答</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($faqs))
                    @foreach ($faqs as $key => $faq)
                        @if($faq['ask_bunrui'] === '商品・価格')
                            <tr class="border-faq">
                                <td class="border-faq width-10 "><p class="mgb-20">{{ $faq['ask_bunrui'] }}
                                    @if ($faq['faq_taisyou_kbn'] == 2 )
                                    <br>リフォーム
                                    @elseif ($faq['faq_taisyou_kbn'] == 3)
                                    <br>住宅購入紹介
                                    @endif
                                </p></td>
                                <td class="border-faq width-45">{{ $faq['ask_message'] }}</td>
                                <td class="border-faq width-45 ">{{ $faq['ques_message'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        @endif

        @if ($num5 >0)
        <table class="table-faq"  >
            <thead class="thead-inverse">
                <tr>
                    <th class="th-faq">分類</th>
                    <th class="th-faq">よくある質問</th>
                    <th class="th-faq">回答</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($faqs))
                    @foreach ($faqs as $key => $faq)
                        @if($faq['ask_bunrui'] === '請求・支払')
                            <tr class="border-faq">
                                <td class="border-faq width-10 "><p class="mgb-20">{{ $faq['ask_bunrui'] }}
                                    @if ($faq['faq_taisyou_kbn'] == 2 )
                                    <br>リフォーム
                                    @elseif ($faq['faq_taisyou_kbn'] == 3)
                                    <br>住宅購入紹介
                                    @endif
                                </p></td>
                                <td class="border-faq width-45">{{ $faq['ask_message'] }}</td>
                                <td class="border-faq width-45 ">{{ $faq['ques_message'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        @endif
    </div>

</div>
@endsection
