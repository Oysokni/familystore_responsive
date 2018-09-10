<?php
use Carbon\Carbon;

$oldTaiouKbns = Session::has('builderName') ? collect(Session::get('builderName')) : '';
?>

@extends('layouts.front')

@section('title')
    {{  trans('builder.builder_title') }}
@endsection
@section('breadcrumb')
    <div class="nav-breadcrumb nav-2">
        @include('includes.breadcrumb')
    </div>
@endsection

@section('content-col')
<div class="bd-intro">
    <h3 class="wrap-title wrap-title-intro">
        <i class="lxl-architecture_urban lxl-title"></i> 住宅購入・紹介
    </h3>

    <table class="table table-labels table-no-border">
        <tr>
            <td>
                <span class="text-btn text-btn-intro">概要</span>
            </td>
            <td>
                <div class="text-desc">LIXILグループで働く皆さんが良い住まいを購入し易くする為のサポートを行うと共に、
                    家族、友人、知人に、住宅購入を進め易くし、社員全員が営業マン となり、売上向上に貢献する為の、
                    住宅購入･紹介のお申込みが出来ます。
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span class="text-btn text-btn-intro">対象地域</span>
            </td>
            <td>
                <div class="text-desc">
                    国内現場
                </div>
            </td>
        </tr>
    </table>
</div>

