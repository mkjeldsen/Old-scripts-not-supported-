<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
	require('tjeklogin.php');

	if ($_SESSION['Status'] != 'admin') {
		echo $_SESSION['Status'];
		echo "<br />Du kan ikke oprette brugere.<br />Kontakt admin for hjælp.<br /><br /><a href=\"add.php\">Tilbage</a>";
	} else {

	include('include.php');

	mysql_select_db($database, $db);

	$res = mysql_query("select id, navn from users order by id asc");
		while($data = mysql_fetch_array($res)){
			if ($_SESSION['Status'] == 'admin') {
				$stat = 'a';
			} elseif ($_SESSION['Status'] == 'coadmin') {
				$stat = 'c';
			}
			echo $data['navn']."(".$stat.") | <a href=\"delu.php?id=".$data['id']."\">Slet bruger</a> | <a href=\"chpwd.php?id=".$data['id']."\">Change PWD</a><br />";
		}
?>

<!--
Newsscript by Michael Kjeldsen aka exp
website: www.firewerx.dk
email: exp@firewerx.dk
->

<hr>
<div class="overskrift">Tilføj bruger</div><br />
<a href="logud.php" title="Log ud">Log ud</a><br />

<form name="addnew" method="post" action="adduser.php">
<div class="addtitle">Brugernavn:</div><input class="input" type="text" name="newusername" value="Brugernavn indtastes her" size="20" maxlength="20" onfocus="this.select()"><br>
<div class="addtitle">Password:</div><input class="input" type="text" name="newpassword" value="Password indtastes her" onfocus="this.select()"><br>

<div class="addtitle"></div><input class="input" type="submit" name="submit" value="Tilføj">

</form>
<?php
	}
?>