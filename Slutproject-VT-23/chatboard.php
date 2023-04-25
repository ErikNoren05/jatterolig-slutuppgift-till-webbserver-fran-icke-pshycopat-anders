<!--Detta är Slut(på engelska inte på svenska//sebbe)project-->
<html>
<body>
<head><title>Chatboard</title></head> <!--knapp tilll Att göra ett konto-->
<?php

echo 'WELCOME '.$_COOKIE['user'];

?>

<br><br><form action="lägger-upp.php" method="GET"> <!--skapar knapp till att logga in-->
Gör ett inlägg <input type="submit">
</form>

<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>

</body>
</html>
