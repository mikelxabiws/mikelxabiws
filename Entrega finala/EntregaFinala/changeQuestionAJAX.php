<?php

include('connection.php');//Datu basearekin konexioa egin

$id=$_POST["id"];
$galdera=$_POST["galdera"];
$erantzunZuzena=$_POST["erZuzen"];
$erantzunOkerra1=$_POST["erOker1"];
$erantzunOkerra2=$_POST["erOker2"];
$erantzunOkerra3=$_POST["erOker3"];
$zailtasuna=$_POST["puntuazioa"];
$arloa=$_POST["arloa"];



$sql="update Questions set galdera='$galdera', erantzunZuzena='$erantzunZuzena', erantzunOkerra1='$erantzunOkerra1', erantzunOkerra2='$erantzunOkerra2', erantzunOkerra3='$erantzunOkerra3', zailtasuna='$zailtasuna', arloa='$arloa' where id=".$id;
	

	if ($con->query($sql) === TRUE) {
		echo "Galdera aldatu da";
	} else {
		echo "Errorea galdera gordetzen: " . $con->error;
	}

$con->close();


?>
