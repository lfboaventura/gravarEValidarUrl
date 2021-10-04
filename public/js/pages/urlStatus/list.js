$(function() {

	// setInterval(function() {
	// 	applySpecificFilters();
	// }, 60000);

	let time = new Date().getTime();
	$(document.body).bind("mousemove keypress", function () {
		time = new Date().getTime();
	});
	
	setInterval(function() {
		if (new Date().getTime() - time >= 60000) {
			applySpecificFilters();
			time = new Date().getTime();
		}
	}, 1000);


	var tableElement = $('#table_id_cols');
	
	tableElement.DataTable({
		scrollx   : true,
		responsive: true,
		processing: true,
		serverSide: true,
		ajax : { 
			url: urlAllProcess,
			"data" :  function (d ) {
				d._token 	=  "{{csrf_token()}}"
			},
			error: function(data){
				$('#loading').css( 'display', 'none' );
				displayBootboxAlert((data.status + '-' + data.statusText), "Consulta clientes", '');
			},
		},
		"sServerMethod" : "GET",
        columns: [
			{data: 'url_id',    		name: 'url_id', searchable: false},
			{data: 'address',      		name: 'address'},
 			{data: 'id',          		name: 'id', searchable: false},
 			{data: 'status',      		name: 'status'},
 			{data: 'data',      		name: 'data'},
 			{data: 'created_at',      	name: 'created_at', searchable: false},
		],
    	"language": {
            "url": urlJsonDataTablesPortugueseBrasil
        },
        "aoColumnDefs" : [
	        { "sClass" : "dt-center", "aTargets" : [ 0,2,3] },
			{ "sWidth": "10%", "aTargets": [ 0,2,3 ] },
			{ "sWidth": "15%", "aTargets": [ 5 ] },
			{ "sWidth": "20%", "aTargets": [ 1 ] }, 
			{ "sWidth": "40%", "aTargets": [ 4 ] } 
		],
		"bAutoWidth" : false,
		"bPaginate" : true,
		"bFilter" : true,
		"bSort" : true,
		"bInfo" : true,
		"bJQueryUI" : false,
		"order": [[ 5, "desc" ]],
        "pageLength": 10,
        // dom: 'Bfrtip',
        // buttons: ['copy','csv','excel','pdf','print']
    });
	
	$('#table_id_cols').on( 'processing.dt', function ( e, settings, processing ) {
        $('#loading').css( 'display', processing ? 'block' : 'none' );
    }).dataTable();
});
