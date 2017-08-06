$(document).ready(function(){
	
	var addUserForm = $("#addSampleSet");
	
	var validator = addUserForm.validate({
		
		rules:{
			sname :{ required : true },
			sdescription : { required : true},
		},
		messages:{
			sname :{ required : "This field is required" },
			sdescription : { required : "This field is required"},			
		}
	});

	$( "#short-seq" ).sortable();
    $( "#short-seq" ).disableSelection();
    $( "#long-seq" ).sortable();
    $( "#long-seq" ).disableSelection();

	$(".sort-seq-undo").click(function() {
	  location.reload();
	});

	$(".short-change-btn").click(function(){
		var data = $('#short-seq').sortable('toArray', { attribute: 'predmet-id' });	
		var post_data = {
			order : data.toString(),
			sample_id : $("#sid").val(),
			type:'order_short'
		};

		$.ajax({
			url : baseURL+"update_order",
			type: 'POST',
			data: post_data,
			dataType: 'json',
			success: function(data){
				alert('change successed!');
				location.reload();
			},
			fail: function(err){
				alert(err);
				location.reload();
			}
		});
	});

	$(".long-change-btn").click(function(){
		var data = $('#long-seq').sortable('toArray', { attribute: 'predmet-id' });	
		var post_data = {
			order : data.toString(),
			sample_id : $("#sid").val(),
			type:'order_long'
		};

		$.ajax({
			url : baseURL+"update_order",
			type: 'POST',
			data: post_data,
			dataType: 'json',
			success: function(data){
				alert('change successed!');
				location.reload();
			},
			fail: function(err){
				alert(err);
				location.reload();
			}
		});
	});

	 $('#sfree').change(function() {
	 	if($(this).is(':checked')){
	 		$('#sprice').prop('disabled',true);
	 		$('#sprice').val(0);
	 	}
	 	else{
	 		$('#sprice').prop('disabled',false);

	 	}
	 });

	 $('#sprice').change(function(){
	 	if($(this).val() == "")
	 	{
	 		$(this).val(0);
	 	}
	 });
	
});


