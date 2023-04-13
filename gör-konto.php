<!--slutproject-->
<?php
$tempName = $_POST["fråga"]; #Spara det användaren satt som fråga
$tempScore = $_POST["svar"]; #spara den användaren satt som svar
$db = new SQLite3('tal.sq3'); #öppnar databasen
$db->exec("CREATE TABLE IF NOT EXISTS tal(fråga text, svar text)"); #Skapa tabellen för fråga och svar 
$db->exec("INSERT INTO tal VALUES('".$tempName."','".$tempScore."')"); #lägger in fråga och svar i respektive kolumn
header("Location: startsida.php"); #går tillbaka till startsida
?>
