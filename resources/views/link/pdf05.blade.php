@extends('layouts.auth')

@section('title')

@endsection

@section('body_class', 'no-border-header')

@section('head')
<link type="text/css" href="{{ asset('policys/html/pdftohtml_2/builder.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mgb-30" id="content-html">

</div>
@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $("#content-html").load("{{ asset('policys/html/pdftohtml_2/builder.html') }}");
    });
</script>
@endsection
