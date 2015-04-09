<html><head><title>Log ind med php og mysql</title></head> 

<body marginwidth="100" leftmargin="100"> 

<!--
Newsscript by Michael Kjeldsen aka exp
website: www.firewerx.dk
->

<form action="dologin.php" method="post"> 
<input type="hidden" name="logind" value="logind">
<p><b>Indtast:</b></p> 
Brugernavn:<br> 
<input type="text" name="navn"><br> 
Password:<br> 
<input type="password" name="password"><br> 
<input type="submit" name="submit" value="Log ind"> 
</form>
<?php
if (isset($_GET['error']) && $_GET['error'] == "fejl") {
echo"<b>Fejl i brugernavn eller password!</b>";
}
?>
</body></html>
