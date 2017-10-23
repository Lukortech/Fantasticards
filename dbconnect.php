<?php

$DBhost = "sql.lukortech.nazwa.pl:3306" ;
	 $DBuser = "lukortech";
	 $DBpass = "Asddsa123321";
	 $DBname = "lukortech";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
