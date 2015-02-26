function login(form){
	student_id = $(form).find('input[name="student_number"]').val();
	
   	

    	// business logic...
    
  	

	if(student_id == ""){
		$(form).find('#container-warning').html('<p class="text-danger">Student number is empty!</p>');
		$(form).find('#container-warning').addClass('bg-danger');
		$(form).find('#f-student-number').addClass('has-error');
		$(form).find('button').button('reset');
	}else{
		$.ajax({
			url:'/esubmit/controller/student.php?action=login',
			data:{
				'student_number' : student_id
			},
			type: 'POST',
			success: function(e){
				if(e != ""){
					window.location.reload(true);
				}else{
					
					$(form).find('#container-warning').html('<p class="text-danger">Student number is not valid!</p>');
					$(form).find('#container-warning').addClass('bg-danger');
					$(form).find('#f-student-number').addClass('has-error');	
					$(form).find('button').button('reset');

				}
			}
		});
	}

}

function signup(form){
	student_id = $(form).find('input[name="student_number"]').val();
	
	$.ajax({
		url:'/esubmit/controller/student.php?action=signup',
		data:{
			'student_number' : student_id
		},
		type: 'POST',
		success: function(e){
			if(e != ""){
				window.location.reload(true);
			}else{
				
				$(form).find('#container-warning').html('<p class="text-danger">Student number is not valid!</p>');
				$(form).find('#container-warning').addClass('bg-danger');
				$(form).find('#f-student-number').addClass('has-error');			
			}
		}
	});

}