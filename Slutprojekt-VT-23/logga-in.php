<!--Slutuppgift-->
<html>
<body>
<head><title>Logga in</title></head>
<form action="jämför-konto.php" method="POST">

Skriv Epost <BR>
<input type="string" name="epost"><BR><BR> <!--skapar en ruta där användaren får skriva in sin epost-->

<!--skapar en ruta där användaren får skriva in sitt lösenord-->
Skriv lösenord 
<BR><input type="password" name="lösenord"><BR><BR> <!--lösenordet syns inte utan är bara svarta punkter tack vare input type password-->

<input type="submit"><BR><BR>
</form>

<form action ="startsida.php" method="POST">
Starsida<BR><input type="submit"><br><br><br>
</form>

<form action="skapa-konto.php" method="POST">
inget konto idiot? <br>
klicka här <br> 
<input type="submit">
</form>

</body>
</html>
