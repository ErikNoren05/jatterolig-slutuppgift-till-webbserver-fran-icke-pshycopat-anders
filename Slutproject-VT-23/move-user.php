
<!--Funkar inte rad 14 eller nått -->
<!--<html> -->
<?php
$välkommenMedelande = "du är nu med din det coola gänget";
$kör = true;
$tempEpost = $_POST["Epost"];
$tempLösen = $_POST["password"];
$godkänd = $_POST["knapp"];

echo $godkänd."<br>";

#echo "epost ".$tempEpost."<BR>";
#echo "lösen $tempLösen";

$db = new SQLite3('User.sq3');
$allInputQuery = "SELECT * FROM Users";


$db_Waiting = new SQLite3('users_Waiting.sq3');
$allInputQuery_Waiting = "SELECT * FROM users_Waiting";

if($godkänd =="godkänd")
{
	$db->exec("INSERT INTO Users(epost, lösen) VALUES('".$tempEpost."','".$tempLösen."')"); #lägger in epost 	och lösenord i respektive kolumn
	$db_Waiting->exec("DELETE FROM users_Waiting Where epost ='$tempEpost'");	
}
else if($godkänd =="inte godkänd")
{
	$db_Waiting->exec("DELETE FROM users_Waiting Where epost ='$tempEpost'");	
}

#Detta skulle skicka mail, men eftersom någon(anders) inte vet hur localport funkar
#så kan vi itne skicka mail. Han borde kanske veta hur man gör innan 
#vi får uppgifter. 

#Mail("$tempEpost", "You're in", $välkommenMedelande); 

echo 'Något gick fel. Kontakta support: 1177. På helger: 112';
if($kör==true)
{
	header("location: adminBoard.php");
}



?>


</html>



<!--
	'".hash('sha3-512',$tempPassword)."'')"
-->