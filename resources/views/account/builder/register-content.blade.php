<?php
use App\Helpers\HelperFunc;

$routeName = 'account.content.register_builder';
$listStatuses = HelperFunc::listReformStatuses();
$htmlPages = view('includes.paginate', compact('collection'))->render();
?>

@extends('layouts.front')

@section('title', trans('page.register_content_builder'))

@section('breadcrumb')
<div class="nav-breadcrumb nav-2">
    @include('includes.breadcrumb')
</div>
@stop

@section('content')

<h2 class="page-title cl-intro page-title-icon">
    <i class="lxl-architecture_urban"></i> 住宅購入･紹介 お申し込み内容
</h2>

<div class="box mgb-50">
    <div class="height-20"></div>
    
    {!! $htmlPages !!}
    
    <div class="table-responsive">
        <table class="table table-bordered table-register">
            <thead class="bg-high">
                <tr>
                    <th class="sorting nowrap-space">お申し込み日 {!! HelperFunc::linkOrder('regis_date', $routeName) !!}</th>
                    <th class="sorting nowrap-space">紹介区分</th>
                    <th class="nowrap-space">対象者氏名</th>
                    <th>状況</th>
                    <th>案件種類</th>
                </tr>
            </thead>
            <tbody>
                @if (!$collection->isEmpty())
                    @foreach ($collection as $item)
                    <tr>
                        <td width="160">{{ $item->regis_date ? $item->regis_date->format('Y年m月d日') : '' }}</td>
                        <td width="120">{{ $item->getSyoukaiLabel() }}</td>
                        <td width="150" class="nowrap-space">{{ $item->s_sei_local . '　' . $item->s_mei_local }}</td>
                        <td width="200">
                            <form method="post" action="{{ route('account.content.update.register_status', $item->id) }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="put">
                                
                                <select class="form-field req_form_status" name="req_form_status">
                                    @foreach ($listStatuses as $key => $label)
                                    <option value="{{ $key }}" {{ $item->req_form_status == $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td class="td-relative pdr-90">
                            <?php 
                                if (isset($item->anken_kbn) && !empty($item->anken_kbn)) {
                                    
                                    $nameKbns = explode (',', $item->anken_kbn);
                                } else {
                                    $nameKbns = '';
                                }
                                
                                $builderAnkens = HelperFunc::listBuilderAnkens();
                            ?> 
                            @if (isset($nameKbns) && !empty($nameKbns) )
                                @foreach($nameKbns as $key => $nameKbn)
                                    @if ($key < (count($nameKbns) - 1))
                                        {!! $builderAnkens[$nameKbn].'、'!!}
                    
                                    @else 
                                     {{ $builderAnkens[$nameKbn] }}
                                    @endif
                                @endforeach
                            @else
                                <span>&nbsp;</span>
                            @endif
                            <a href="{{ route('account.content.builder_confirm', ['id' => $item->id]) }}" 
                               target="_blank" class="td-btn-abs link-btn link-btn-trans">詳細確認</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                
                @endif
            </tbody>
        </table>
    </div>
    
    {!! $htmlPages !!}
    
</div>

@stop

@section('footer')

<script>
    (function($) {
        $('.req_form_status').change(function() {
            $(this).closest('form').submit();
        });
    })(jQuery);
</script>

@stop

