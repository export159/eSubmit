<!DOCTYPE html>
<html>
	<head>
		<title>eSubmit</title>
		<!-- Bootstrap stylesheets -->
    <link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
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
				<li id="tab-home" role="presentation">
					<a href="index.php" role="tab">
            <i class="glyphicon glyphicon-home"></i> 
            Home
          </a>
				</li>
				<?php if($session != null): ?>
				<li id="tab-submit" role="presentation">
					<a href="upload.php" role="tab">
            <i class="glyphicon glyphicon-upload"></i> 
            Submit files
          </a>
				</li>
				<li id="tab-view" role="presentation">
					<a href="view.php" role="tab">
            <i class="glyphicon glyphicon-list"></i> 
            Submitted files
          </a>
				</li>
				<?php endif; ?>
			</ul>
			<ul class="nav nav-tabs navbar-right">
			<?php if($session == null): ?>
				<li>
					<a href="#" id="btn-login" data-toggle="modal">
            <i class="glyphicon glyphicon-log-in"></i> 
            Login
          </a>
				</li>
				<li>
					<a href="#" id="btn-signup" data-toggle="modal">
            <i class="glyphicon glyphicon-edit"></i> 
            Signup
          </a>
				</li>
			<?php else: ?>
				<li>
          
					<a href="/esubmit/controller/student.php?action=logout" id="btn-signup" data-toggle="modal">
            <i class="glyphicon glyphicon-log-out"></i> 
            Logout
          </a>
				</li>
			<?php endif; ?>
			</ul>
		</div>
		</div>
		<?php if($session == null): ?>
		<!-- modals -->
		<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form class="form form-horizontal" action="../controller/student.php?action=login" method="POST" onsubmit="login(this); return false;">
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
              <span id="container-warning" class="bg-danger">
               
              </span>
      					<div id="f-student-number" class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="student_number" class="form-control" placeholder="Enter your student no.">
    						</div>
  						</div>
  		
      				</div>
      				<div class="modal-footer">
      					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
      							<button id="btn-login" type="submit" class="btn btn-default" data-loading-text="Logging in ...." autocomplete="off">Login</button>
    						</div>
  						</div>
      				</div>
    			</div>
  			</div>
  		</form>
		</div>

		<div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form class="form form-horizontal" action="../controller/student.php?action=signup" method="POST" onsubmit="signup(this); return false;">
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
                <span id="container-warning" class="bg-danger">
               
                </span>
      					<div id="f-student-number" class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="student_number" class="form-control" placeholder="Enter student no.">
 
    						</div>
  						</div>
              <div class="form-group">
    						<div id="f-fname" class="col-sm-10">
    							<input type="text" name="first_name" class="form-control" placeholder="Enter first name">
 
    						</div>
  						</div>
              <div id="f-mname" class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="middle_name" class="form-control" placeholder="Enter middle name">
 
    						</div>
  						</div>
              <div id="f-lname" class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="last_name" class="form-control" placeholder="Enter last name">
 
    						</div>
  						</div>
  		
      				</div>
      				<div class="modal-footer">
      					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
      							<button type="submit" class="btn btn-default" data-loading-text="Signing up ...." autocomplete="off">Signup</button>
    						</div>
  						</div>
      				</div>
    			</div>
  			</div>
  		</form>
		</div>
		<?php endif; ?>