<html>
<?php

$db = new SQLite3('user.sq3'); #öppnar databas
$allInputQuery = "SELECT * FROM Users"; #välj allt från users
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

for($i=1, $i< ) #försök sortera efter id på users

$addUsers = $_POST['name'.$i];
$addUsersPassword = $_POST['password'.$i];



?>
</hmlt>