<!--detta är slutproject-->
<html>
<body>
<head><title>Chatboard</title></head> <!--knapp tilll Att göra ett konto-->
<?php

if(!isset ($_COOKIE['user']))
{
    header("location:startsida.php"); #Skickat tillbaka personer som inte är inloggade
}
echo 'WELCOME '.$_COOKIE['user'];

?>

<form action="lägger-upp-inlägg.php" method="POST">

<br>
Gör ett inlägg <BR><input type="text" name="inlägg"><BR><BR> <!--skapar en ruta där du kan göra ett inlägg-->

<input type="submit">
</form>

<br>


<form action="startsida.php" method="GET"> 
Startsida  <input type="submit">
</form>

</body>
</html>

<?php
$db = new SQLite3('inlägg.sq3');
$allInputQuery = "SELECT * FROM inlägg ORDER BY datum desc, timestamp desc;";
$allInlägg = $db-> query($allInputQuery);

while($row = $allInlägg->fetchArray(SQLITE3_ASSOC))
{

    $inlägg = $row['inlägg'];   #sparar inlägget
    $user = $row['epost'];      #sparar användaren
    $date = $row['datum'];      #sparar datum
    $time = $row['timestamp'];  #sparar tiden

    #skriver ut allt som sparats
    echo $inlägg."<Br>from     ".$user."   <br>date:  ".$date.". At: ". $time;
    echo '<br><br>';
    

}
    

?>
