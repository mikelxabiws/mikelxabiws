<?php

$host='localhost';
$user='id3109760_mikelxabiws';
$pass='#ws2017#';
//$user='root';
//$pass='';
//$db='quiz';
$db='id3109760_quiz';

$con=mysqli_connect($host, $user, $pass, $db);
if(!$con){
	echo 'Ezin izan da konexioa egin datu basearekin.';
	die;
}

?>