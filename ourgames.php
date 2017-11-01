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
<?php
require_once 'styl.php';
?>
<!DOCTYPE html>
<html lang="pl">
<!--canvas-->
<head>

	<style>
	canvas {
	 display: block;
	 width: 100vw;
	 height: 100vh;
	 cursor: pointer; 
	}
	</style><!--canvas-->
	<!--style do bootsnipa-->

	<style>
	.timeline {
	   list-style: none;
	   padding: 20px 0 20px;
	   position: relative;
	}

	   .timeline:before {
	       top: 0;
	       bottom: 0;
	       position: absolute;
	       content: " ";
	       width: 3px;
	       background-color: #eeeeee;
	       left: 50%;
	       margin-left: -1.5px;
	   }

	   .timeline > li {
	       margin-bottom: 20px;
	       position: relative;
	   }

	       .timeline > li:before,
	       .timeline > li:after {
	           content: " ";
	           display: table;
	       }

	       .timeline > li:after {
	           clear: both;
	       }

	       .timeline > li:before,
	       .timeline > li:after {
	           content: " ";
	           display: table;
	       }

	       .timeline > li:after {
	           clear: both;
	       }

	       .timeline > li > .timeline-panel {
	           width: 46%;
	           float: left;
	           border: 1px solid #d4d4d4;
	           border-radius: 2px;
	           padding: 20px;
	           position: relative;
	           -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	           box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	       }

	           .timeline > li > .timeline-panel:before {
	               position: absolute;
	               top: 26px;
	               right: -15px;
	               display: inline-block;
	               border-top: 15px solid transparent;
	               border-left: 15px solid #ccc;
	               border-right: 0 solid #ccc;
	               border-bottom: 15px solid transparent;
	               content: " ";
	           }

	           .timeline > li > .timeline-panel:after {
	               position: absolute;
	               top: 27px;
	               right: -14px;
	               display: inline-block;
	               border-top: 14px solid transparent;
	               border-left: 14px solid #fff;
	               border-right: 0 solid #fff;
	               border-bottom: 14px solid transparent;
	               content: " ";
	           }

	       .timeline > li > .timeline-badge {
	           color: #fff;
	           width: 50px;
	           height: 50px;
	           line-height: 50px;
	           font-size: 1.4em;
	           text-align: center;
	           position: absolute;
	           top: 16px;
	           left: 50%;
	           margin-left: -25px;
	           background-color: #999999;
	           z-index: 100;
	           border-top-right-radius: 50%;
	           border-top-left-radius: 50%;
	           border-bottom-right-radius: 50%;
	           border-bottom-left-radius: 50%;
	       }

	       .timeline > li.timeline-inverted > .timeline-panel {
	           float: right;
	       }

	           .timeline > li.timeline-inverted > .timeline-panel:before {
	               border-left-width: 0;
	               border-right-width: 15px;
	               left: -15px;
	               right: auto;
	           }

	           .timeline > li.timeline-inverted > .timeline-panel:after {
	               border-left-width: 0;
	               border-right-width: 14px;
	               left: -14px;
	               right: auto;
	           }

	.timeline-badge.primary {
	   background-color: #2e6da4 !important;
	}

	.timeline-badge.success {
	   background-color: #3f903f !important;
	}

	.timeline-badge.warning {
	   background-color: #f0ad4e !important;
	}

	.timeline-badge.danger {
	   background-color: #d9534f !important;
	}

	.timeline-badge.info {
	   background-color: #5bc0de !important;
	}

	.timeline-title {
	   margin-top: 0;
	   color: inherit;
	}

	.timeline-body > p,
	.timeline-body > ul {
	   margin-bottom: 0;
	}

	   .timeline-body > p + p {
	       margin-top: 5px;
	   }

	@media (max-width: 767px) {
	   ul.timeline:before {
	       left: 40px;
	   }

	   ul.timeline > li > .timeline-panel {
	       width: calc(100% - 90px);
	       width: -moz-calc(100% - 90px);
	       width: -webkit-calc(100% - 90px);
	   }

	   ul.timeline > li > .timeline-badge {
	       left: 15px;
	       margin-left: 0;
	       top: 16px;
	   }

	   ul.timeline > li > .timeline-panel {
	       float: right;
	   }

	       ul.timeline > li > .timeline-panel:before {
	           border-left-width: 0;
	           border-right-width: 15px;
	           left: -15px;
	           right: auto;
	       }

	       ul.timeline > li > .timeline-panel:after {
	           border-left-width: 0;
	           border-right-width: 14px;
	           left: -14px;
	           right: auto;
	       }
	}
	</style><!--style do bootsnipa-->
	<title>FantastiCards</title>
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
	</script>
	<script src="/canvas.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/1.0.0/anime.min.js">
	</script><!--login-->
</head>
<body style="padding: 0px 0px 0px 0px;">
	<!--NAVBAR/start-->
	<nav class="navbar navbar-default" style="margin-bottom: 0px">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" data-target="#navbar-collapse-2" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="http://fantasticards.pl/">FantastiCards</a>
			</div><!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse-2">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="/ourgames.php">Nasze gry</a>
					</li>
					<li>
						<a href="#">Galeria</a>
					</li>
					<li>
						<a href="/patch.php">Patch-news</a>
					</li>
					<li>
						<a href="/contact.php">Kontakt</a>
					</li>
					<li>
						<a aria-controls="nav-collapse2" aria-expanded="false" class="btn btn-default btn-outline btn-circle collapsed" data-toggle="collapse" href="#nav-collapse2">Logowanie</a>
					</li>
				</ul>
				<div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
					<div class="signin-form">
						<div class="container">
							<form class="form-signin" id="login-form" method="post" name="login-form">
								<h2 class="form-signin-heading">Zaloguj się by otrzymać dostęp do naszych gier.</h2>
								<hr>
								<?php
								        if(isset($msg)){
								            echo $msg;
								        }
								        ?>
								<div class="form-group">
									<label>Nazwa użytkownika:</label> <input class="form-control" name="username" placeholder="Wpisz swój nickname" required="" type="username"> <span id="check-e"></span>
								</div>
								<div class="form-group">
									<label>Hasło:</label> <input class="form-control" name="password" placeholder="Wpisz swoje hasło" required="" type="password">
								</div>
								<div class="form-group">
									<button class="btn btn-default" id="btn-login" name="btn-login" type="submit"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Zaloguj się</button> <a class="btn btn-default" href="register.php" style="float:right;"><span class="glyphicon glyphicon-chevron-right"></span> Rejestracja</a>
									<div style="margin-top:5px">
										Zapomniałeś hasła? Zresetuj je <a class="btn btn-xs btn-default" href="#">tutaj</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav><!--NAVBAR/end-->
<!--Mainpic/start-->
	<div class="jumbotron text-center" style="background: url('/images/h1background.jpg'); max-width: 1920px; max-height: 1080px; margin-bottom: 0px;">
		<h1 class="h1">Witaj na naszej stronie!</h1>
		<p class="p1">Zapraszamy do zagrania w nasze gry.</p>
	</div>
<!--Mainpic/end-->
<!--body/start-->
<!--body/end-->
	<footer>
		<iframe frameborder="0" height="70" scrolling="no" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFantastiCards%2F&tabs=timeline&width=340&height=70&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" style="border:none;overflow:hidden" width="340"></iframe>
	</footer>
</body>
</html>