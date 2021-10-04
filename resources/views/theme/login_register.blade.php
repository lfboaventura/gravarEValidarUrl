<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Lúcio Flávio Boaventura">
	<meta name="description" content="">
	
    {{-- Mobile Metas --}}
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <title>@yield('title') - CredPago</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" type="image/png" href="https://blog.credpago.com.br/wp-content/uploads/2020/12/favicon.ico">

    {{-- jQuery --}}
    <script src="{!! asset('js/jquery-1.12.4.min.js') !!}"></script>

    {{-- Bootstrap Core JavaScript --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="{!! asset('css/animate.min.css') !!}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
	<link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
	
	<!-- Custom CSS -->
	@yield('custon-css')
	<style type="text/css">
		.modal-loader {
			background-color: rgba(0, 0, 0, 0.7);
			opacity: 0.85;
		}

    </style>

</head>

<body class="login">	
	<div class="form-signin">
		<div class="text-center">
            <a href="#" target="_blank"> 
				<div class="logo-img">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 216.8 76">
						<path d="M178.8 0c-14.8 0-27.7 8.5-34 20.9 4 2.2 6.2 6.3 6.2 11.7v14.9c0 1.7-1 3.2-2.6 3.9l-.2.1h-.2c-1.4.4-2.9.8-4.5 1C149.4 66.3 163 76 178.8 76c21 0 38-17 38-38s-17-38-38-38z" fill="#20c3f3"></path>
						<path d="M23 45l-2.1-3.4c-.1-.3-.3-.4-.5-.5-.2 0-.4 0-.7.2-2 1.6-4.4 2.4-7 2.4-4.3 0-6.7-2.5-6.7-7v-11c0-4.3 2.5-6.9 6.7-6.9 2.4 0 4.7.8 6.6 2.2.3.2.5.2.7.2.2-.1.4-.2.5-.4l2.1-3.4c.3-.5.2-.9-.2-1.3-2.8-2.1-6.3-3.4-9.7-3.4C6.9 12.7 0 16 0 25.5v11.3c0 9.5 6.7 13 12.7 13 4 0 7.4-1.1 10.2-3.5.3-.2.5-.6.1-1.3zM83.4 44.5c1.5 0 3.1-.2 4.3-.5.4-.1.6-.4.6-.8V29.9c0-.4-.2-.8-.6-1-1.2-.6-2.7-1-4.4-1-3.7 0-5.9 1.7-5.9 5.7v4.8c0 4.5 2.2 6.1 6 6.1M88.3 14c0-.4.3-.6.8-.6h4.4c.4 0 .8.1.8.7v33.3s0 .2-.1.3c-.1.1-.3.2-.5.3-3.1 1.2-7.1 1.9-10.4 1.9-6.9 0-11.8-3.6-11.8-11.5v-4.8c0-6.8 4.7-11.1 11.2-11.1 2.1 0 4.1.5 5.6 1.2V14zM110.7 13.4H99.9c-.3 0-.7.1-.7.6v34.9c0 .2.1.3.3.3h5.3c.2 0 .4-.2.4-.4v-9.2c0-.3.2-.5.5-.5h4.6c4.1 0 7.2-1.2 9.3-3.4 2.1-2.1 3.7-5 3.7-9.7 0-3.6-.9-6.4-2.3-8.3-1.9-2.9-4.5-4.3-10.3-4.3zm.3 19.9h-5.3c-.3 0-.5-.2-.5-.5v-13c0-.3.2-.5.5-.5h5.5c1.9 0 3.4.5 4.3 1.5.9 1 1.6 2.3 1.6 4.5 0 2.5-.4 4.2-1.5 5.6-.8 1.1-2.6 2.4-4.6 2.4zM41.2 28.9c-.3.3-.7.3-1 0-.8-.7-2.2-1.1-3.6-1.1-2 0-4.2 1.5-4.2 4.8v15.7c0 .4-.3.8-.8.8h-4.4c-.4 0-.8-.3-.8-.8V23.5c0-.4.3-.8.8-.8h4.3c.4 0 .8.3.8.8v1.7c1.3-1.5 3.8-2.8 6.6-2.8 2.2 0 3.8.6 5.4 2 .4.3.4.9.1 1.3l-3.2 3.2zM147.7 47.5V32.7c0-6.6-4-10.2-10.9-10.2-4 0-7.5.9-10.2 2.7-.2.1-.2.3 0 .7l2.1 3.4c.1.2.2.3.4.3s.3 0 .5-.1c1.8-1 4.3-1.6 6.7-1.6 3.8 0 5.3 1.5 5.3 5.2v.7h-.1c-2.1-.3-3.8-.4-5.2-.4-7.2 0-10.9 2.9-10.9 8.1 0 7.6 7.6 8.4 11.1 8.4 3.4 0 7.4-.6 10.6-1.5.5-.2.6-.5.6-.9zm-5.9-3.9c0 .2-.1.4-.3.4-.6.1-2.7.6-4.8.6-3.6 0-5.2-.9-5.2-3.2 0-2.3 1.5-3.5 5.1-3.5 1.3 0 3.1.1 4.8.4.2 0 .3.2.3.4v4.9zM67.8 34.3c0-3.9-.9-7-2.8-8.9-1.9-1.9-4.6-2.9-8.2-2.9-3.9 0-6.9 1.2-8.7 3.5-1.9 2.4-2.8 6.1-2.8 10.9 0 4.6.9 7.9 2.7 9.9 1.8 2 4.7 3.1 8.7 3.1 2.9 0 6.2-.4 9.9-1.3.3-.1.4-.3.4-.6l-.1-3.5c0-.1-.1-.2-.1-.3-.2-.2-.3-.2-.4-.2-1.4.1-3.2.3-4.3.3-.7 0-1.4.1-2 .1-.8.1-1.7.1-2.3.1-1.5 0-2.7-.1-3.5-.4-.9-.3-1.5-.8-1.9-1.5-.4-.7-.5-1.8-.5-2.6s.1-1.1.5-1.1h14.3c.5 0 1-.4 1-.9l.1-3.7zm-6.7-.4c-.1.1-.2.1-.4.1h-8.3c-.1 0-.3-.1-.4-.2-.1-.1-.2-.3-.2-.4.1-1.9.5-3.4 1.1-4.2.7-.9 2-1.4 3.7-1.4 1.7 0 2.9.4 3.6 1.3.6.8 1 2.3 1 4.3.1.2 0 .3-.1.5z" fill="#113e64"></path><path d="M205.7 33.6c0-3.5-1.3-6.6-3.7-8.5-.4-.3-.9-.6-1.3-.9-.3-.2-.6-.3-1-.5-.3-.2-.7-.3-1.1-.4-1.4-.5-3.1-.8-4.9-.8H168c-6.6 0-12 3.3-12 11.4v4.7c0 7.4 5.1 10.8 11.3 10.8 1.9 0 4.1-.4 5.8-1.1.2 5.3-2.1 7.2-6 7.2-2.7 0-4.8-.7-6.8-2.2-.4-.3-.8-.2-1 .2l-2.1 3.2c-.3.5-.3.8.1 1 2.8 2.1 5.9 3.2 10.2 3.2 7.4 0 11.3-4.6 11.3-12.3V28.2h15.6c2.9 0 5.3 2.4 5.3 5.3V40c0 2.1-1.2 4.1-3.1 5-3.8 1.7-7.9-1.3-8-5v-7.7c0-.3-.5-.4-.8-.3-1.4.7-4 2.1-4.9 2.5-.2.1-.2.2-.2.4v5.5c0 5 3.6 9.1 8.7 10.2.9.2 2.1.3 3.1.3 5.8-.1 10.6-4.2 11.1-9.5 0-.3.1-.7.1-1v-6.8zm-32.8 9.3c-1 .8-3.2 1.3-5.2 1.3-3.2 0-5.7-1.3-5.7-5.4v-5.2c0-4.5 2.5-5.7 6.1-5.7 1.6 0 3.8.2 4.9.6v14.4z" fill="#fff"></path>
					</svg>
				</div>
            </a>
		</div>
		<hr>
		<div class="tab-content">
			<div id="login" class="tab-pane active">
				<div class="box">
					<div class="box-header">
						<div class="box-body">
							@yield('form_login_register')
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
	@include('includes.modals')


    <!-- Bootstrap Core JavaScript -->
    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.slim.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validate/messages_pt_BR.min.js') }}"></script>
	@yield('custom-js')
	{!! Toastr::render() !!}
    <script src="{{ asset('js/eventListenerSubmit.js') }}"></script>
</body>
</html>