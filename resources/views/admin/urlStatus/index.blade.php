@extends('theme.default')

@section('title', 'Consulta Status Url')

@section('datatables-css')																	
	@include('includes.datatables-css')
@endsection

@section('content_header')
    @section('content_header_title')
        @yield('title')
    @stop
    @section('content_header_li_breadcrumb')
        <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
        <li class="breadcrumb-item"><a class="active" href=" {{ route('urlStatus.index') }} ">Consulta</a></li>
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
                                        <th data-class="expand">Url_id</th>
                                        <th data-class="expand">Endereço</th>
                                        <th data-class="expand">ID</th>
                                        <th data-class="expand">Status</th>
                                        <th data-class="expand">Dados</th>
                                        <th data-class="expand">Data</th>
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
@stop

@section('datatables-js')																	
    <script type="text/javascript">
		var urlAllProcess = "{{ route('urlStatus.all')}}";
	</script>
	@include('includes.datatables-js')
	@include('includes.datatables-pdf-js')
    <script src="{{ asset('js/pages/urlStatus/list.js') }}"></script>
@endsection

