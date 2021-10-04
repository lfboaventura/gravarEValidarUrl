@extends('theme.default')

@section('title', 'Meu Perfil')

@section('content_header')
    @section('content_header_title')
		@yield('title')
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
  	    <li class="breadcrumb-item" ><a class="active" href=" {{ route('profile') }} ">Novo</a></li>
    @stop
@stop

@section('content')
    <form role="form" class="needs-validation" novalidate id="form" name="form" action="{{ route('profile') }}" method="POST">
        {{ csrf_field() }}
		<div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastro</div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Nome</label>
                                <input type="text" required maxlength="100" value="{{ auth()->user()->name }}" name="name" placeholder="Nome" class="form-control" autofocus>
                                @if ( $errors->has('name') )
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">E-mail</label>
                                <input type="email" required maxlength="100" value="{{ auth()->user()->email }}" name="email" placeholder="E-mail" class="form-control" disabled="disabled">
                                @if ( $errors->has('email') )
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Senha</label>
                                <input type="password" minlength="8" required name="password" placeholder="Senha" class="form-control">
                                @if ( $errors->has('password') )
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-6 form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label for="password_confirmation">Confirmar Senha</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                    placeholder="Confirmar senha" minlength="8" required
                                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                    value="{{ null ?? old('password_confirmation') }}">
                                @if ( $errors->has('password_confirmation') )
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
@endsection

@section('custom-js')																	
    <script src="{{ asset('js/pages/user/profile.js') }}"></script>
@endsection

