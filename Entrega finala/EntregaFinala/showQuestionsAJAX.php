<?php
include('connection.php');//Datu basearekin konexioa egin

$eposta = $_POST["eposta"];
$sql = "SELECT * FROM `Questions` WHERE `eposta`='$eposta'";
$result = $con->query($sql);


if ($result->num_rows > 0) {
	
	echo"<table border=1>";
	echo"<thead>";
	echo"<tr>";
	echo"<th>id</th>";
	echo"<th>Eposta</th>";
	echo"<th>Galdera</th>";
	echo"<th>Erantzun zuzena</th>";
	echo"<th>Zailtasuna</th>";
	echo"<th>Arloa</th>";
	echo"</tr>";
	echo"</thead>";
	echo"<tbody>";
	
    while($row = $result->fetch_assoc()) {
        $id=$row["id"];
		$eposta=$row["eposta"];
		$galdera=$row["galdera"];
		$erantzunZuzena=$row["erantzunZuzena"];
		$zailtasuna=$row["zailtasuna"];
		$arloa=$row["arloa"];
		echo"<tr>";
		echo"<td>$id</td>";
		echo"<td>$eposta</td>";
		echo"<td>$galdera</td>";
		echo"<td>$erantzunZuzena</td>";
		echo"<td>$zailtasuna</td>";
		echo"<td>$arloa</td>";
		echo"<tr>";
	}
} else {
    echo "Eposta honek 0 galdera ditu.</br></br>";
}

echo"<tbody>";
echo"</table>";

$con->close();

?>