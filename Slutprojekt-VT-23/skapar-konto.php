<!--slutproject-->
<!--Här kollas konton och om allt stämmer så skapas ett konto här-->

<?php
$tempEpost = $_POST["epost"]; #Spara det användaren satt som fråga
$tempLösen = $_POST["lösenord"]; #spara den användaren satt som svar
$tempKontrollLösen = $_POST["kontroll-lösen"]; #spara kontroll lösenordet som är 

$korrektLösen = false; #behövs så att redirect inte aktiveras direkt
$korrektEpost = false;

for($i=0; $i<strlen($tempEpost ); $i++)
{
	if($tempEpost[$i]=='@') #Kollar så att eposten har ett '@' i sig
	{
		if($tempLösen === $tempKontrollLösen) #kollar så att lösen är samma i båda kolumnerena innan
		{
 			$korrektLösen=true; #behövs för att skriptet inte ska gå bananas och skicak användaren till startsidan dirket
			$korrektEpost=true;
		}
		else
		{
			$korrektEpost = true;
			echo 'Your password is wrong, try again';?>
			
			<html>
			<form action = "startsida.php" method ="POST">
			<BR>Startsida <input type="submit">
			</form>
			</html>
			<?php
		}
	}
	else if($korrektEpost!=true)
	{
	$korrektEpost == false;
	}
	
}


if($korrektLösen==true)
{
	$db = new SQLite3('tal.sq3'); #öppnar databasen
	$db->exec("CREATE TABLE IF NOT EXISTS Users(epost text primary key, lösen text, följare text, följer text, 	blockerade text)"); #Skapa tabellen för fråga och svar 
	$db->exec("INSERT INTO Users(epost, lösen) VALUES('".$tempEpost."','".$tempLösen."')"); #lägger in epost 	och lösenord i respektive kolumn
	echo 'Konto skapat';?><BR><BR>
	<html>
	<form action="Startsida.php" method="POST">
	Starsida<BR><input type="submit">
	</html>
	<?php
}

if($korrektEpost==false)
{
	echo'you email is wrong';?><BR><BR>
	<html>
	<form action="Startsida.php" method="POST">
	Starsida<BR><input type="submit">
	</html>
	<?php
	
}
?>
