<?php

require_once 'log.php';
?>
<?php

require_once 'styl.php';
?>
<!--Mainpic/start-->
<div class="jumbotron text-center" style="background: url('/images/h1background.jpg'); max-width: 1920px; max-height: 1080px; margin-bottom: 0px;">
	<h1 class="h1">Witaj na naszej stronie!</h1>
	<p class="p1">Zapraszamy do zagrania w nasze gry.</p> 
</div>
 <!--Mainpic/end-->
 <!--body/start-->
<div class="container">
	<div class="container">
    <div class="page-header">
        <h4 id="timeline">Słowem wstepu projekt ten jest Tworzony przez Osoby pragnace nauczyc sie programowac, zwiazku z tym licz sie z mozliwosciami wystepowania bledow, nie zajmujemy sie tym 24 na dobe jest to nasze hobby, przez co zmiany beda sie pojawiac w róznych terminach, nie powinny dziwic 1-2 miesieczne okresy przestoju.(wszystko jest dla nas nowe ;) )</h4>
    </div>
    <ul class="timeline">
        <li class="timeline-inverted">
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">20.10.2017r</h4>
            </div>
            <div class="timeline-body">
              <p> - Powstanie rejstracji oraz logowania</p>
			</div>
          </div>
        </li>
        <li>
          <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Coś z akcją</h4>
            </div>
            <div class="timeline-body">
              <p>akcja</p>
              <hr>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">09.10.2017r</h4>
            </div>
            <div class="timeline-body">
              <p> - Strona responsywna (dopasowuje się do powiększenia) oraz poprawnie dzialajaca na urzadzeniach mobilnych</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">01.09.2017r</h4>
            </div>
            <div class="timeline-body">
              <p> - Start Projektu</p> 
			</div>
          </div>
        </li>
    </ul>
</div>
</div>
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