<!DOCTYPE html>
<html>
	<head>
		<title>eSubmit</title>
		<!-- Bootstrap stylesheets -->
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.css.map">
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css.map">
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">


	</head>

	<body>
	<!-- navigation -->
		<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a href='index.php' class='navbar-brand'>eSubmit</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class='nav nav-tabs navbar-left'>
				<li role="presentation" class="active">
					<a href="index.php" role="tab">Home</a>
				</li>
				<?php if($session != null): ?>
				<li role="presentation">
					<a href="upload.php" role="tab">Submit files</a>
				</li>
				<li role="presentation">
					<a href="view.php" role="tab">Submitted files</a>
				</li>
				<?php endif; ?>
			</ul>
			<ul class="nav nav-tabs navbar-right">
			<?php if($session == null): ?>
				<li>
					<a href="#" id="btn-login" data-toggle="modal">Login</a>
				</li>
				<li>
					<a href="#" id="btn-signup" data-toggle="modal">Signup</a>
				</li>
			<?php else: ?>
				<li>
					<a href="/esubmit/controller/student?action=logout" id="btn-signup" data-toggle="modal">Logout</a>
				</li>
			<?php endif; ?>
			</ul>
		</div>
		</div>
		<?php if($session == null): ?>
		<!-- modals -->
		<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form class="form form-horizontal" action="../controller/student.php?action=login" method="POST">
  			<div class="modal-dialog modal-sm">
    			<div class="modal-content">
    				<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">
  							<span aria-hidden="true">&times;</span>
  							<span class="sr-only">Close</span>
  						</button>
        				<h4 class="modal-title" id="myModalLabel">Login</h4>
  					</div>
      				<div class="modal-body">
      					<div class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="student_number" class="form-control" id="f-student-number" placeholder="Enter your student no.">
    						</div>
  						</div>
  		
      				</div>
      				<div class="modal-footer">
      					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
      							<button type="submit" class="btn btn-default">Login</button>
    						</div>
  						</div>
      				</div>
    			</div>
  			</div>
  		</form>
		</div>

		<div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form class="form form-horizontal" action="../controller/student.php?action=signup" method="POST">
  			<div class="modal-dialog modal-sm">
    			<div class="modal-content">
    				<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">
  							<span aria-hidden="true">&times;</span>
  							<span class="sr-only">Close</span>
  						</button>
        				<h4 class="modal-title" id="myModalLabel">Signup</h4>
  					</div>
      				<div class="modal-body">
      					<div class="form-group">
    						<div class="col-sm-10">
    							<input type="text" class="form-control" id="f-student-number" placeholder="Enter student no.">
 
    						</div>
  						</div><div class="form-group">
    						<div class="col-sm-10">
    							<input type="text" class="form-control" id="f-fname" placeholder="Enter first name">
 
    						</div>
  						</div><div class="form-group">
    						<div class="col-sm-10">
    							<input type="text" class="form-control" id="f-mname" placeholder="Enter middle name">
 
    						</div>
  						</div><div class="form-group">
    						<div class="col-sm-10">
    							<input type="text" class="form-control" id="f-lname" placeholder="Enter last name">
 
    						</div>
  						</div>
  		
      				</div>
      				<div class="modal-footer">
      					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
      							<button type="submit" class="btn btn-default">Signup</button>
    						</div>
  						</div>
      				</div>
    			</div>
  			</div>
  		</form>
		</div>
		<?php endif; ?>