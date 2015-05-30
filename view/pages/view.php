<div class='container table-responsive'>
	<h2>Submitted files</h2>
	<?php if($files != null): ?>
	<table class='table table-bordered table-hover'>
		<thead>
			<th>#</th>
			<?php if($_SESSION['type'] == 'teacher'): ?>
				<th>Student</th>
			<?php endif; ?>
			<th>File name</th>
			<th>Schedule</th>
			<th>Date Submitted</th>
			<th>Description</th>
			<th>Teacher's Remarks</th>
			<th colspan="2">Action</th>
		</thead>
		<tbody>
		<?php foreach($files as $index => $file): ?>
			<tr>
				<td><?php echo htmlentities($index+1); ?></td>
				<?php if($_SESSION['type'] == 'teacher'): ?>
					<td><?php echo htmlentities($file['last_name']).', '.htmlentities($file['first_name']).' '.htmlentities($file['middle_name']); ?></td>
				<?php endif; ?>
				<td><?php echo htmlentities($file['file_name']); ?></td>
				<td><?php echo htmlentities($file['schedule']); ?></td>
				<td><?php echo htmlentities($file['date_submitted']); ?></td>
				<td><?php echo htmlentities($file['description']); ?></td>
				<td><?php echo htmlentities($file['remarks']); ?></td>
				<td>
					<?php if($_SESSION['type'] == 'student'): ?>
						<a href="#" onclick='show_resubmit_modal(<?php echo json_encode($file); ?>);' data-toggle="modal">Resubmit</a>
					<?php else: ?>
						<a href="#" class="add-remark-btn" data-toggle="modal" data-id="<?php echo $file['id']; ?>">Add Remarks</a>
					<?php endif; ?>
				</td>
				<td>
					<a href="javascript:void(0);" onclick="delete_file(<?php echo htmlentities($file['id']); ?>);">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
		<div class="alert alert-info" role="alert"><i class="glyphicon glyphicon-info-sign"></i> You have no submitted files!</div>
	<?php endif; ?>
</div>

<!-- modal for resubmit form -->
<?php if($_SESSION['type'] == 'student'): ?>
<div class="modal fade" id="modal-resubmit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<form class="form form-horizontal" action="../controller/upload.php?action=resubmit" method="POST">
		<div class="modal-dialog">
   			<div class="modal-content">
   				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
       				<h4 class="modal-title" id="myModalLabel">Resubmit</h4>
				</div>
   				<div class="modal-body">
        		    <span id="container-warning" class="bg-danger">
		               
                	</span>
      					
      					<div id="f-schedule" class="form-group">
      				    	<label for="s-schedule" class="col-sm-2 control-label">Schedule</label>
      				    	<div class="col-sm-10">
      				    		
      				  	  	</div>
      				  	</div>

      				  	<div id="f-file" class="form-group">
      				    	<label for="f-file" class="col-sm-2 control-label">File</label>
      				    	<div class="col-sm-10">
      				    		<input type="file" name="document" class="form-control" placeholder="File" />
      				    	</div>
      				  	</div>

      					      <div id="f-description" class="form-group">
      					        <label for="f-desc" class="col-sm-2 control-label">Description</label>
	   					        <div class="col-sm-10">
   					          <textarea name="description" class="form-control" ></textarea>
   					        </div>
			    	  </div>
   					</div>
   				<div class="modal-footer">
   					<div class="form-group">
   						<div class="col-sm-offset-2 col-sm-10">
   							<button type="submit" class="btn btn-default" data-loading-text="Uploading ...." autocomplete="off">Upload</button>
   						</div>
					</div>
   				</div>
   			</div>
   		</div>
  	</form>
</div>
<?php else: ?>
<div class="modal fade" id="modal-remarks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<form class="form form-horizontal remarks-form" action="../controller/upload.php?action=remarks" method="POST">
		<div class="modal-dialog">
   			<div class="modal-content">
   				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
       				<h4 class="modal-title" id="myModalLabel">Add Remarks</h4>
				</div>
   				<div class="modal-body">
        		    <span id="container-warning" class="bg-danger">
		               
                	</span>
                		<input name="id" type="hidden" />
      				  	<div id="f-remarks" class="form-group">
      				    	<label for="f-file" class="col-sm-2 control-label">Remarks</label>
      				    	<div class="col-sm-10">
      				    		<textarea name="remarks" class="form-control" placeholder="Your Remarks..."></textarea>
      				    	</div>
      				  	</div>
   				</div>
   				<div class="modal-footer">
   					<div class="form-group">
   						<div class="col-sm-offset-2 col-sm-10">
   							<button type="submit" class="btn btn-default" data-loading-text="Adding ...." autocomplete="off">Add</button>
   						</div>
					</div>
   				</div>
   			</div>
   		</div>
  	</form>
</div>
<?php endif; ?>