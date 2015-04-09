<html>
<head><title>exp's simple nyhedssystem</title></head>
<body>

<!--
Newsscript by Michael Kjeldsen aka exp
website: www.firewerx.dk
->

<?php 
	include('include.php');
	include('tagster_lib.php');
	mysql_select_db($database, $db);

	echo "<hr>";

	$res = mysql_query("select overskrift, text from news where status = '1' order by id desc limit ".$numofposts);
		while($data = mysql_fetch_array($res)){
			echo "<b>".stripslashes(trim(nl2br($data['overskrift'])))."</b><br>".tagster_format(stripslashes(trim($data[text])))."<hr>";
		}

	mysql_close();
?>
</body></html>
