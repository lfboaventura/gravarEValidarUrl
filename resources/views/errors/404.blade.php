@extends('theme.default')

@section('title', 'Página não encontrada')

@section('content_header')
    @section('content_header_title')
        @yield('title')
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
    @stop
@stop

@section('content')
	<div class="text-center" >
		<img width="70%" heigth="70%" src="{{ asset('image/404.png') }}">
	</div>
@stop
