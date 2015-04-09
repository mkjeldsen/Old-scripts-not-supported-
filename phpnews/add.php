<?php
	require('tjeklogin.php');
?>

<!--
Newsscript by Michael Kjeldsen aka exp
website: www.firewerx.dk
->

<script type="text/javascript">
<!-- Dette script og mange flere --> 
<!-- findes hos http://www.html.dk --> 
<!-- Start 

function validering()
  {
  error = 0;
  if((document.forms[0].overskrift.value=='') && (error==0))   
  {		
    alert('Tekstfeltet skal udfyldes!');
    document.forms[0].overskrift.focus();
    error = 1;		
  }			

  if(error == 0)
  document.forms[0].submit();	
  }

// Slut -->
</script>

<b>Status:</b> <?php echo $_SESSION['Status']; ?><br />
<div class="overskrift">Tilføj nyhed</div><br />
<a href="newuser.php" title="Opret ny bruger">Opret ny bruger</a> | <a href="logud.php" title="Log ud">Log ud</a><br />

<form name="addnew" method="post" action="addpost.php" onsubmit="validering();return false;">
<div class="addtitle">Overskrift:</div><input class="input" type="text" name="overskrift" value="Overskrift indtastes her" size="20" maxlength="40" onfocus="this.select()"><br>
<div class="addtitle">Tekst:</div><textarea class="input" cols="40" rows="4" name="text" onfocus="this.select()">Tekst indtastes her</textarea><br>

<div class="addtitle"></div><input class="input" type="submit" name="submit" value="Tilføj">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>

<?php
	include('admin_inc.php');
?>
</div></div></div>
