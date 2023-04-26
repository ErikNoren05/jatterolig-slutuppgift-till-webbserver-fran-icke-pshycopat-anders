<!--detta är slutproject-->
<html>
<body>
<head><title>Chatboard</title></head> <!--knapp tilll Att göra ett konto-->
<?php

echo 'WELCOME '.$_COOKIE['user'];

?>

<form action="lägger-upp-inlägg.php" method="POST">

<br>
Gör ett inlägg <BR><input type="text" name="inlägg"><BR><BR> <!--skapar en ruta där du kan göra ett inlägg-->


<input type="submit"><BR><BR>
</form>

<br>
<br>

<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>

</body>
</html>
