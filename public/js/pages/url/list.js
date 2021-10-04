$(function() {
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
 			{data: 'action',      		name: 'action', orderable: false, searchable: false},
 			{data: 'id',          		name: 'id'},
 			{data: 'address',      		name: 'address'},
		],
    	"language": {
            "url": urlJsonDataTablesPortugueseBrasil
        },
        "aoColumnDefs" : [
	        { "sClass" : "dt-center", "aTargets" : [ 0,1] },
			{ "sWidth": "10%", "aTargets": [ 0 ] },
			{ "sWidth": "10%", "aTargets": [ 1 ] }, 
			{ "sWidth": "80%", "aTargets": [ 2 ] } 
		],
		"bAutoWidth" : false,
		"bPaginate" : true,
		"bFilter" : true,
		"bSort" : true,
		"bInfo" : true,
		"bJQueryUI" : false,
		"order": [[ 2, "asc" ]],
        "pageLength": 10,
        // dom: 'Bfrtip',
        // buttons: ['copy','csv','excel','pdf','print']
    });
	
	$('#table_id_cols').on( 'processing.dt', function ( e, settings, processing ) {
        $('#loading').css( 'display', processing ? 'block' : 'none' );
    }).dataTable();
});
