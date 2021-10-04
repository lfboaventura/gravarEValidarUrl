<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport"     content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"  content="">
    <meta name="author"       content="Lúcio Flávio Boaventura">
    <meta name="generator"    content="Bootstrap">
    <link rel="icon" type="image/png" href="https://blog.credpago.com.br/wp-content/uploads/2020/12/favicon.ico">
    <title>@yield('title') - CredPago</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- jQuery --}}
    <script src="{!! asset('js/jquery-1.12.4.min.js') !!}"></script>

    {{-- Bootstrap Core JavaScript --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    {{-- Bootstrap core CSS --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Custom styles for this template --}}
    @yield('datatables-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('custon-css')

    <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
	  <link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    
    <style type="text/css">
      .modal-loader {
        background-color: rgba(0, 0, 0, 0.7);
        opacity: 0.85;
      }
    </style>
  </head>
  <body class="body-background">
    <div class="jquery-waiting-base-container" id="jquery-waiting-base-container">Aguarde, carregando...</div>
    @include('theme.header')
    <div class="container-fluid">
      <div class="row">
        @auth
        @include('theme.sidebar-left')
        @endauth
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex- justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom-">
              {{-- start: page --}}
              <div class="container">
                {{--
                @include('includes.alerts')
                --}}
                @yield('content')
                @include('includes.modals')
              </div>
          
              {{-- end: page --}}

              
            
          </div>
        </main>
      </div>
    </div>

    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.slim.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    @yield('datatables-js')

    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validate/messages_pt_BR.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('custom-js')
    {!! Toastr::render() !!}
    <script src="{{ asset('js/eventListenerSubmit.js') }}"></script>

    
</html>
