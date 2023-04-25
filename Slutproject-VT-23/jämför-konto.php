<!--Slutuppgift-->
<?php



$db = new SQLite3('tal.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM Users"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempEpost = $_POST["epost"]; #user epost
$tempLösen = $_POST["lösenord"]; #users lösenord

while($row = $userList->fetchArray(SQLITE3_ASSOC))
{
	$tempExEpost = $row['epost'];
	$tempExLösen = $row['lösen'];
	
	if($tempExEpost == $tempEpost)
	{
		if($tempExLösen == $tempLösen)
		{
		setcookie("user", $tempEpost, time()+(86400*30),'/');
	 	header("location:chatboard.php"); #fortsätt här, här är fel
		}

	}
}

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