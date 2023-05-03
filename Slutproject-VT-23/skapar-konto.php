<!--slutproject-->
<!--Här kollas konton och om allt stämmer så skapas ett konto här-->

<?php
$db = new SQLite3('user_Waiting.sq3'); #öppnar databasen
$db->exec("CREATE TABLE IF NOT EXISTS Users_Waiting(id integer primary key autoincrement, epost text unique, lösen text, följare text, följer text, blockerade text)"); #Skapa tabellen för fråga och svar 
$allInputQuery = "SELECT * FROM Users_Waiting"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempEpost = $_POST["epost"]; #Spara det användaren satt som fråga
$tempLösen = $_POST["lösenord"]; #spara den användaren satt som svar
$tempKontrollLösen = $_POST["kontroll-lösen"]; #spara kontroll lösenordet som är 
$kontrollCom = '.com';
$rightEpost = strpos($tempEpost, $kontrollCom);

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
			if($rightEpost === false) #kollar så att eposten har '.com' i sig, funkar inte just nu. 
			{
				echo 'ny rad dålig kod';
			}
			else if(strlen($tempLösen)>0)
			{
					
				if($tempLösen === $tempKontrollLösen) #kollar så att lösen är samma i båda 						kolumnerena innan
				{
					$korrektLösen=true; #bekräftar att lösenordet är rätt
					$korrektEpost = true; #bekräftar att eposten är rätt				
				}
				else
				{
					$korrektEpost = true;
					echo 'Your password is wrong, try again';?>

					<html>
					<form action = "skapa-konto.php" method ="POST">
					<BR>testa igen <input type="submit">
					</form>
					</html>
	
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
				<form action = "skapa-konto.php" method ="POST">
				<BR>testa igen <input type="submit">
				</form>
				</html>
	
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


if($korrektLösen==true && $korrektEpost==true)
{
	
	$db->exec("INSERT INTO Users_Waiting(epost, lösen) VALUES('".$tempEpost."','".$tempLösen."')"); #lägger in epost 	och lösenord i respektive kolumn
	echo 'Konto skapat';?><BR><BR>
	<html>
	<form action="Startsida.php" method="POST">
	Starsida<BR><input type="submit">
	</html>
	<?php
}
else if($korrektEpost==false)
{
	echo'you email is wrong';?><BR><BR>
	
	<html>
	<form action = "skapa-konto.php" method ="POST">
	<BR>testa igen<br> <input type="submit">
	</form>
	</html>

	<html>
	<form action="Startsida.php" method="POST">
	Starsida<BR><input type="submit">
	</html>
	<?php
	
}
?>
