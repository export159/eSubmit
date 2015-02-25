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
				<td><?php echo $index+1; ?></td>
				<td><?php echo $file['file_name']; ?></td>
				<td><?php echo $file['schedule']; ?></td>
				<td><?php echo $file['date_submitted']; ?></td>
				<td><?php echo $file['description']; ?></td>
				<td><?php echo $file['remarks']; ?></td>
				<td>
					<a href="#">Resubmit</a>
				</td>
				<td>
					<a href="#">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
		<div class="alert alert-info" role="alert"><i class="glyphicon glyphicon-info-sign"></i> You have no submitted files!</div>
	<?php endif; ?>
</div>