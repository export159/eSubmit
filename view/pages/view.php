<div class='container table-responsive'>
	<h2>My submitted files</h2>
	<?php if($files != null): ?>
	<table class='table table-bordered table-hover'>
		<thead>
			<th>#</th>
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
				<td><?php echo htmlentities($file['file_name']); ?></td>
				<td><?php echo htmlentities($file['schedule']); ?></td>
				<td><?php echo htmlentities($file['date_submitted']); ?></td>
				<td><?php echo htmlentities($file['description']); ?></td>
				<td><?php echo htmlentities($file['remarks']); ?></td>
				<td>
					<a href="#">Resubmit</a>
				</td>
				<td>
					<a href="#" onclick="delete_file(<?php echo htmlentities($file['id']); ?>);">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
		<div class="alert alert-info" role="alert"><i class="glyphicon glyphicon-info-sign"></i> You have no submitted files!</div>
	<?php endif; ?>
</div>