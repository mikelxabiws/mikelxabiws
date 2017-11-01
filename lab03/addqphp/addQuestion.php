<?php

$host='localhost';
//$user='id3109760_mikelxabiws';
//$pass='#ws2017#';
$user='root';
$pass='';
$db='quiz';

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


$igo=true;
if (preg_match('/[A-Za-z]{3,}[0-9]{3}@ikasle\.ehu\.eu?s/', $eposta)) {
	
}else{
	echo "Errorea epostarekin, jasotako eposta ez du formatu zuzena. Jasotako eposta: " . $eposta;
    echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($galdera == '') {
	echo "Errorea galderarekin, ezin da galdera hutsa sartu.";
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($erantzunZuzena == '') {
	echo "Errorea erantzun zuzenarekin, ezin da erantzun hutsa sartu.";
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($erantzunOkerra1 == '') {
	echo "Errorea lehenengo erantzun okerrarekin, ezin da erantzun hutsa sartu.";
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($erantzunOkerra2 == '') {
	echo "Errorea bigarren erantzun okerrarekin, ezin da erantzun hutsa sartu.";
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($erantzunOkerra3 == '') {
	echo "Errorea hirugarren erantzun okerrarekin, ezin da erantzun hutsa sartu.";
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($zailtasuna == 1 || $zailtasuna == 2 || $zailtasuna == 3 || $zailtasuna == 4 || $zailtasuna == 5) {
}else{
	echo "Errorea galderaren zailtasunarekin; 1, 2, 3, 4 edo 5 balorea jaso behar da. Jasotako balorea: " . $zailtasuna;
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if ($arloa == '') {
	echo "Errorea arloarekin, ezin da arlo hutsa sartu.";
	echo "<br />\n";
	echo "------------------------------------------------------------------";
	echo "<br />\n";
	$igo=false;
}

if($igo){
	
	$sql="insert into Questions (eposta, galdera, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, arloa) values ('$eposta','$galdera','$erantzunZuzena','$erantzunOkerra1','$erantzunOkerra2','$erantzunOkerra3','$zailtasuna','$arloa')";
	$query=mysqli_query($con, $sql);
	if($query){
		echo 'Datuak gorde dira datu basean, datu basean dauden galderak ikusteko egin klik ';
		echo "<a href='showQuestions.php'>hemen</a>";
	}else{
		echo 'Ezin izan dira datuak gorde datu basean, galdera berri bat igo nahi baduzu egin klik ';
		echo "<a href='addQuestion.html'>hemen</a>";
	}
	
}else{
	echo 'Ez da galdera sartu datu basean, galdera berri bat igo nahi baduzu egin klik ';
	echo "<a href='addQuestion.html'>hemen</a>";
}



$con->close();

?>