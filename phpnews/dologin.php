<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	session_start();

include('include.php');

//hvis form er submittet
if (isset($_POST['logind'])) {

//password i databasen er krypteret, så det gøres også med indtastet password
$dopass = md5($_POST['password']);


//skift selv bruger og pass til databasen.
$db = mysql_connect($server, $username, $password) or die ("Desværre ingen forbindelse til databasen");

mysql_select_db($database, $db) or die ("Kunne ikke vælge databasetabel");

$tjek = mysql_query("SELECT navn, password, status FROM users WHERE navn='$_POST[navn]' AND password='$dopass'") or die ("Kunne ikke vælge felter i database-tabellen");

if(mysql_num_rows($tjek) != 0) {

$var = mysql_fetch_Array($tjek);
$status = $var["status"];

$_SESSION['sessionnr'] = session_id();
$_SESSION['Name'] = $_POST['navn'];
$_SESSION['Status'] = $status;


header("Location:add.php");
exit;
}else{

header("Location:logind.php?error=fejl");
exit;
}

}else{

header("Location:logind.php");
exit;
}

?>
