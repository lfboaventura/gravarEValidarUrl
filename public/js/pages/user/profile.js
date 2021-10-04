(function(){
	$("#form").validate({
		ignore: [],
		rules : {
			"name" : {
				maxlength : 100,
				required : true
			},
			"email" : {
				maxlength : 100,
				required : true,
				email : true
			},
			"password" : {
				maxlength : 100,
				minlength : 8,
				required : true
			},
			"password-confirm" : {
				maxlength : 100,
				minlength : 8,
				required : true
			},
		}
	});


	$("#form").on('submit', function (e) {
		$(this)[0].checkValidity() ? $('#saving').css( 'display', 'block' ) : null;
		$("input[type!=hidden]").each(function () {
			$(this).val($.trim($(this).val()));
		});
	});
	$("#name").focus();


	
})();

