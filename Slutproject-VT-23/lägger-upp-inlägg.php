<!--Slutproject-->

<?php
if(!isset ($_COOKIE['user']))
{
    header("location:startsida.php"); #fortsätt här, här är fel
}

$db = new SQLite3('inlägg.sq3'); #öppnar databasen
$db->exec("CREATE TABLE IF NOT EXISTS Inlägg(id integer primary key  autoincrement, inlägg text, epost text, blockerade text, datum text, timestamp text)"); #Skapa tabellen för att spara inlägg 
$allInputQuery = "SELECT * FROM Inlägg"; #välj allt från inlägg
$inläggList = $db->query($allInputQuery); #en ny array som innehåller all information

$tempText = $_POST["inlägg"];

$db ->exec("INSERT INTO inlägg(inlägg, epost, datum, timestamp) VALUES('".$tempText."','".$_COOKIE['user']."','".date("Y.M.D")."','".date("H.i.sa")."')");#spara inlägg, användare, datum och tid 

?>
<html>
<form action="chatboard.php">
<input type ="submit" method="GET";
</form>
</html>
<?php
#header("locatin: chatboard.php"); #skickar dig till chatboard

?>
