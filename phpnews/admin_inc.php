<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
	include('include.php');
	include('tagster_lib.php');
	mysql_select_db($database, $db);

	$res = mysql_query("select id, overskrift from news where status = '1' order by id desc");
		while($data = mysql_fetch_array($res)){
			echo "<a href='?id=".$data['id']."'>".stripslashes($data['overskrift'])."</a> | <a href=\"del.php?id=".$data['id']."\">Slet</a><br>";
		}
		echo "<br>";
		if ($id) {
			$result = mysql_query("SELECT DISTINCT text FROM news WHERE id = '$id'");
				while ($stam = mysql_fetch_array($result)) {
					echo tagster_format(stripslashes(trim($stam[text])));
				}
		}

	mysql_close();
?>
