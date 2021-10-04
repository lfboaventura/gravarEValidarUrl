<div id=msgInclude>
	@if ( !empty(Auth::user()) )
		@if ($errors->any())
		<div id="msgHasError" class="row alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
		@endif
	@endif

	@if (session('success'))
		<div id="msgSuccess" class="row alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p>{{ session('success') }}</p>
		</div>
	@endif

	@if (session('error'))
		<div id="msgError" class="row alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p>{{ session('error') }}</p>
		</div>
	@endif

	@if (session('warning'))
		<div id="msgWarning" class="bb-alert alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p>{{ session('warning') }}</p>
		</div>
	@endif

	@if (session('info'))
		<div id="msgInfo" class="row alert alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p>{{ session('info') }}</p>
		</div>
	@endif
</div>
