<html>
<body>
<head><title>BÖG AB</title></head>

<?php

$db = new SQLite3('users_Waiting.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM users_Waiting"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information
$i = 1;


if(!isset ($_COOKIE['user']))
{
    header("location:startsida.php"); #fortsätt här, här är fel
}
echo 'WELCOME '.$_COOKIE['user']."<br>";

while($row = $userList->fetchArray(SQLITE3_ASSOC))
{
	$tempExEpost = $row['epost']; #sparar alla eposts
	$tempExLösen = $row['lösen']; #sparar alla lösenord
	?>
    <html>
    <form action ="move-user.php" method="POST">
    <input type="checkbox" name="user".$i value=$tempExEpost method="POST"> <!--gör en checkbox för varje användare som väntar på insläpp-->
    <input type="hidden" name = "password".$i value =$tempExLösen method="POST">

   
    <?php
	echo "<br>".$tempExEpost;
    echo "<br>";
    echo $tempExLösen."<br><br>";
    $i++;
}
?>

<html>
<input type="submit" method="POST">
</form>
</html>



<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>
</html>