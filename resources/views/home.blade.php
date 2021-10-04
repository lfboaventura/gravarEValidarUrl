@extends('theme.default')

@section('title', 'Home')

@section('content_header')
    @section('content_header_title')
        Home
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item" ><a class="active" href=" {{ route('home') }} ">Home</a></li>
    @stop
@stop

@section('datatables-css')
<style>
</style>
@endsection


@section('content')
    <div class="home-logo" >
        <img  class="home-logo-img">
    </div>
    
@endsection

@section('custom-js')
@endsection
