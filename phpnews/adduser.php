<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
	include('include.php');
	mysql_select_db($database, $db) or die ("Kunne ikke finde db'en");

	$newpassword = md5($newpassword);
	
	$uSQL = "INSERT INTO `users` (`id`, `navn`, `password`) VALUES ('', '$newusername', '$newpassword');";
	mysql_query($uSQL);

	header("location: newuser.php");
?>