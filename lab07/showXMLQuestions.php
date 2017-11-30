<?php
$xml=simplexml_load_file("questions.xml") or die("Errorea: Ezin izan da XML fitxategia kargatu");

echo"<table border=1>";
echo"<thead>";
echo"<tr>";
echo"<th>Galdera</th>";
echo"<th>Zailtasuna</th>";
echo"<th>Arloa</th>";
echo"</tr>";
echo"</thead>";
echo"<tbody>";

foreach($xml->children() as $questions) {
	$galdera=$questions->itemBody->p;
	$zailtasuna=$questions['complexity'];
	$arloa=$questions['subject'];
	
	echo"<tr>";
	echo"<td>$galdera</td>";
	echo"<td>$zailtasuna</td>";
	echo"<td>$arloa</td>";
	echo"<tr>";
} 

echo"<tbody>";
echo"</table>";

echo "<br />\n";echo "<br />\n";
echo "<a href='layout.php'>Layout-era itzuli</a>";
echo "<br />\n";
echo "<a href='addQuestion.php'>Galdera bat igo</a>";

?>