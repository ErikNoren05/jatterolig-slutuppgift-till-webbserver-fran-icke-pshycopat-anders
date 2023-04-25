<!--Detta är Slut(på engelska inte på svenska//sebbe)project-->
<html>
<body>
<head><title>Startsida</title></head> <!--knapp tilll Att göra ett konto-->

<?php
setcookie("user", "Terminator", time()-60,'/'); #loggar ut cookies 
?>

<form action="skapa-konto.php" method="POST"> 
Skapa Konto <input type="submit">
</form>

<form action="logga-in.php" method="POST"> <!--skapar knapp till att logga in-->
Logga in <input type="submit">
</form>
</body>
</html>
