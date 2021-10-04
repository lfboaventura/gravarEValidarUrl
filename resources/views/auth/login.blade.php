@extends('theme.login_register')

@section('title', 'Login')
@section('custon-css')
	<link href="{{ asset('css/pages/user/login.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('form_login_register')
	<form class="form-horizontal needs-validation" novalidate role="form" data-toggle="validator" id="form" name="form" method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}
		<p class="text-muted text-center">Entre com seu e-mail e senha</p>

		<div>
			<input type="email" id="email" name="email" 
				class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} lowercase top "
				value="{{ $user->email ?? old('email') }}" placeholder="E-mail" required>
			@if ($errors->has('email'))
				<span class="text-danger texte-center">
					{{ $errors->first('email') }}
				</span>
			@endif
		</div>

		<div>
			<input type="password" id="password" name="password" 
				class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} bottom "
				value="{{ null ?? old('password') }}" placeholder="Password" required>
			@if ($errors->has('password'))
				<span class="text-danger">
					{{ $errors->first('password') }}
				</span>
			@endif
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

	</form>
	<hr>
	<div class="text-center">
		<div class="row">
			<div class="col-sm-5">
				<ul class="list-inline">
					<li><a class="text-muted" href="{{ route('register') }}" >Cadastre-se</a></li>
				</ul>
			</div>
			<div class="col-sm-7">
				<ul class="list-inline">
					<li><a class="text-muted" href="{{ route('password.request') }}" >Esqueci minha senha</a></li>
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('js/pages/user/login.js') }}"></script>
@endsection
