@extends('theme.default')

@section('title', 'Consulta Url')

@section('datatables-css')																	
	@include('includes.datatables-css')
@endsection

@section('content_header')
    @section('content_header_title')
        @yield('title')
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
        <li class="breadcrumb-item"><a class="active" href=" {{ route('url.index') }} ">Consulta</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('url.create') }} ">Novo</a></li>
    @stop
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="-card-header"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="table_id_cols" class="display nowrap table table-striped table-bordered table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Opções</th>
                                        <th data-class="expand">ID</th>
                                        <th data-class="expand">Endereço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </br>
    <div class="form-actions" style="margin-top: 0px">
        <a href=" {{ route('url.create') }} " class="btn btn-info btn-sm btn-size">Novo</a>
    </div>
@stop

@section('datatables-js')																	
    <script type="text/javascript">
		var urlAllProcess = "{{ route('url.all')}}";
	</script>
	@include('includes.datatables-js')
	@include('includes.datatables-pdf-js')
    <script src="{{ asset('js/pages/url/list.js') }}"></script>
@endsection

