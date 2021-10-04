@extends('theme.login_register')

@section('title', 'Ressetar senha')

@section('custon-css')
	<link href="{{ asset('css/pages/user/login.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('form_login_register')
    <form class="form-horizontal needs-validation" novalidate role="form" data-toggle="validator" id="form" name="form" action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
		<p class="text-muted text-center">Redefinir senha</p>

		<div>
			<input type="email" id="email" name="email" 
				class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} lowercase top "
				value="{{ $user->email ?? old('email') }}" placeholder="E-mail">
			@if ($errors->has('email'))
				<span class="text-danger texte-center">
					{{ $errors->first('email') }}
				</span>
			@endif
		</div>

		<div>
			<input type="password" id="password" name="password" 
				class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} bottom "
				value="{{ null ?? old('password') }}" placeholder="Password">
			@if ($errors->has('password'))
				<span class="text-danger">
					{{ $errors->first('password') }}
				</span>
			@endif
		</div>

		<div>
			<input type="password" id="password_confirmation" name="password_confirmation" 
				class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }} bottom "
				value="{{ null ?? old('password_confirmation') }}" placeholder="Confirmar senha">
			@if ($errors->has('password_confirmation'))
				<span class="text-danger">
					{{ $errors->first('password_confirmation') }}
				</span>
			@endif
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Redefir</button>
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
	<script src="{{ asset('js/pages/user/user.js') }}"></script>
@endsection
