<!--Slutuppgift-->
<?php

$db = new SQLite3('user.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM Users"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempEpost = $_POST["epost"]; #user epost
$tempLösen = $_POST["lösenord"]; #users lösenord

while($row = $userList->fetchArray(SQLITE3_ASSOC))
{
	$tempExEpost = $row['epost']; #sparar alla eposts
	$tempExLösen = $row['lösen']; #sparar alla lösenord
	
	if($tempExEpost == $tempEpost) #kollar om eposten finns i databasen
	{
		if($tempExLösen == $tempLösen) #kollar om lösenordet finns i databasen
		{
		setcookie("user", $tempEpost, time()+(86400*30),'/'); #cookie loggar in dig i en månad
	 	header("location:chatboard.php");  #skickar dig till chatboarden 
		}

	}
	else if($tempExEpost == Admin)
	{
		if($tempExLösen == Admin)
		{
			setcookie("Admin", $tempEpost, time()+(86400*30),'/');
			header("loacation:")
		}
	}
	
}

echo 'Din epost eller lösenord är fel';?>
<html>
<form action="logga-in.php" >
testa igen <input type="submit" method="GET">
</form>
</html>
<html>
har du ingen konto?
<form action="skapa-konto.php" >
Registrera dig <input type="submit" method="GET">
</form>
</html>
<?php
	

?>
</form>
</body>
</html>







<!--
<?php

#kod häer

?>
  	<html>
		anna kod här
	</hmlt>

<?php
#mer kod här
  ?>

  -->