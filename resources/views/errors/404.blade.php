@extends('layouts.simple')

@section('title', trans('page.error_404'))

@section('content')

<div class="alert-panel alert-panel-danger text-center">
    <h2 class="alert-header mgl-35">{{ trans('page.error_404') }}</h2>
    <p>
        
        
    </p>
    
    
</div>

<div class="thanks-footer mgt-10">
        <div class="container">
            <div class="footer-btn col-xs-4 col-xs-offset-4">
                <div class="form-group mgt-100 ">
                    <a href="{{ route('page.index') }}"><button type="button" class="btn-block action-btn action-btn-md ac-btn-background" >{{ trans('page.back_to_home') }}</button></a>
                    
                </div>
            </div>
        </div>
    </div>

@stop
