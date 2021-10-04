@extends('theme.default')

@section('title', 'Cadastro de Url')

@section('custon-css')																	
@endsection

@section('content_header')
    @section('content_header_title')
		Url
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
  	    <li class="breadcrumb-item" ><a class="active" href=" {{ route('url.create') }} ">Novo</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('url.index') }} ">Consulta</a></li>
    @stop
@stop

@section('content')
	<form action="{{ route('url.store') }}" class="needs-validation" novalidate method="post" role="form" id="form" name="form" >

		{{ csrf_field() }}
		<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">Cadastro</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12 form-group {{ $errors->has('address') ? 'has-error' : '' }}">
									<label for="name">Endereço*</label>
									<input type="text" required id="address" name="address" 
										class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} uppercase"
										maxlength="100" required
										value="{{ $url->address ?? old('address') }}" autofocus>
									@if ( $errors->has('address') )
										<span class="text-danger">{{ $errors->first('address') }}</span>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	


		</br>

		<div class="form-group form-actions">
			<button type="submit" class="btn btn-primary btn-size">
				Cadastrar 
			</button>
			<a href=" {{ route('url.create') }}" class="btn btn-info btn-size">Novo</a>
		</div>
	</form>
  
@endsection 

@section('custom-js')
	<script src="{{ asset('js/pages/url/create_update.js') }}"></script>
@endsection
