$(function () {
	$('#showtoast').click(function () {
		showToast('error','ocorreu um error','title do erro');
	});

	$('#cleartoasts').click(function () {
		clearToasts();
	});

})
