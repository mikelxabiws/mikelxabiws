<?php

$host='localhost';
$user='id3109760_mikelxabiws';
$pass='#ws2017#';
$db='id3109760_quiz';

$con=mysqli_connect($host, $user, $pass, $db);
if($con){
	echo 'Datu basearekin konexioa egin da';
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
}else{
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	echo 'Ezin izan da konexioa egin datu basearekin, galdera igotzen berriz saiatzeko egin klik ';
	echo "<a href='addQuestion.html'>hemen</a>";
	die;
}

$eposta=$_POST["eposta"];
$galdera=$_POST["galdera"];
$erantzunZuzena=$_POST["erZuzen"];
$erantzunOkerra1=$_POST["erOker1"];
$erantzunOkerra2=$_POST["erOker2"];
$erantzunOkerra3=$_POST["erOker3"];
$zailtasuna=$_POST["puntuazioa"];
$arloa=$_POST["arloa"];




$sql="insert into Questions (eposta, galdera, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, arloa) values ('$eposta','$galdera','$erantzunZuzena','$erantzunOkerra1','$erantzunOkerra2','$erantzunOkerra3','$zailtasuna','$arloa')";
$query=mysqli_query($con, $sql);
if($query){
	echo 'Datuak gorde dira datu basean, datu basean dauden galderak ikusteko egin klik ';
	echo "<a href='showQuestions.php'>hemen</a>";
}else{
	echo 'Ezin izan dira datuak gorde datu basean, galdera berri bat igo nahi baduzu egin klik ';
	echo "<a href='addQuestion.html'>hemen</a>";
}

$con->close();

?>