<?php

include('connection.php');//Datu basearekin konexioa egin

$id=$_POST["id"];


$sql="delete from Questions where id=".$id;
	

	if ($con->query($sql) === TRUE) {
		echo "Galdera borratu da";
	} else {
		echo "Errorea galdera borratzean: " . $con->error;
	}

$con->close();


?>
