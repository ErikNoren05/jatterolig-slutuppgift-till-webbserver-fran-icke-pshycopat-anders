<!--Slutuppgift-->
<html>
<body>
<head><title>Skapa konto</title></head>
<form action="skapar-konto.php" method="POST">

Skriv Epost <BR>
<input type="string" name="epost"><BR><BR> <!--skapar en ruta där användaren får skriva in sin epost-->

<!--skapar en ruta där användaren får skriva in sitt lösenord-->
Skriv lösenord 
<BR><input type="password" name="lösenord"><BR><BR> <!--lösenordet syns inte utan är bara svarta punkter tack vare input type password-->

Skriv lösenord igen <BR><input type="password" name="kontroll-lösen"><BR><BR> <!--skapar en ruta där användaren får skriva in sitt lösenord igen-->

<input type="submit"><BR><BR>
</form>

<form action ="startsida.php" method="POST">
Starsida<BR><input type="submit">
</form><br>

<form action ="logga-in.php" method="POST">
Har du redan ett konto?<br>
klicka här för att logga in <br><input type="submit">	

</body>
</html>
