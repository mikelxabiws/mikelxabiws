<?php
    require_once('lib/nusoap.php');
    $client = new nusoap_client("http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl");
    $error = $client->getError();
    if($error){
        echo "<h2>Errorea soap-arekin</h2>";
    }
	
	$ep = $_POST["eposta"];
	
    $result = $client->call("egiaztatuE", array("type" => $ep));
	
    echo $result;
?>