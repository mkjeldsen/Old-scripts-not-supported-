<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
// Connection data
$server = 'localhost';
$username = 'username';
$password = 'password';
$database = 'database';
$db = mysql_connect($server, $username, $password) or die(mysql_error("Cannot connect to database"));

// Antal poster vist
$numofposts = '5';

//Default titel-tekst
$default_titel = 'Så er der nyheder!';
?>
