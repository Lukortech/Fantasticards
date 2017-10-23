<?php
session_start();
require_once 'dbconnect.php';
mysqli_set_charset( $DBcon, 'utf8_polish_ci');
if (isset($_SESSION['userSession'])!="") {
	header("Location: /clicker/gl.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: /clicker/gl.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>
<!DOCTYPE html>
<html lang="pl">
<!--style do bootsnipa-->
<style>
</style>
<!--style do bootsnipa-->
<head>
  <title>FantastiCards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<!--login-->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="customlogin/style.css">
	<!--login-->
</head>
<body style="padding: 0px 0px 0px 0px;">
<!--NAVBAR/start-->
<nav class="navbar navbar-default" style="margin-bottom: 0px">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://fantasticards.pl/">FantastiCards</a>
        </div>   
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            
            
            <li><a href="#">Nasze gry</a></li>
            <li><a href="#">Galeria</a></li>
            <li><a href="/patch.php">Patch-news</a></li>
            <li><a href="/contact.php">Kontakt</a></li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Logowanie</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
 <div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Zaloguj się by otrzymać dostęp do naszych gier.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
		<label>Nazwa użytkownika:</label>
        <input type="username" class="form-control" placeholder="Wpisz swój nickname" name="username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
		<label>Hasło:</label>
        <input type="password" class="form-control" placeholder="Wpisz swoje hasło" name="password" required />
        </div>
       

        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Zaloguj się
			</button> 
			<a href="register.php" class="btn btn-default" style="float:right;"><span class="glyphicon glyphicon-chevron-right"></span> Rejestracja</a>
        
		<div style="margin-top:5px">
			Zapomniałeś hasła? Zresetuj je 
			<a href="#" class="btn btn-xs btn-default">tutaj</a>
		</div>
        </div>  
        
        
      
      </form>

    </div>
    
</div>
</nav><!-- /.navbar -->
<!--NAVBAR/end-->
<!--Mainpic/start-->
<div class="jumbotron text-center" style="background: url('/images/h1background.jpg'); max-width: 1920px; max-height: 1080px; margin-bottom: 0px;">
	<h1 class="h1">Witaj na naszej stronie!</h1>
	<p class="p1">Zapraszamy do zagrania w nasze gry.</p> 
  
		<!--<div class="container" align="center">
			<img class="image2" src="fc.svg" alt="hoverimg2">
			<img class="image1" src="fc.svg" alt="hoverimg1">
		</div>-->
</div>
 <!--Mainpic/end-->
 <!--body/start-->
<iframe src="https://titanembeds.com/embed/365520773974065155" height="500" width="100%" frameborder="0"></iframe>
 <!--body/end-->



</body>
</html>



<!--PASSVALIDATION
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
				<form action="" class="loginForm">
					<div class="input-group">
						<input type="text" id="name" class="form-control" placeholder="Login">
						<input type="password" id="paw" class="form-control" placeholder="Hasło">
						<input type="submit" id="submit" class="form-control" value="Zaloguj">
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-4">
			<div class="aro-pswd_info">
				<div id="pswd_info">
					<h4>Hasło musi spełniać poniższe wymagania:</h4>
					<ul>
						<li id="letter" class="invalid">Co najmniej <strong>jedna litera</strong></li>
						<li id="capital" class="invalid">Co najmniej <strong>jedna duża litera</strong></li>
						<li id="number" class="invalid">Co najmniej <strong>jedna liczba</strong></li>
						<li id="length" class="invalid">Musi mieć <strong>8 znaków</strong></li>
						<li id="space" class="invalid">Nie może <strong>zawierać [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
-->

<!--scrypt do password validation
<script>
$(document).ready(function(){
	
	$('input[type=password]').keyup(function() {
		var pswd = $(this).val();
		
		//validate the length
		if ( pswd.length < 8 ) {
			$('#length').removeClass('valid').addClass('invalid');
		} else {
			$('#length').removeClass('invalid').addClass('valid');
		}
		
		//validate letter
		if ( pswd.match(/[A-z]/) ) {
			$('#letter').removeClass('invalid').addClass('valid');
		} else {
			$('#letter').removeClass('valid').addClass('invalid');
		}

		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
			$('#capital').removeClass('invalid').addClass('valid');
		} else {
			$('#capital').removeClass('valid').addClass('invalid');
		}

		//validate number
		if ( pswd.match(/\d/) ) {
			$('#number').removeClass('invalid').addClass('valid');
		} else {
			$('#number').removeClass('valid').addClass('invalid');
		}
		
		//validate space
		if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
			$('#space').removeClass('invalid').addClass('valid');
		} else {
			$('#space').removeClass('valid').addClass('invalid');
		}
		
	}).focus(function() {
		$('#pswd_info').show();
	}).blur(function() {
		$('#pswd_info').hide();
	});
	
});
</script>
-->

<!--Style for password validation
<style>
/* Base CSS */
.alignleft {
    float: left;
    margin-right: 15px;
}
.alignright {
    float: right;
    margin-left: 15px;
}
.aligncenter {
    display: block;
    margin: 0 auto 15px;
}
a:focus { outline: 0 solid }
img {
    max-width: 100%;
    height: auto;
}
.fix { overflow: hidden }
h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0 0 15px;
    font-weight: 700;
}
html,
body { height: 100% }

a {
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    color: #333;
}
a:hover { text-decoration: none }



.search-box{margin:80px auto;position:absolute;}
.caption{margin-bottom:50px;}
.loginForm input[type=text], .loginForm input[type=password]{
	margin-bottom:10px;
}
.loginForm input[type=submit]{
	background:#fb044a;
	color:#fff;
	font-weight:700;
	
}


#pswd_info {
	background: #dfdfdf none repeat scroll 0 0;
	color: #fff;
	left: 20px;
	position: absolute;
	top: 115px;
}
#pswd_info h4{
    background: black none repeat scroll 0 0;
    display: block;
    font-size: 14px;
    letter-spacing: 0;
    padding: 17px 0;
    text-align: center;
    text-transform: uppercase;
}
#pswd_info ul {
    list-style: outside none none;
}
#pswd_info ul li {
   padding: 10px 45px;
}



.valid {
	background: rgba(0, 0, 0, 0) url("https://s19.postimg.org/vq43s2wib/valid.png") no-repeat scroll 2px 6px;
	color: green;
	line-height: 21px;
	padding-left: 22px;
}

.invalid {
	background: rgba(0, 0, 0, 0) url("https://s19.postimg.org/olmaj1p8z/invalid.png") no-repeat scroll 2px 6px;
	color: red;
	line-height: 21px;
	padding-left: 22px;
}


#pswd_info::before {
    background: #dfdfdf none repeat scroll 0 0;
    content: "";
    height: 25px;
    left: -13px;
    margin-top: -12.5px;
    position: absolute;
    top: 50%;
    transform: rotate(45deg);
    width: 25px;
}
#pswd_info {
    display:none;
}
</style>
-->