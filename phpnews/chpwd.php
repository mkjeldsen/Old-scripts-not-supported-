<?php
	/*
	Copyright notice:
	Newsscript by Michael Kjeldsen aka exp
	website: www.firewerx.dk
	*/

	
	require('tjeklogin.php');

	if($_SESSION['Status'] != 'admin') {
		echo "Sorry, no can do!";
	} else {
		include('include.php');
		mysql_select_db($database, $db) or die ("Kunne ikke finde db'en");

		$seSQL = "select * from users where id = $id";
		$data = mysql_query($seSQL);
		$var = mysql_fetch_Array($data);
		$bruger = $var["navn"];

?>

<!--
Newsscript by Michael Kjeldsen aka exp
website: www.firewerx.dk
email: exp@firewerx.dk
->

<div class="overskrift">Change Password</div><br />
<a href="newuser.php" title="Opret ny bruger">Tilbage</a> | <a href="logud.php" title="Log ud">Log ud</a><br />

<form name="chpwd" method="post" action="pwd.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="chusername" value="<?php echo $bruger; ?>">
<div class="addtitle">Brugernavn:</div><?php echo $bruger; ?><br />
<div class="addtitle">Password:</div><input type="text" name="chpassword"><br>

<div class="addtitle"></div><input class="input" type="submit" name="submit" value="Opdatér">

</form>

<?php
	}
?>