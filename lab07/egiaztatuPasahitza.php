<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');


$ns="https://mikelxabiws.000webhostapp.com/lab7/egiaztatuPasahitza.php?wsdl";
$server = new soap_server();
$server->configureWSDL("passservice", $ns);
$server->wsdl->schemaTargetNamespace=$ns; 

$server->register("getPasahitzaZuzena",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
	$ns);
 
 
 function getPasahitzaZuzena($pass) {
		$search = (string) $pass;
		$file = file('toppasswords.txt');
		foreach($file as $line) {
			$line = trim($line);
			if($line == $search) {
				return "BALIOGABEA";
			}
		}
		return "BALIOZKOA";
    }
 
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
@$server->service(file_get_contents("php://input"));
?>
