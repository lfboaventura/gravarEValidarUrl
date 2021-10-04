(function(){
	$("#form").validate({
		ignore: [],
		rules : {
			"address" : {
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
	$("#address").focus();	
})();