<html>
<body>
<head><title>BÖG AB</title></head>

<?php
if(!isset ($_COOKIE['user']))
{
    header("location:startsida.php"); #fortsätt här, här är fel
}
echo 'WELCOME '.$_COOKIE['user'];
?>

<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>
</hmtl>