<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
	
	$uname = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	
	$uname = $DBcon->real_escape_string($uname);
	$email = $DBcon->real_escape_string($email);
	$upass = $DBcon->real_escape_string($upass);
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	
	$check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO tbl_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
	
	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script><!--login-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js">
	</script><!--login-->
</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required  />
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>
        
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
            <a href="index.php" class="btn btn-default" style="float:right;">Log In Here</a>
        </div> 
      
      </form>

    </div>
    
</div>

<!--DO PODMIANY DLA STACHA-->
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Register</legend>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Login</span>
      <input id="prependedtext" name="prependedtext" class="form-control" placeholder="Your username" type="text" required="">
    </div>
    <p class="help-block">Your nickname show in game and our site.</p>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Password</span>
      <input id="password" name="password" class="form-control" placeholder="Your password" type="text" required="">
    </div>
    <p class="help-block">The password must be at least 8 characters long and must contain at least one digit, one letter and one nonalphanumeric character.</p>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Email</span>
      <input id="email" name="email" class="form-control" placeholder="Your email" type="text" required="">
    </div>
    <p class="help-block">example@example.net</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="register"></label>
  <div class="col-md-4">
    <button id="register" name="register" class="btn btn-primary">Register</button>
  </div>
</div>

</fieldset>
</form>

<!--DO PODMIANY DLA STACHA-->




</body>
</html>