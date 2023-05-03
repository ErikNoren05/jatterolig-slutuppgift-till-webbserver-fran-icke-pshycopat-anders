<html>
<body>
<head><title>BÖG AB</title></head>

<?php

$db = new SQLite3('user.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM users_Waiting"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information



if(!isset ($_COOKIE['user']))
{
    header("location:startsida.php"); #fortsätt här, här är fel
}
echo 'WELCOME '.$_COOKIE['user'];

while($row = $userList->fetchArray(SQLITE3_ASSOC))
{
	$tempExEpost = $row['epost']; #sparar alla eposts
	$tempExLösen = $row['lösen']; #sparar alla lösenord
	
	echo $tempExEpost;
    echo "<br>";
    echo $tempExLösen;
}



?>

<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>
</hmtl>