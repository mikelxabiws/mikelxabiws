<?PHP 

session_start();
if (empty($_SESSION['eposta'])){
	$_SESSION['galderak']=array();
}
header("Location: onePlay.php");
exit;

?>