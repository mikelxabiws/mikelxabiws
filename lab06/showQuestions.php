<?php
include('connection.php');//Datu basearekin konexioa egin

$sql = "SELECT * FROM `Questions`";
$result = $con->query($sql);

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


if ($result->num_rows > 0) {
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
    echo "0 results";
}

echo"<tbody>";
echo"</table>";

echo "<br />\n";echo "<br />\n";
echo "<a href='layoutErreg.php'>Layout-era itzuli</a>";
echo "<br />\n";
echo "<a href='addQuestion.php'>Galdera bat igo</a>";

$con->close();

?>