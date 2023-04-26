<!--slutproject-->
<!--Här kollas konton och om allt stämmer så skapas ett konto här-->

<?php
$db = new SQLite3('user.sq3'); #öppnar databasen
$db->exec("CREATE TABLE IF NOT EXISTS Users(id integer primary key autoincrement, epost text unique, lösen text, följare text, följer text, 	blockerade text)"); #Skapa tabellen för fråga och svar 
$allInputQuery = "SELECT * FROM Users"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempEpost = $_POST["epost"]; #Spara det användaren satt som fråga
$tempLösen = $_POST["lösenord"]; #spara den användaren satt som svar
$tempKontrollLösen = $_POST["kontroll-lösen"]; #spara kontroll lösenordet som är 

$korrektLösen = false; #behövs så att redirect inte aktiveras direkt
$korrektEpost = false;
$continue=true;

while($row = $userList->fetchArray(SQLITE3_ASSOC))
{
	$ExistingEpost = $row['epost'];
	
	if($ExistingEpost == $tempEpost)
	{
		echo 'This epost is already registered';?>
		<html>
		<form action = "skapa-konto.php" method ="POST">
		<BR>skapa konto <input type="submit">
		</form>
		</html>
		<?php
		$continue = false;
		$korrektEpost = true;
	}
}


if($continue==true)
{
	for($i=0; $i<strlen($tempEpost ); $i++)
	{
		if($tempEpost[$i]=='@') #Kollar så att eposten har ett '@' i sig
		{
			if(strlen($tempLösen)>0)
			{
				
				if($tempLösen === $tempKontrollLösen) #kollar så att lösen är samma i båda 						kolumnerena innan
				{
 					$korrektLösen=true; #behövs för att skriptet inte ska gå bananas och 							skicak användaren till startsidan dirket
					$korrektEpost=true;
				}
				else
				{
					$korrektEpost = true;
					echo 'Your password is wrong, try again';?>
			
					<html>
					<form action = "skapa-konto.php" method ="POST">
					<BR>skapa konto <input type="submit">
					</form>
					</html>
					<?php
				}
			}
			else
			{
				echo 'Du skrev inget lösenord din βλάκας';
				$korrektEpost = true;?>
				
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
}


if($korrektLösen==true)
{
	
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
