<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
	include('tjeklogin.php');
	include('include.php');
	mysql_select_db($database, $db) or die ("Kunne ikke finde db'en");

//	echo "pass: ".$chpassword."<br />";

	$password = md5($chpassword);
	
//	echo "user: ".$username."<br />";
//	echo "pass2: ".$password;

	$pSQL = "UPDATE `users` SET `password` = '$password' WHERE `id` = '$id' LIMIT 1;";
	mysql_query($pSQL);

	header("location: newuser.php");
?>