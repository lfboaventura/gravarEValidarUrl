@extends('theme.default')

@section('title', 'Sessão expirada')

@section('content_header')
    @section('content_header_title')
        @yield('title')
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
    @stop
@stop

@section('content')
    <div class="box" >
    	<div class="box-header">
    	</div>
    	<div class="box-body">
            <div class="text-center" >
                <br/><br/>
        		<h4>A página expirou devido a inatividade!</h4>
                <br/><br/>
        		<h5>Por favor atualize e tente novamente</h5>
            </div>
        </div>
    </div>
@stop
