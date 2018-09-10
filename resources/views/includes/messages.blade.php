@if (Session::has('error_message') && ($message = Session::get('error_message'))) 
    <div class="alert-panel alert-panel-danger">{!! $message !!}</div>
@elseif (Session::has('success_message') && ($message = Session::get('success_message'))) 
    <div class="alert-panel alert-panel-success">{!! $message !!}</div>
@else 
    <!--nothing-->
@endif
