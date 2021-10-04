@extends('theme.login_register')

@section('title', 'Redefinir Senha')

@section('custon-css')
	<link href="{{ asset('css/pages/user/login.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('form_login_register')
	<form class="form-horizontal needs-validation" novalidate role="form" data-toggle="validator" id="form" name="form" method="POST" action="{{ route('password.email') }}">
		{{ csrf_field() }}
		<p class="text-muted text-center">Redefinir Senha</p>

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

		<button class="btn btn-lg btn-primary btn-block" type="submit">Enviar link</button>

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
@endsection

@section('custom-js')
	<script src="{{ asset('js/custom.js') }}"></script>
	<script src="{{ asset('js/pages/user/login.js') }}"></script>
@endsection
