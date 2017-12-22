<?php

include('connection.php');//Datu basearekin konexioa egin

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
    echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($galdera == '') {
	echo "Errorea galderarekin, ezin da galdera hutsa sartu.";
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($erantzunZuzena == '') {
	echo "Errorea erantzun zuzenarekin, ezin da erantzun hutsa sartu.";
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($erantzunOkerra1 == '') {
	echo "Errorea lehenengo erantzun okerrarekin, ezin da erantzun hutsa sartu.";
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($erantzunOkerra2 == '') {
	echo "Errorea bigarren erantzun okerrarekin, ezin da erantzun hutsa sartu.";
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($erantzunOkerra3 == '') {
	echo "Errorea hirugarren erantzun okerrarekin, ezin da erantzun hutsa sartu.";
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($zailtasuna == 1 || $zailtasuna == 2 || $zailtasuna == 3 || $zailtasuna == 4 || $zailtasuna == 5) {
}else{
	echo "Errorea galderaren zailtasunarekin; 1, 2, 3, 4 edo 5 balorea jaso behar da. Jasotako balorea: " . $zailtasuna;
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if ($arloa == '') {
	echo "Errorea arloarekin, ezin da arlo hutsa sartu.";
	echo "\n";
	echo "------------------------------------------------------------------";
	echo "\n";
	$igo=false;
}

if($igo){
	//Galdera datu basean sartu
	$sql="insert into Questions (eposta, galdera, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, arloa) values ('$eposta','$galdera','$erantzunZuzena','$erantzunOkerra1','$erantzunOkerra2','$erantzunOkerra3','$zailtasuna','$arloa')";
	$query=mysqli_query($con, $sql);
	if($query){
		echo 'Galdera gorde da datu basean';
		
		/////////////////////////////////////////////////////////////
		//Galderak questions.xml fitxategian saru
		/////////////////////////////////////////////////////////////
		$assessmentItems = new SimpleXMLElement('questions.xml', null, true);

		//galdera objektua sortu
		$assessmentItem = $assessmentItems->addChild('assessmentItem');

		//atributuak gehitu liburuari (zailtasuna eta gaia)
		$assessmentItem->addAttribute('complexity', $zailtasuna);
		$assessmentItem->addAttribute('subject', $arloa);
	
		//"semeak" gehitu (galdera, erantzun zuzena eta erantzun okerrak)
		//galdera
		$itemBody = $assessmentItem->addChild('itemBody');
		$itemBody->addChild('p',$galdera);

		//erantzun zuzena
		$correctResponse = $assessmentItem->addChild('correctResponse');
		$correctResponse->addChild('value',$erantzunZuzena);

		//erantzun okerrak
		$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
		$incorrectResponses->addChild('value', $erantzunOkerra1);
		$incorrectResponses->addChild('value', $erantzunOkerra2);
		$incorrectResponses->addChild('value', $erantzunOkerra3);

		//aldaketak gorde	
		$assessmentItems->asXML('questions.xml');
		///////////////////////////////////////////////////////////////
		
		echo "\n";
		echo "Galdera gorde da questions.xml fitxategian";
		echo "\n";
		echo "Beste galdera bat gehitzeko bete berriro formularioa eta bidali.";
	}else{
		echo 'Ezin izan dira datuak gorde datu basean, galdera berri bat igo nahi baduzu bete berriz formularioa';
	}
	
}else{
	echo 'Ez da galdera sartu datu basean, galdera berri bat igo nahi baduzu bete berriz formularioa';
}

$con->close();


?>