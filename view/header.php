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
          
					<a href="/esubmit/controller/users.php?action=logout" id="btn-signup" data-toggle="modal">
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
		<form class="form form-horizontal login-form" action="../controller/users.php?action=login" method="POST" onsubmit="login(this); return false;">
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
              <div id="f-login-signup-as" class="form-group">
                  <div class="col-sm-10">
                    <select class="form-control login-signup-as" name="login-signup-as" data-value="login-form">
                    <option value="0"> Login up as .... </option>
                      <option value="student">
                        Student
                      </option>
                      <option value="teacher">
                        Teacher
                      </option>
                    </select>
   
                  </div>
                </div>
      				<div id="f-student-number" class="form-group">
    						<div class="col-sm-10">
    							<input id="id-field" type="text" name="number" class="form-control user-fields" placeholder="Enter student no." disabled>
    						</div>
  						</div>
  		
      				</div>
      				<div class="modal-footer">
      					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
      							<button id="btn-login" type="submit" class="btn btn-default user-fields" data-loading-text="Logging in ...." autocomplete="off" disabled>Login</button>
    						</div>
  						</div>
      				</div>
    			</div>
  			</div>
  		</form>
		</div>

		<div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form class="form form-horizontal signup-form" action="../controller/users.php?action=signup" method="POST" onsubmit="signup(this); return false;">
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
                <div id="f-login-signup-as" class="form-group">
                  <div class="col-sm-10">
                    <select class="form-control login-signup-as" name="login-signup-as" data-value="signup-form">
                    <option value="0"> Sign up as .... </option>
                      <option value="student">
                        Student
                      </option>
                      <option value="teacher">
                        Teacher
                      </option>
                    </select>
   
                  </div>
                </div>
      					<div id="f-student-number" class="form-group">
    						<div class="col-sm-10">
    							<input id="id-field" type="text" name="number" class="form-control user-fields" placeholder="Enter student no." disabled>
 
    						</div>
  						</div>
              <div class="form-group">
    						<div id="f-fname" class="col-sm-10">
    							<input type="text" name="first_name" class="form-control user-fields" placeholder="Enter first name" disabled>
 
    						</div>
  						</div>
              <div id="f-mname" class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="middle_name" class="form-control user-fields" placeholder="Enter middle name" disabled>
 
    						</div>
  						</div>
              <div id="f-lname" class="form-group">
    						<div class="col-sm-10">
    							<input type="text" name="last_name" class="form-control user-fields" placeholder="Enter last name" disabled>
 
    						</div>
  						</div>
  		
      				</div>
      				<div class="modal-footer">
      					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
      							<button type="submit" class="btn btn-default user-fields" data-loading-text="Signing up ...." autocomplete="off" disabled>Signup</button>
    						</div>
  						</div>
      				</div>
    			</div>
  			</div>
  		</form>
		</div>
		<?php endif; ?>