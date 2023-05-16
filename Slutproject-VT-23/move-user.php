
<!--Funkar inte rad 14 eller nått -->
<!--<html> -->
<?php
$kör = true;
$tempEpost = $_POST["Epost"];
$tempLösen = $_POST["password"];

echo "epost ".$tempEpost."<BR>";
echo "lösen $tempLösen";

$db = new SQLite3('Users.sq3');
$allInputQuery = "SELECT * FROM Users";

$db->exec("INSERT INTO user(epost, lösen) VALUES('".$tempEpost."','".$tempLösen."')"); #lägger in epost 	och lösenord i respektive kolumn
echo 'Konto skapat';
if($kör==true)
{
	#header("location: adminBoard.php");
}

?>

?>
</html>