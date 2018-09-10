@extends('layouts.simple')

@section('title', trans('page.error_occurred'))

@section('content')

<div class="alert-panel alert-panel-danger text-center">
    <h2 class="alert-header">{{ trans('page.error_occurred') }}</h2>
    <p>
        <a href="{{ route('page.index') }}"><i class="arrow_back"></i> {{ trans('page.back_to_home') }}</a>
    </p>
</div>

@stop
