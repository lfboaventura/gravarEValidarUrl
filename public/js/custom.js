(function () {
    'use strict'        
    feather.replace()

		 /*
	* Translated default messages for the jQuery validation plugin.
	* Locale: PT_BR
	*/
	jQuery.extend(jQuery.validator.messages, {
	    required: "Este campo &eacute; obrigatório.",
	    remote: "Por favor, corrija este campo.",
	    email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
	    url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
	    date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
	    dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
	    number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
	    digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
	    creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
	    equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
	    accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
	    maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
	    minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
	    rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
	    range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
	    max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
	    min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
	});	

	jQuery.validator.setDefaults({ 
		/*
		onfocusout: function (e) { 
			this.element(e); 
		},*/ 
		onkeyup: false, 
		highlight: function (element) { 
			jQuery(element).closest('.form-control').addClass('is-invalid'); 
		}, 
		unhighlight: function (element) { 
			jQuery(element).closest('.form-control').removeClass('is-invalid'); 
			jQuery(element).closest('.form-control').addClass('is-valid'); 
		}, 
		errorElement: 'div', 
		errorClass: 'invalid-feedback', 
		errorPlacement: function (error, element) { 
			if (element.parent('.input-group-prepend').length) { 
				$(element).siblings(".invalid-feedback").append(error); 
				//error.insertAfter(element.parent()); 
			} else { 
				error.insertAfter(element); 
			} 
		},
	});

	/*
	$.validator.setDefaults({
		errorPlacement: function (error, element) {
			if ($(element).parent().hasClass("input-group")) {
				$(element).parent().parent().removeClass('has-error has-success has-feedback');
				$(element).parent().parent().addClass('has-error has-feedback');
				
				$(element).parent().parent().find('span[class="help-block invalid-feedback"]').remove()
				$(element).parent().parent().append('<span class="help-block invalid-feedback">' + $(error).text() + '</span>');
			} else {
				$(element).parent().removeClass('has-error has-success has-feedback');
				$(element).parent().addClass('has-error has-feedback');
				
				$(element).parent().find('span').remove();
				$(element).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
				$(element).parent().append('<span class="help-block invalid-feedback">' + $(error).text() + '</span>');
			}
			return true;
		},
		success: function (label, element) {
			if ($(element).parent().hasClass("input-group")) {
				$(element).parent().parent().removeClass('has-error has-success has-feedback');
				$(element).parent().parent().addClass('has-success has-feedback');
				
				$(element).parent().parent().find('span[class="help-block invalid-feedback"]').remove()
			} else {
				$(element).parent().removeClass('has-error has-success has-feedback');
				$(element).parent().addClass('has-success has-feedback');
				
				$(element).parent().find('span').remove();
				$(element).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
			}
			return true;
		}
	});
	*/
	jQuery.validator.methods["date"] = function (value, element) { return true; }

	$("#msgSuccess").delay(200).fadeIn().delay(4000).fadeOut();
	$("#msgInfo").delay(200).fadeIn().delay(4000).fadeOut();
	$("#msgWarning").delay(200).fadeIn().delay(4000).fadeOut();
	$("#msgError").delay(200).fadeIn().delay(4000).fadeOut();
	$("#msgHasError").delay(200).fadeIn().delay(4000).fadeOut();

	$("#btn-filter").tooltip();

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


}());		

document.addEventListener('DOMContentLoaded', () => {
	if ( !$('#toast-container').length ){
		$('#msgInclude').css('display', 'block');
	}
})

$(function() {
	$(document).ready(function(){
		$("#jquery-waiting-base-container").waiting({modo:"slow"});
	});	

});
(function($) {
	$.fn.waiting = function(options) {
	options = $.extend({modo: 'normal'}, options);
	this.fadeOut(options.modo);
	return this;
	};
})(jQuery);


$(function() {
    //Loads the correct sidebar on window load,
    //collapses the sidebar on window resize.
    // Sets the min-height of #page-wrapper to window size
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

	var url = window.location;
	// var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
	// }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
		if ( this.href == url ){
//			var elem = this.closest('li > a').closest('ul > li').closest('li > ul').closest('ul > li');
			this.parentElement.parentElement.parentElement.classList.add('nav-expanded');
			this.parentElement.parentElement.parentElement.classList.add('nav-active');
			this.parentElement.classList.add('nav-active');
		}
        return this.href == url;
    }).addClass('active').parent();
    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }

});

function destroy(label = null, name = null, url = null) {
	_message = "<p class='text-primary'>Confirma exclusão do(a) " + label + " ?</p>";
	if ( name != null ){
		_message  = "<p class='text-primary'>Confirma exclusão do(a) " + label + ": " + name + " ?</p>";
	}
	_url = url;
	if ( url == null ){
		_url = urlDestroy;
	}
	debugger;
	bootbox.dialog({
		message : _message,
		title : "Excluir " + label,
		buttons : {
			success : {
				type : 'DELETE',
				label : "Excluir",
				className : "btn-danger",
				callback : function() {
					window.location.href = _url;
				}
			},
			main : {
				label : "Cancelar",
				className : "btn-default"
			}
		}
	});
}

