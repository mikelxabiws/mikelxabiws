<?php
require_once('lib/nusoap.php');

$client = new nusoap_client("https://mikelxabiws.000webhostapp.com/proba/egiaztatuPasahitza.php?wsdl",true); // Create a instance for nusoap client

$error  = $client->getError();
 
if ($error) {
     echo "<h2>Errorea soap-arekin</h2>".$error;
}

 $p = $_POST["pass"];

$result = $client->call("getPasahitzaZuzena", array("type" => $p));


 
if($result=='BALIOGABEA'){echo 'BALIOGABEA';}
else{echo 'BALIOZKOA';}
?>