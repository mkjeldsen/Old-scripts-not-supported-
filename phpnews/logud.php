<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
session_start();
$_SESSION = array();
session_destroy();
header("Location:logind.php");
exit;
?>