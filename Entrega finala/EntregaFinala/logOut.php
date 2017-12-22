<?PHP 

session_start();
session_destroy();
header("Location: layout.php");
exit;

?>