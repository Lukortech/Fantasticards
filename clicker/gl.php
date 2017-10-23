<?php
session_start();
include_once 'dbconnect.php';
mysqli_set_charset( $DBcon, 'utf8_polish_ci');
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>

<!DOCTYPE html>
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link rel="stylesheet" href="style.css" type="text/css" />


	<table width="100%" cellspacing="0" cellpadding="10">
<tr>
	<td bgcolor="transparent" width="20%" valign="top" align="center">
		<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>Wyloguj</a>
	</td>
	<td bgcolor="transparent" width="20%" valign="top" align="center">
		Karcianka (dodaæ button)
	</td>
	<td bgcolor="transparent" width="30%" valign="top" align="right">
		<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo "Witaj ".$userRow['username']."!"; ?></a>
	</td>
</tr>
</table>
	<link rel="Shortcut icon" href="https://bitcoin.org/img/icons/opengraph.png" />
	<title>FantastiCards</title>
	<meta charset="UTF-8">
  </head>

	<style>
#cf {
  position:relative;
  height:100px;
  width:100px;
  margin:0 auto;
}

#cf img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 500ms ease-in-out;
  -moz-transition: opacity 500ms ease-in-out;
  -o-transition: opacity 500ms ease-in-out;
  transition: opacity 500ms ease-in-out;
}

#cf img.top:hover {
  opacity:0;
}
</style>	
	<style>
	body {
    background-image: url("https://c1.staticflickr.com/9/8109/8632995866_a9174356d8_b.jpg");
    background-size: 100% 100%;
    <!--background-repeat: repeat;
	resize: both;-->
	}
	<!--.hover {
	box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19)
	}-->
	</style>	
        <body>

      <h1>
		<div style="text-align:center;">BitCoins: <span id="kasa">0</span>   |BitCoin/s: <span id="kasanasekunde">0</span></div>
	</h1><!--//To jest jebany button podstawka pod menu u góry//<button class="hover" ><img src="https://bitcoin.org/img/icons/opengraph.png" height="100" width="100" /></button>-->

	
	
	<div id="cf" onclick="wykopanieBitcoina()">
		<center><img class="bottom" src="https://bitcoin.org/img/icons/opengraph.png" height="100" width="100"/></center>
		<center><img class="top" src="bitszary.gif" height="100" width="100"/></center>
	</div>
	
    <h3>Twoje BitUlepszenia</h3>
	
    <p>Ulepszenie klikniêcia: <span id="kosztUlepszeniaKlikniecia">30</span> <button onclick="buyClickUpgrade()">+</button>
	<br>
	<br>
	Zatrudnij kopacza | <b>Koszt: <span id="beginnerCost">10</span></b>
	<div id="cf" onclick="buyBeginner()">
			<img style="position:fixed;" class="bottom" src="koparka-bitcoin-12.png" height="200" width="320"/>
			<img style="position:fixed;" class="top" src="koparka-bitcoin-11.png" height="200" width="320"/>
	</div>
 	<!--Zatrudnij <button onclick="buyBeginner()"><img src="http://zukiewicz.com/wp-content/uploads/2016/06/koparka-bitcoin-11.png" height="82" width="102" /></button> Koszt: <span id="beginnerCost">10</span></center>
    -->
  </body>
</html>
<script>
var kasa = 0;
var kopacz = 0;
var kasa4click = 1;
var kasanasekunde = 0;
var klikniecia = 0;

function wykopanieBitcoina(){
kasa += kasa4click;
klikniecia += 1;
document.getElementById("kasa").innerHTML = prettify(kasa);
}

function mps(){
	kasa += kasanasekunde;
	document.getElementById('kasa').innerHTML = prettify(kasa);
	document.getElementById('kasanasekunde').innerHTML = prettify(kasanasekunde);
}

function buyClickUpgrade(){
	var kosztUlepszeniaKlikniecia = Math.floor(10 * Math.pow(3, kasa4click)); //Pocz¹tkowa wartoœæ za upgrade 30/90/270/810 (iloœæ klików na upgrade- 30/45/90/202)
	if (kasa >= kosztUlepszeniaKlikniecia){
		kasa4click++;
		kasa -= kosztUlepszeniaKlikniecia;
		document.getElementById('kosztUlepszeniaKlikniecia').innerHTML = kosztUlepszeniaKlikniecia;
	
	}
	var nextCost =Math.floor(10 * Math.pow(3, kasa4click));
	document.getElementById('kosztUlepszeniaKlikniecia').innerHTML = nextCost;
}

function buyBeginner(){
	var beginnerCost = Math.floor(10 * Math.pow(1.1, kopacz));
	if (kasa >= beginnerCost){
		kopacz += 0.1;
		kasanasekunde += 0.1;
		kasa -= beginnerCost;
		document.getElementById('kasa').innerHTML = prettify(kasa);
		document.getElementById('kasanasekunde').innerHTML = prettify(kasanasekunde);
	}
	var nextCost = Math.floor(10 * Math.pow(1.1, kopacz));
	document.getElementById('beginnerCost').innerHTML = prettify(nextCost);
}
//kawa³ek zmieniajacy kolor kasy
  function unhighlight(x) {
  x.style.backgroundColor = "#f7931a"
}

function prettify(input){
	var output = Math.round(input * 1000000)/ 1000000;
	return output;

}



var hundredClicks = 100;
function clickcount(){
	if(klikniecia == hundredClicks){
		alert("Kliknales juz 100 razy!");
	}
}
window.setInterval(klikniecia, 1);
window.setInterval(mps, 1000);
</script>