function reverseDestroy(label, name, url) {
	_message = "<p class='text-primary'>Confirma reversão exclusão do(a) " + label + " ?</p>";
	if ( name != null ){
		_message  = "<p class='text-primary'>Confirma reversão exclusão do(a) " + label + ": " + name + " ?</p>";
	}
	_url = url;
	if ( url == null ){
		_url = urlDestroy;
	}
	bootbox.dialog({
		message : _message,
		title : "Reversão de exclusão " + label,
		buttons : {
			success : {
				type : 'GET',
				label : "Reverter",
				className : "btn-primary",
				callback : function() {
					window.location.href = _url;
				}
			},
			main : {
				label : "Cancelar",
				className : "btn-default"
			}
		}
	});
}


function displayBootboxAlert2(titleDialog, notice, _type = null){
	var _message 	= "<p class='text-primary'><i class='glyphicon glyphicon-exclamation-sign fa-30px'></i> " +  notice + "</p>";
	if ( _type != null ){
		_message 	= "<p class='text-danger'><i class='glyphicon glyphicon-exclamation-sign fa-30px'></i> " +  notice + "</p>";
	}
	bootbox.alert({
		title 		: titleDialog,
		message		: _message,
		className	: 'bb-alternate-modal',
		closeButton	: false,
	});
};


function displayBootboxAlert(errors, descriptionDialog, notice = ''){
	if ( errors.substr(0,3) == 401 ){
		errors = errors.substr(0,3) + '-' + 'Login expirado, refaça o login e tente novamente!';
		location.reload();
	}
	var _message 	= '';
	
	if ( errors != '' ) {
		_message 	= "<p class='text-danger'><i class='glyphicon glyphicon-exclamation-sign '></i>  Erro: " + errors + "</p>"
	}
	
	var _message2 	= "<p class='text-danger'><i class='glyphicon glyphicon-exclamation-sign '></i>  Ocorreu um erro " + descriptionDialog.toLowerCase() + " !</p>" + _message;
	
	if ( notice != '' ) {
		_message2 	= "<p class='text-primary'><i class='glyphicon glyphicon-exclamation-sign'></i> " +  notice  + "</p>";
	} 
	bootbox.alert({
		title 		: descriptionDialog,
		message		: _message2,
		className	: 'bb-alternate-modal',
		closeButton	: false,					
	});
};

$(".modal-wide").on("show.bs.modal", function() {
	var height = $(window).height() - 200;
	$(this).find(".modal-body").css("max-height", height);
});


function clearToasts(){
	toastr.clear();
}

function showToast(_typeToast = 'success', _msg = 'success', _title = null, _timeOut = 5000){
	var shortCutFunction = _typeToast;
	var msg = _msg;
	var title = _title;

	if ( msg.substr(0,3) == '401' ){
		msg = msg.substr(0,3) + '-' + 'Login expirado, refaça o login e tente novamente!';
		location.reload();
	}

	toastr.options = {
		closeButton: true,
		debug: false,
		newestOnTop: false,
		progressBar: true,
		positionClass: 'toast-top-right',
		preventDuplicates: false,
		onclick: null,
		showDuration: 300,
		hideDuration: 1000,
		timeOut: _timeOut,
		extendedTimeOut: 1000,
		showEasing: 'swing',
		hideEasing: 'linear',
		showMethod: 'fadeIn',
		hideMethod: 'fadeOut',


	};
	var $toast = toastr[shortCutFunction](msg, title);
	$toastlast = $toast;

	if(typeof $toast === 'undefined'){
		return;
	}
}


function applySpecificFilters(){
	rowDataTable = -1;
	applyFilters();
}

function showModalFilter() {
	$("#modal-filter").modal("show");
}

function applyFilters(){
	$('#loading').css( 'display', 'block' );
	if (document.getElementById("table_id")) {
		$('#table_id').DataTable().ajax.reload();
	} else if (document.getElementById("table_id_cols")) {
		$('#table_id_cols').DataTable().ajax.reload();
	} 
	$('#loading').css( 'display', 'none' );
}

















// function validCPF(cpf) {
// 	cpf = cpf.replace(/[^\d]+/g, '');

// 	if (cpf == '') {
// 		return true;
// 	}

// 	if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111"
// 		|| cpf == "22222222222" || cpf == "33333333333"
// 		|| cpf == "44444444444" || cpf == "55555555555"
// 		|| cpf == "66666666666" || cpf == "77777777777"
// 		|| cpf == "88888888888" || cpf == "99999999999") {
// 		return false;
// 	}

// 	// Valida 1o digito
// 	add = 0;
// 	var i = 0;
// 	for (i = 0; i < 9; i++) {
// 		add += parseInt(cpf.charAt(i)) * (10 - i);
// 	}
// 	rev = 11 - (add % 11);
// 	if (rev == 10 || rev == 11) {
// 		rev = 0;
// 	}
// 	if (rev != parseInt(cpf.charAt(9))) {
// 		return false;
// 	}

