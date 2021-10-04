(function($) {
	setTimeout(function() { location.reload(); }, 600000);
	$(document).ready(function() {
		$('.list-inline li > a').click(function() {
		var activeForm = $(this).attr('href') + ' > form';
		//console.log(activeForm);
		$(activeForm).addClass('animated fadeIn');
		//set timer to 1 seconds, after that, unload the animate animation
		setTimeout(function() {
			$(activeForm).removeClass('animated fadeIn');
		}, 1000);
		tabFormFocus($(this).attr('href'));
		});
	});
})(jQuery);

function tabFormFocus(tabForm) {
	if ( tabForm == '#forgot'){
		$("emailForgot").focus();
	} else {
		$("#email").focus();
	}
}

(function(){
	$("#form").validate({
		ignore: [],
		rules : {
			"email" : {
				maxlength : 100,
				required : true,
				email : true
			},
			"password" : {
				maxlength : 50,
				required : true
			}
		}
	});
	$("#formForgot").validate({
		ignore: [],
		rules : {
			"emailForgot" : {
				maxlength : 50,
				required : true,
				email : true
			},
		}
	});

	$("#form").on('submit', function (e) {
		$(this)[0].checkValidity() ? $('#sendingData').css( 'display', 'block' ) : null;
		$("input[type!=hidden]").each(function () {
			$(this).val($.trim($(this).val()));
		});
	});


	tabFormFocus(null);
	
})();

