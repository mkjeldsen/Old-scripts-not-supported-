<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
session_start();
if (!isset($_SESSION['Name'], $_SESSION['sessionnr']) || $_SESSION['sessionnr'] != session_id()) {
header("Location:logind.php");
}
?>