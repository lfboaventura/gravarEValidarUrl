@extends('theme.login_register')

@section('title', 'Cadastre-se')

@section('custon-css')
	<link href="{{ asset('css/pages/user/register.css') }}" rel="stylesheet" type="text/css">
	<style type="text/css">
		.logo-img{
            background-position: center;
            width: 40%;
		}
    </style>
@endsection

@section('form_login_register')
	<form action="{{ route('register') }}" class="needs-validation" novalidate method="post" role="form" id="form" name="form" >
        <input type="hidden" id="id" name="id" value="" />
        @csrf

        <div class="row">
            <div class="col-sm-6  form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nome</label>
                <input type="text" required="required" id="name" name="name"  maxlength="100"
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} uppercase"
                    value="{{ $user->name ?? old('name') }}" autofocus>
                @if ( $errors->has('name') )
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="col-sm-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-mail</label> 
                <input type="email" id="email" name="email" 
                    required maxlength="100"
                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} lowercase"
                    value="{{ $user->email ?? old('email') }}" >
                @if ( $errors->has('email') )
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Senha</label> 
                <input type="password" id="password" name="password" required minlength="8" maxlength="100"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    value="{{ null ?? old('password') }}">
                @if ( $errors->has('password') )
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="col-sm-6 form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                    maxlength="100" minlength="8" required
                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                    value="{{ null ?? old('password_confirmation') }}">
                @if ( $errors->has('password_confirmation') )
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group form-actions">
            <button type="submit" class="btn btn-primary btn-size">
                Cadastrar 
            </button>
        </div>
    </form>
    <hr>
    <div class="text-center">
        <div class="row">
            <div class="col-sm-5">
                <ul class="list-inline">
                    <li><a class="text-muted" href="{{ route('login') }}" >Login</a></li>
                </ul>
            </div>
            <div class="col-sm-7">
                <ul class="list-inline">
                    <li><a class="text-muted" href="{{ route('password.request') }}" >Esqueci minha senha</a></li>
                </ul>
            </div>
        </div>
    </div>
@stop

@section('custom-js')
    <script src="{{ asset('js/pages/user/profile.js') }}"></script>
@endsection

