<!--detta är slutproject-->
<html>
<body>
<head><title>Chatboard</title></head> <!--knapp tilll Att göra ett konto-->
<?php

if(!isset ($_COOKIE['user']))
{
    header("location:startsida.php"); #fortsätt här, här är fel
}
echo 'WELCOME '.$_COOKIE['user'];

?>

<form action="lägger-upp-inlägg.php" method="POST">

<br>
Gör ett inlägg <BR><input type="text" name="inlägg"><BR><BR> <!--skapar en ruta där du kan göra ett inlägg-->

<input type="submit">
</form>

<br>
<br>

<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>

</body>
</html>
