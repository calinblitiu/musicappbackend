$(document).ready(function(){
	
	$('.remove-sample-btn').click(function(){
		var sample_no = $(this).data('sample-id');
		$('#sample-id-hidden').val(sample_no);
		$('#deletemodal').modal('show');
	});

});
