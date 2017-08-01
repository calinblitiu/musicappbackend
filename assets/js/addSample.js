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

});
