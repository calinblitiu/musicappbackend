$(document).ready(function(){
	
	$('.remove-sample-btn').click(function(){
		var sample_no = $(this).data('sample-id');
		$('#sample-id-hidden').val(sample_no);
		$('#deletemodal').modal('show');
	});

	$('.noti-sample-btn').click(function(){
		var noti_name = $(this).data('sample-name');
		var noti_data = {
			name : noti_name,
			msg : noti_name+" is updated."
		};
		$.ajax({
			url : baseURL+"noti.php",
			type : 'post'
		});
	});
});
