<?php
include_once 'sesioa.php';
if (isset($_SESSION['eposta'])){
	echo 'Jada logeatuta zaude kontu batekin. Beste kontu batekin login egiteko lehenengo logout egin ezazu.';
	echo '</br><p><a href="layout.php">Layout-era bueltatu</a></p>';
	exit;
}
	
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log in</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>

        <form id="logInF" name="logInF" method="post" action="" onsubmit="return validateMyForm();">
			<legend>LOGIN</legend>
			<fieldset>
				<h3>Bete ondorengo hutsuneak login egiteko:</h3> <br/>
				Eposta: <input type="text" id="eposta" name="eposta" placeholder="iabizenaXXX@ikasle.ehu.e(u)s"><br/><br/>
				Pasahitza: <input type="password" id="pass" name="pass" ><br/><br/>
				<input type="submit" value="Login"> 
            
				<p><a href='layout.php'>Layout-era bueltatu</a></p>
			</fieldset>
        </form>

        <script>
            
			function validateMyForm(){
				if(($("#eposta").val()!=="")&&($("#pass").val()!=="")){ 
						return true;
				}else{
					alert("Hutsune guztiak betetzea beharrezkoa da!");
					ezabatu();
					return false;
				}
			}
			
			function ezabatu(){
				$("#pass").val("");	
			}
            
        </script>
		
		<?php 
			
			if (isset($_POST['eposta']) && isset($_POST['pass'])){
				
				include('connection.php');//Datu basearekin konexioa egin
				
				$eposta = $_POST["eposta"];
				$pasahitza = $_POST['pass'];
				
				$sql="SELECT `eposta`,`pasahitza` FROM `erabiltzaile` WHERE `eposta`='$eposta'";
				
				$query=mysqli_query($con, $sql);
				$result = $con->query($sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row["pasahitza"]==$pasahitza){
							$_SESSION['eposta']=$row["eposta"];
							echo "Kaixo, login-a zuzen egin duzu.";
							echo "<br />\n";
							echo "Hasierako orrira joan nahi baduzu egin klik ";
							echo "<a href='layout.php'>hemen</a>";
							echo "<br />\n";
							echo "Galdera bat igotzeko egin klik ";
							echo "<a href='addQuestion.php'>hemen</a>";
							echo "<br />\n";
							echo "Galderak ikusi nahi badituzu egin klik hemen ";
							echo "<a href='showQuestions.php'>hemen</a>";
						}else{
							echo "Sartutako pasahitza ez da zuzena " . $eposta . " epostarako. Saiatu berriro.";
						}
					}
				}else{
					echo "Sartutako eposta (" . $eposta . ") ez dago erregistratua. Saiatu berriro.";
				}
				
				
			}
		?>

</html>