<!--Slutuppgift-->
<?php

$db = new SQLite3('user.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM Users"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempEpost = $_POST["epost"]; #user epost
$tempLösen = $_POST["lösenord"]; #users lösenord
$tempLösen = hash('sha3-512',$tempLösen);

while($row = $userList->fetchArray(SQLITE3_ASSOC))
{
	$tempExEpost = $row['epost']; #sparar alla eposts
	$tempExLösen = $row['lösen'];
	#echo $tempLösen.'<br>';
	#echo $tempExLösen.'<br>';
	#echo $tempEpost.'<br>';
	#echo $tempExEpost.'<br>';
	
	

	if($tempExEpost == $tempEpost) #kollar om eposten finns i databasen
	{
		if($tempExLösen == $tempLösen) #kollar om lösenordet finns i databasen
		{
		setcookie("user", $tempEpost, time()+(86400*30),'/'); #cookie loggar in dig i en månad
	 	header("location:chatboard.php");  #skickar dig till chatboarden 
		}

	}
	else if($tempEpost == "Admin") #admins sätt att logga in, skriv användarnamn till 'admin'
	{
		if($tempLösen == hash('sha3-512','admin')) #admins lösenord är 'admin'
		{
			setcookie("user", $tempEpost, time()+(86400*30),'/');
			header("location: adminBoard.php");
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