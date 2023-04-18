<!--svantes miniräknare-->
<?php
$db = new SQLite3('tal.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM Users"; #välj allt från users
$gamesList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempEpost = $_POST["epost"]; #user epost
$tempLösen = $_POST["lösenord"]; #users lösenord

while($row = $gamesList->fetchArray(SQLITE3_ASSOC))
{
	$tempExEpost = $row['epost'];
	$tempExLösen = $row['lösen'];
	
	if($tempExEpost == $tempEpost)
	{
		if($tempExLösen == $tempLösen)
		{
	 	header(location: chatboard.php); #fortsätt här, här är fel
		}

	}
}



#kollar om användarens Epost finns i databasen



/*
else #fel svar
{
 echo 'fel svar, du är värdelös <br>';
 echo 'Vill du ändra svaret på frågan?';?>
 <html>
 <!--skapar en knapp där du byter sida så att du kan ändra svaret. -->
 <form action = "ändra-svar.php" method="POST"> 
 <input type = "hidden" name ="förraSvar" value = "<?php echo $tempName;?>"  method="POST">
 ändra svar <input type = "submit">
 </form>
 </html>
 <?php
}*/
?>

<!--skapar en knapp för att gå tillbaka till startsidan
<html>
<body>
<head><title>Listan i PHP</title></head>
startsida<form action="startsida.php" method="POST">
<input type="submit">
</form>
BABY SHARK
<form action="lös-uppgift.php" method="POST">
lös uppgift  --><input type="submit"> 
</form>
</body>
</html>