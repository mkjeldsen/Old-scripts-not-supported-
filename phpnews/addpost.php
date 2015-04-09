<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	include('include.php');
	mysql_select_db($database, $db);

	$overskrift = addslashes($overskrift);
	$text = addslashes($text);
	$id = $id;
	
	if ($overskrift != 'Overskrift indtastes her') {
		$overskrift = $overskrift;
	} else {
		$overskrift = $default_titel;
	}
	
    $sSQL = "INSERT INTO `news` (`id`, `overskrift`, `dato`, `text`) VALUES ('', '$overskrift', '".time()."', '$text');";
    mysql_query($sSQL);
    
    $overskrift = stripslashes($overskrift);
    $text = stripslashes($text);

	header("location: news.php");
?>
