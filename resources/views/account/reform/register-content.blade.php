<?php
use App\Helpers\HelperFunc;
use App\Models\Reform;

$routeName = 'account.content.register_reform';
$htmlPages = view('includes.paginate', compact('collection'))->render();
?>

@extends('layouts.front')

@section('title', trans('page.register_content_reform'))

@section('breadcrumb')
<div class="nav-breadcrumb">
    @include('includes.breadcrumb')
</div>
@stop

@section('content')

<h2 class="page-title cl-family page-title-icon">
    <i class="lxl-reform"></i> @if(isset($reform)) {{ $reform }} @else {{ $builder }} @endif お申し込み内容
</h2>

<div class="box mgb-50">
    <div class="height-20"></div>
    
    {!! $htmlPages !!}
    
    <div class="table-responsive">
        <table class="table table-bordered table-register">
            <thead class="bg-high">
                <tr>
                    <th class="sorting nowrap-space">お申し込み日 {!! HelperFunc::linkOrder('regis_date', $routeName) !!}</th>
                    <th class="sorting nowrap-space">更新日時 {!! HelperFunc::linkOrder('upd_date', $routeName) !!}</th>
                    <th class="nowrap-space">希望時期</th>
                    <th>状況</th>
                    <th class="nowrap-space">リフォームお申し込み内容</th>
                </tr>
            </thead>
            <tbody>
                @if (!$collection->isEmpty())
                    @foreach ($collection as $item)
                        <tr>
                            <td width="150">{{ $item->regis_date ? $item->regis_date->format('Y年m月d日') : '' }}</td>
                            <td width="150">{{ $item->upd_date->format('Y年m月d日') }}</td>
                            <td width="150">{{ $item->getKiboDateLabel() }}</td>
                            <td width="150">{{ $item->getStatusLabel() }}</td>
                            <td class="td-relative text-left pdr-90">
                                {{ Reform::renderNameByReformBui($item->reform_bui, $categories) }}
                                <a href="{{ route('account.content.reform_confirm', ['id' => $item->reform_no]) }}" 
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

