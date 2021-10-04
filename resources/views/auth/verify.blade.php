@extends('theme.login_register')

@section('title', 'Verifique seu e-mail')

@section('custon-css')
	<link href="{{ asset('css/pages/user/login.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('form_login_register')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
        </div>
    @endif


    {{ __('Antes de prosseguir, verifique na caixa de entrada de seu e-mail, link enviado para verificação.') }}</br>
    {{ __('Caso não tenha recebido, ') }}
    <form class="d-inline" method="POST" id="form" name="form" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para solicitar outra') }}</button>.
    </form>
    <hr>
    <div class="text-center">
        <div class="row">
            <div class="col-sm-5">
                <ul class="list-inline">
                    <li><a class="text-muted" href="{{ route('logout') }}" >Login</a></li>
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
    <script src="{{ asset('js/pages/user/login.js') }}"></script>
@endsection
