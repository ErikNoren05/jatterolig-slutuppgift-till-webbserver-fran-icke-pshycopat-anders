<!--Slutuppgift-->
<html>
<body>
<head><title>Skapa konto</title></head>
<form action="gör-konto.php" method="POST">

Skriv Epost <BR>
<input type="string" name="epost"><BR><BR> <!--skapar en ruta där användaren får skriva in fråga-->

<!--skapar en ruta där användaren får skriva in sitt lösenord-->
Skriv lösenord 
<BR><input type="password" name="lösenord"><BR><BR> <!--lösenordet syns inte utan är bara svarta punkter tack vare input type password-->

Skriv lösenord igen <BR><input type="password" name="kontroll-lösen"><BR><BR> <!--skapar en ruta där användaren får skriva in sitt lösenord igen-->

<input type="submit">
</form>
</body>
</html>