// 	// Valida 2o digito
// 	add = 0;
// 	for (i = 0; i < 10; i++) {
// 		add += parseInt(cpf.charAt(i)) * (11 - i);
// 	}
// 	rev = 11 - (add % 11);
// 	if (rev == 10 || rev == 11) {
// 		rev = 0;
// 	}
// 	if (rev != parseInt(cpf.charAt(10))) {
// 		return false;
// 	}

// 	return true;
// }

// function validCNPJ(cnpj) {
// 	cnpj = cnpj.replace(/[^\d]+/g, '');

// 	if (cnpj == '') {
// 		return true;
// 	}

// 	if (cnpj.length != 14) {
// 		return false;
// 	}

// 	// Elimina CNPJs invalidos conhecidos
// 	if (cnpj == "00000000000000" || cnpj == "11111111111111"
// 		|| cnpj == "22222222222222" || cnpj == "33333333333333"
// 		|| cnpj == "44444444444444" || cnpj == "55555555555555"
// 		|| cnpj == "66666666666666" || cnpj == "77777777777777"
// 		|| cnpj == "88888888888888" || cnpj == "99999999999999")
// 		return false;

// 	// Valida DVs
// 	tamanho = cnpj.length - 2;
// 	numeros = cnpj.substring(0, tamanho);
// 	digitos = cnpj.substring(tamanho);
// 	soma = 0;
// 	pos = tamanho - 7;
// 	var i = 0;
// 	for (i = tamanho; i >= 1; i--) {
// 		soma += numeros.charAt(tamanho - i) * pos--;
// 		if (pos < 2)
// 			pos = 9;
// 	}
// 	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
// 	if (resultado != digitos.charAt(0)) {
// 		return false;
// 	}

// 	tamanho = tamanho + 1;
// 	numeros = cnpj.substring(0, tamanho);
// 	soma = 0;
// 	pos = tamanho - 7;
// 	for (i = tamanho; i >= 1; i--) {
// 		soma += numeros.charAt(tamanho - i) * pos--;
// 		if (pos < 2)
// 			pos = 9;
// 	}
// 	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
// 	if (resultado != digitos.charAt(1)) {
// 		return false;
// 	}

// 	return true;
// }

// function updateMask(event) {
// 	var $element = $('#' + this.id);
// 	$(this).off('blur');
// 	$element.unmask();
// 	if (this.value.replace(/\D/g, '').length > 10) {
// 		$element.mask("(00) 00000-0000");
// 	} else {
// 		$element.mask("(00) 0000-00009");
// 	}
// 	$(this).on('blur', updateMask);
// }

// function consultCEP() {
// 	$.ajax({
// 		url: urlGetCep,
// 		async: false,
// 		type: "GET",
// 		data: {
// 			'cep'      : $('#zip_code').val().replace(/[^\d]+/g, ''),
// 			},
// 		beforeSend : function(){
// 			$('#modal-msg').css( 'display', 'block' );
// 		},
// 		error: function(){
// 			showToast('error','Erro ao consultar CEP');
// 		},
// 		complete: function(){
// 			$('#modal-msg').css( 'display', 'none' );
// 		},
// 		success: function(res){
// 			if (res.data.resultado === "1"){
// 				$('#address').val(res.data.tipo_logradouro + ' ' + res.data.logradouro);
// 				$('#neighborhood').val(res.data.bairro);
// 				$('#city').val(res.data.cidade);
// 				$('#state').val(res.data.uf);
// 			} else {
// 				showToast('warning','Endereço CEP não localizado');
// 			}
// 			$("#address").focus();
// 		}				
// 	});
// }

// function consultCEP2() {
// 	var cep = $('#zip_code').val().replace(/[^\d]+/g, '');
// 	$('#address').val('');
// 	$('#number').val('');
// 	$('#neighborhood').val('');
// 	$('#city').val('');
// 	$('#state').val('');

// 	$.ajax({
// 		url: 'http://cep.republicavirtual.com.br/web_cep.php',
// 		type: 'get',
// 		dataType: 'json',
// 		crossDomain: true,
// 		headers: {
// 			'Access-Control-Allow-Headers' : 'Content-Type, X-CSRF-TOKEN',
// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
// 		},	
// 		data: {
// 			'Access-Control-Allow-Headers' : 'Content-Type, X-CSRF-TOKEN',
// 			cep: cep, //pega valor do campo
// 			formato: 'json'
// 		},
// 		success: function (res) {
// 			$('#address').val(res.tipo_logradouro + ' ' + res.logradouro);
// 			$('#neighborhood').val(res.bairro);
// 			$('#city').val(res.cidade);
// 			$('#state').val(res.uf);
// 			if (res.logradouro != '') {
// 				$("#number").focus();
// 			} else {
// 				$("#address").focus();
// 			};
// 		}
// 	});
// };
