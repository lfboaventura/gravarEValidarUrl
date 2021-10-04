@extends('theme.default')

@section('title', 'Error 500')

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
        		<h4>Ocorreu um erro inesperado!</h4>
                <br/><br/>
        		<h5>Por favor atualize e tente novamente.</h5>
                <br/><br/>
        		<h5>Caso erro persista, acione o suporte técnico relatando processo até apresentar o erro.</h5>
            </div>
        </div>
    </div>
@stop
