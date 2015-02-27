function show_resubmit_modal(file){
	
	$('#f-schedule').find('.col-sm-10').html('<input type="text" class="form-control" name="schedule" readonly="" value="'+file["schedule"]+'" />');
	$('#f-schedule').find('.col-sm-10').append('<input type="hidden" class="form-control" name="id" value="'+file["id"]+'" />');
	$('#f-description').find('textarea[name="description"]').html(file['description'])
	$('#modal-resubmit').modal('toggle')
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