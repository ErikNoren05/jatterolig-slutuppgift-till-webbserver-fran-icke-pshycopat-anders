<!--slutproject-->
<!--Här kollas konton och om allt stämmer så skapas ett konto här-->

<?php
$tempEpost = $_POST["epost"]; #Spara det användaren satt som fråga
$tempLösen = $_POST["lösenord"]; #spara den användaren satt som svar
$tempKontrollLösen = $_POST["kontroll-lösen"]; #spara kontroll lösenordet som är 
$hayball = false; #behövs så att redirect inte aktiveras direkt

if($tempLösen === $tempKontrollLösen)
{
 	$hayball=true;
}
else
{
	echo 'you did Wrong';?>
	
	<html>
	<form action = "startsida.php" method ="POST">
	<BR>Startsida <input type="submit">
	</form>
	</html>
	<?php
}

if($hayball==true)
{
	$db = new SQLite3('tal.sq3'); #öppnar databasen
	$db->exec("CREATE TABLE IF NOT EXISTS Users(epost text uniqe, lösen text, följare text, följer text, 	blockerade text)"); #Skapa tabellen för fråga och svar 
	$db->exec("INSERT INTO Users(epost, lösen) VALUES('".$tempEpost."','".$tempLösen."')"); #lägger in epost 	och lösenord i respektive kolumn
	echo 'Konto skapat';?><BR><BR>
	<html>
	<form action="Startsida.php" method="POST">
	Starsida<BR><input type="submit">
	</html>
	<?php
}
?>
