<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
	include('include.php');

	$id = $_GET['id'];

	mysql_select_db($database, $db);
	$del = "update news set status = 0 where id = $id";
    mysql_query($del);
    
    header('location:add.php');
?>