<!--end box-->
<div class="box">
    <h3 class="box-title">ビルダー検索</h3>
    @include('builder.includes.common')
    <div class="section-list" id="search-result">
        @if (isset($builders))
        <form method="post" action="{{ route('builder.store') }}">
            {!! csrf_field() !!}
            <div class="guide">
                <p>（凡例）</p>
                <ul>
                    @if(isset($errorType) && count($errorType))
                    <li>
                        <p>HM：ハウスメーカー、BD：地場ビルダー、FC：LIXILグループFC、SW：{{ $errorType['error_type_sw'] }}</p>
                    </li>
                    @else
                    <li>
                        <p>HM：ハウスメーカー、BD：地場ビルダー、FC：LIXILグループFC、SW：スーパーウォール対応ビルダー</p>
                    </li>
                    @endif
                    <li>
                        <div>
                            <div class="explain">
                                <div class="type-1">紹介</div>
                                <p>：紹介特典有り、</p>
                            </div>
                            <div class="explain">
                                <div class="type-2">成約</div>
                                <p>：成約特典有り、</p>
                            </div>
                            <div class="explain">
                                <div class="type-3">値引</div>
                                <p>：建物値引き等有り</p>
                            </div>
                            <div class="explain">
                                 <a href="{{ route('link.LIXIL_Family_STORE_住宅購入紹介特典.pdf') }}" target="_blank"
                                   class="btn-block note-btn">特典を確認する</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="list-builder">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="list-builder-header" id="list-builder-header">
                            <p>紹介可能ビルダー一覧</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="custom-pagination pull-right">
                            <ul>
                                @for($i = 1; $i <= $totalPages; $i++)
                                    @if($i == 1)
                                        <li class="active">
                                            <a data-toggle="tab" id="page-number{{$i}}" href="#page-{{$i}}">
                                                {{$i}}
                                            </a>
                                        </li>
                                    @else
                                    <li>
                                        <a data-toggle="tab" id="page-number{{$i}}" href="#page-{{$i}}">
                                            {{$i}}
                                        </a>
                                    </li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                        <div class="pagination-label pull-right">
                            <p><span id="total-builder">{{$totalItems}}</span>件中<span class="first-builder"></span>〜<span class="last-builder"></span>件を表示</p>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div>
                        @foreach ($errors->all() as $error)
                            <p><span class="error-mess">{{ $error }}</span></p>
                        @endforeach
                    </div>
                @endif

                @if(isset($errorType) && count($errorType))
                <div class="text-bold">
                    <span class="error-mess error-check-builder">{{ $errorType['error_type'] }}</span>
                </div>
                @endif
            </div>

            <div class="tab-content">
                @for($i = 1; $i <= $totalPages; $i++)
                    <div id="page-{{$i}}" class="{{$i == 1 ? 'tab-pane fade in active' : 'tab-pane fade'}} ">
                        <div class="list-builder-content table-responsive">
                            <table class="table">
                                @php $count = 0 @endphp
                                @foreach($builders as $builder)
                                @php $count++; @endphp
                                @if ($count > ($i - 1) * $itemsPerPage && $count <= $i * $itemsPerPage)
                                <tr>
                                    <td>
                                        <div class="list-builder-item">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            @if($builder->display_order_1 == 1)
                                                                <span class="obligate">※</span>
                                                            @else
                                                                <span>※</span>
                                                            @endif
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <input type="checkbox" id="checkbox-builder{{$builder->builder_id}}" name="builder_name[{{$builder->builder_id}}]" value="{{$builder->builer_mei}}"
                                                                   @if(isset(session('taiou_kbn_flash')[$builder->builder_id]))
                                                                        checked
                                                                   @elseif(isset($oldTaiouKbns[$builder->builder_id]))
                                                                        checked
                                                                    @else
                                                                        ''
                                                                    @endif
                                                                />
                                                            <label for="checkbox-builder{{$builder->builder_id}}"> {{$builder->builer_mei}} </label>
                                                        </p>
                                                        <input type="hidden" id="taiouKbn{{$builder->builder_id}}" name="taiou_kbn[{{$builder->builder_id}}]" value="{{ $builder->display_order_1 }}" disabled/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="list-builder-item">
                                            @php
                                                $builderTypes = array();
                                                if ($builder->display_order_1 == 1) {
                                                    $builderTypes[] = 'HM';
                                                }
                                                if (substr($builder->taiou_kbn, 1, 1)) {
                                                    $builderTypes[] = 'BD';
                                                }
                                                if (substr($builder->taiou_kbn, 2, 1)) {
                                                    $builderTypes[] = 'FC';
                                                }
                                                if (substr($builder->taiou_kbn, 3, 1)) {
                                                    $builderTypes[] = 'SW';
                                                }
                                                if(empty($builderTypes)) {
                                                    $builderType = "";
                                                } else {
                                                    $builderType = "(" . implode ("・", $builderTypes) . ")";
                                                }
                                            @endphp
                                            <p>{{$builderType}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="list-builder-item" width="20%">
                                            <div class="type-1 {{substr($builder->benefit_flg, 0, 1) ? : 'negative'}}">紹介</div>
                                            <div class="type-2 {{substr($builder->benefit_flg, 1, 1) ? : 'negative'}}">成約</div>
                                            <div class="type-3 {{substr($builder->benefit_flg, 2, 1) ? : 'negative'}}">値引</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="list-builder-item">
                                            <a href="{{preg_match("/^(http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i", $builder->builder_url, $match) ? $builder->builder_url : '//' . $builder->builder_url}}" target="_blank" role="button" class="icon-btn pull-right">
                                                <i class="icon-homepage"></i>
                                                ホームページ
                                            </a>
                                        </div>
                                    </td>
                            </tr>
                            @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endfor
                <div class="row list-builder">
                    <div class="col-lg-7 col-lg-offset-5">
                        <div class="custom-pagination pull-right custom-pagination-bottom">
                            <ul>
                                @for($i = 1; $i <= $totalPages; $i++)
                                    @if($i == 1)
                                        <li class="active">
                                            <a data-toggle="tab" id="bottom-page-number{{$i}}" href="">
                                                {{$i}}
                                            </a>
                                        </li>
                                    @else
                                    <li>
                                        <a data-toggle="tab" id="bottom-page-number{{$i}}" href="">
                                            {{$i}}
                                        </a>
                                    </li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                        <div class="pagination-label pull-right">
                            <p><span id="total-builder">{{$totalItems}}</span>件中<span class="first-builder"></span>〜<span class="last-builder"></span>件を表示</p>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" id="builder-submit" class="action-btn btn-block custom-btn">チェックしたビルダーに住宅購入・紹介を申し込む</button>
        </form>
        <input type="hidden" id="total-items" name="totalItems" value="{{$totalItems}}"/>
        <input type="hidden" id="items-per-page" name="itemsPerPage" value="{{$itemsPerPage}}"/>
        @endif
    </div>
    <!--end section list-->
</div>
<!--end box-->
<!-- Modal -->
<div id="policiesModal" class="modal fade" role="dialog">
  <div class="modal-dialog custom-dialog">
    <!-- Modal content-->
    <div class="modal-content custom-content">
        <div class="modal-body custom-body">
            <button type="button" data-dismiss="modal"><i class="close"></i></button>
        </div>
    </div>
  </div>
</div>
@endsection

@section('sidebar-col')

@if (!$notifications->isEmpty())
<div class="element-link mgb-70">
    <a href="#reform_notify" class="text-nounderline">住宅購入･紹介 お知らせ</a>
</div>
@else
<div class="height-90"></div>
@endif

@include('builder.includes.sidebar')
@endsection

@section('foot_content')
<div class="height-90">
    <div class="to-top-box pull-right">
        <a href="#" class="text-nounderline">
            <i class="lxl-icon-circle circle-main arrow_upward"></i>
            <span class="text-desc text-border">ページトップ</span>
        </a>
    </div>
    <div class="height-50 mgb-30 bd-main"></div>
</div>
@if (!$notifications->isEmpty())
<div class="box box-notify mgb-75" id="reform_notify">
    <h3 class="box-title mgb-8">お知らせ</h3>
    <table class="table table-note text-desc">
        @foreach($notifications as $note)
        <tr>
            <td>
                <strong>{{ Carbon::parse($note->osirase_start_ymd)->format('Y/m/d') }}</strong>
            </td>
            <td>
                <p class="note-header"><strong>{{ $note->osirase_title }}</strong></p>
                <div class="note-content pre-line-space">{{ $note->osirase_message }}</div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection

@section('footer')
<script type="text/javascript" src="/js/jquery.maphilight.min.js"></script>
<script type="text/javascript" src="/js/builder/index.js"></script>
<script type="text/javascript" src="/js/builder/search.js"></script>
@endsection
