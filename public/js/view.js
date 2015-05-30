function show_resubmit_modal(file){
	
	$('#f-schedule').find('.col-sm-10').html('<input type="text" class="form-control" name="schedule" readonly="" value="'+file["schedule"]+'" />');
	$('#f-schedule').find('.col-sm-10').append('<input type="hidden" class="form-control" name="id" value="'+file["id"]+'" />');
	$('#f-description').find('textarea[name="description"]').html(file['description'])
	$('#modal-resubmit').modal('toggle')
}
function resubmit(form){
	validation = validate_upload(form);	

}

function delete_file(id){

	if(confirm('Are you sure you want to delete this file?')){
		$.ajax({
			url: '/esubmit/controller/upload.php?action=delete',
			data:{
				'id' : id
			},
			type: 'GET',
			success: function(e){
				window.location.reload(true);
				
			}
		});
	}
}

function remarks(){
	//showing the remarks modal
	$('body').on('click', '.add-remark-btn', function(){
		$('input[name="id"]').val($(this).data('id'));
		$('#modal-remarks').modal('toggle');
	});

	//submitting the remarks
	$('body').on('submit', '.remarks-form', function(){
		formData = new FormData($(this)[0]);
		action = $(this).attr('action');
		console.log(action);
		
		if($('textarea[name="remarks"]').val() == ""){
			$(this).find('#f-remarks').addClass('has-error');
			$(this).find('#container-warning').append('<p class="text-danger">Remarks is empty!</p>');
			
		}else{
			$.ajax({
				url : action,
				data: formData,
				type: 'POST',
		     	cache: false,
		     	contentType: false,
		     	processData: false,
				success: function(e){
					
					window.location.reload(true);

					/*
					$('#modal-remarks').modal('toggle');
					$(this).find('input').val('');
					$(this).find('button').button('reset');
					*/

				}
			});
		}

		


		return false;
	});
}