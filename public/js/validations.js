//--- login/signup validations ---//
function login(form){
	student_id = $(form).find('input[name="student_number"]').val();

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
	first_name = $(form).find('input[name="first_name"]').val();
	middle_name = $(form).find('input[name="middle_name"]').val();
	last_name = $(form).find('input[name="last_name"]').val();
	error_counter = 0;
	if(student_id == ""){
		$(form).find('#f-student-number').addClass('has-error');
		$(form).find('#container-warning').append('<p class="text-danger">Student number is empty!</p>');
		error_counter++;
	}
	if(first_name == ""){
		$(form).find('#f-fname').addClass('has-error');
		$(form).find('#container-warning').append('<p class="text-danger">First name is empty!</p>');
		error_counter++;
	}
	if(middle_name == ""){
		$(form).find('#f-mname').addClass('has-error');
		$(form).find('#container-warning').append('<p class="text-danger">Middle name is empty!</p>');
		error_counter++;
	}
	if(last_name == ""){
		$(form).find('#f-lname').addClass('has-error');
		$(form).find('#container-warning').append('<p class="text-danger">Last name is empty!</p>');
		error_counter++;
	}
	
	if(error_counter == 0){
		$.ajax({
			url:'/esubmit/controller/student.php?action=signup',
			data:{
				'student_number' : student_id,
				'first_name' : first_name,
				'middle_name' : middle_name,
				'last_name' : last_name
			},
			type: 'POST',
			success: function(e){
				if(e){
					window.location.reload(true);
				}else{
					
					$(form).find('#container-warning').html('<p class="text-danger">Student number is already taken!</p>');
					$(form).find('#container-warning').addClass('bg-danger');
					$(form).find('#f-student-number').addClass('has-error');
					$(form).find('button').button('reset');
				}
			}
		});
	}else{
		$(form).find('button').button('reset');
	}

}