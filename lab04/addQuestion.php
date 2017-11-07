<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Galderak gehitu</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <form id="galderenF" name="galderenF" action="" onsubmit="return validateMyForm();" method="post">
            <h3>Bete ondorengo formularioa zure galdera igotzeko:</h3> <br/>
            Sartu zure eposta: <input type="text" id="eposta" name="eposta" placeholder="iabizenaXXX@ikasle.ehu.eus" pattern="[A-Za-z]{3,}[0-9]{3}@ikasle\.ehu\.eu?s"><br/><br/>
            Zure galdera: <input type="text" id="galdera" name="galdera"><br/><br/>
            Erantzun zuzena: <input type="text" id="erZuzen" name="erZuzen"><br/><br/>
            Erantzun okerra: <input type="text" id="erOker1" name="erOker1"><br/><br/>
            Erantzun okerra: <input type="text" id="erOker2" name="erOker2"><br/><br/>
            Erantzun okerra: <input type="text" id="erOker3" name="erOker3"><br/><br/>
            Galderaren zailtasuna:
			<div class="radiogroup">
				<input type="radio" id="r1" name="puntuazioa" value="1" checked> 1 
				<input type="radio" id="r2" name="puntuazioa" value="2"> 2 
				<input type="radio" id="r3" name="puntuazioa" value="3"> 3
				<input type="radio" id="r4" name="puntuazioa" value="4"> 4 
				<input type="radio" id="r5" name="puntuazioa" value="5"> 5 
			</div><br/>
            Galderaren arloa: <input type="text" id="arloa" name="arloa"><br/><br/><br/>
            <input type="submit" value="Galdera igo"> 
			<input type="button" value="Ezabatu" name="Ezabatu" onclick="ezabatu()"><br/>
            
            <p><a href='layoutErreg.html'>Layout-era itzuli</a></p>
        </form>

        <script>
            
			function validateMyForm(){
				if(($("#eposta").val()!=="")&&($("#galdera").val()!=="")&&($("#erZuzen").val()!=="")&&($("#erOker1").val()!=="")&&($("#erOker2").val()!=="")&&($("#erOker3").val()!=="")&&($("#arloa").val()!=="")&&(($("#r1").is(':checked'))||($("#r2").is(':checked'))||($("#r3").is(':checked'))||($("#r4").is(':checked'))||($("#r5").is(':checked')))){ 
					return true;
				}else{
					alert("Hutsune guztiak betetzea beharrezkoa da!");
					//event.preventDefault();
					return false;
				}
			}
			
			function ezabatu(){
				$("#eposta").val("");
				$("#galdera").val("");
				$("#erZuzen").val("");
				$("#erOker1").val("");
				$("#erOker2").val("");
				$("#erOker3").val("");
				$("#arloa").val("");
				$("#r2").prop("checked", false);
				$("#r3").prop("checked", false);
				$("#r4").prop("checked", false);
				$("#r5").prop("checked", false);
				
			}
			
            
        </script>     


		<?php
		
		
		if(isset($_POST['eposta']) && isset($_POST['galdera']) && isset($_POST['erZuzen']) && isset($_POST['erOker1']) && isset($_POST['erOker2']) && isset($_POST['erOker3']) && isset($_POST['arloa'])){

$host='localhost';
$user='id3109760_mikelxabiws';
$pass='#ws2017#';
//$user='root';
//$pass='';
//$db='quiz';
$db='id3109760_quiz';

$con=mysqli_connect($host, $user, $pass, $db);
if($con){
	echo "<br />\n";
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
	//Galdera datu basean sartu
	$sql="insert into Questions (eposta, galdera, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, arloa) values ('$eposta','$galdera','$erantzunZuzena','$erantzunOkerra1','$erantzunOkerra2','$erantzunOkerra3','$zailtasuna','$arloa')";
	$query=mysqli_query($con, $sql);
	if($query){
		echo 'Datuak gorde dira datu basean, datu basean dauden galderak ikusteko egin klik ';
		echo "<a href='showQuestions.php'>hemen</a>";
		
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
		
		echo "<br />\n";
		echo "Datuak questions.xml fitxategian gorde dira. XML fitxategiko galderak ikusteko egin klik ";
		echo "<a href='showXMLQuestions.php'>hemen</a>";
		echo "<br />\n";
		echo "------------------------------------------------------------------";
		echo "<br />\n";
		echo "Beste galdera bat gehitzeko bete berriro formularioa eta bidali.";
	}else{
		echo 'Ezin izan dira datuak gorde datu basean, galdera berri bat igo nahi baduzu egin klik ';
		echo "<a href='addQuestion.html'>hemen</a>";
	}
	
}else{
	echo 'Ez da galdera sartu datu basean, galdera berri bat igo nahi baduzu egin klik ';
	echo "<a href='addQuestion.html'>hemen</a>";
}



$con->close();


}

?>


</html>