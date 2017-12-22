<?php
include_once 'sesioa.php';
if (isset($_SESSION['eposta'])){
	echo 'Logeatuta zaude kontu batekin, beraz orrialde hau ez daukazu atzigarri.';
	echo '</br><p><a href="layout.php">Layout-era bueltatu</a></p>';
	exit;
}
if (!(isset($_SESSION['pasahitzaAldatzekoEposta']))){
	echo 'Ez daukazu orrialde honetan sartzeko baimena.';
	echo '</br><p><a href="layout.php">Layout-era bueltatu</a></p>';
	exit;
}
$eposta = $_SESSION['pasahitzaAldatzekoEposta'];
echo "<script type='text/javascript'>alert('Erantzuna zuzena da. Orain zure pasahitza aldatu ahalko duzu. Eposta: " . $eposta . "')</script>";
							

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pasahitza berrezarri</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <form id="signUpF" name="signUpF" method="post" action="" onsubmit="return validateMyForm();">
		<legend>PASAHITZA BERREZARRI</legend>
				<fieldset>
            <h3>Bete ondorengo hutsuneak zure pasahitza berria gordetzeko (Eposta: <?php echo $eposta; ?>):</h3> <br/>
            Pasahitza: <input type="password" id="pass1" name="pass1" onchange="pasahitzaAldaketa()" pattern ="([A-Za-z0-9]{6,}" title="Gutxienez 6 karaktere."><br/><br/>
            Errepikatu pasahitza: <input type="password" id="pass2" name="pass2" pattern ="[A-Za-z0-9]{6,}"><br/><br/><br/>
            <input type="submit" id="submit" value="Pasahitza aldatu"> 
        </fieldset>
		</form>
		</br>
		<div id="pasahitzaEremua">
			<a>Pasahitzari buruz...</a>
		</div></br>
		<p><a href='layout.php'>Layout-era bueltatu</a></p>
		
        <script type="text/javascript" language = "javascript">
		
			document.getElementById("submit").disabled = true;
			passZuzena=false;
			
			//pasahitzaren tratamendua
			xhrTaulaPass = new XMLHttpRequest();
			xhrTaulaPass.onreadystatechange = function(){
				if (xhrTaulaPass.readyState==4){
					if(xhrTaulaPass.responseText=="BALIOZKOA"){
						document.getElementById('pasahitzaEremua').innerHTML = "Pasahitza baliozkoa da";
						passZuzena=true;
						document.getElementById("submit").disabled = false;
					}else{
						document.getElementById('pasahitzaEremua').innerHTML = "Pasahitza ez da baliozkoa";
						passZuzena=false;
						document.getElementById("submit").disabled = true;
					}
					
				}
			}
			
			function pasahitzaAldaketa(){
				pass=document.getElementById('pass1').value;
				xhrTaulaPass.open("POST","pasahitzaKonprobatu.php", true);
				xhrTaulaPass.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhrTaulaPass.send("pass="+pass);
			}
			
			function validateMyForm(){
				
				if(($("#pass1").val()!=="")&&($("#pass2").val()!=="")){ 
				
					if($("#pass1").val()!==$("#pass2").val()){
					alert("Bi pasahitzak berdinak izan behar dute!");
					ezabatu();
					return false;
					}
					else{
						return true;
					}
					
				}else{
					alert("Hutsune guztiak betetzea beharrezkoa da!");
					ezabatu();
					return false;
				}
			}
			
			function ezabatu(){
				$("#pass1").val("");
				$("#pass2").val("");	
			}
            
        </script>

</html>	
		<?php 
			
			if (isset($_POST['pass1']) && isset($_POST['pass2'])){
				
				include('connection.php');//Datu basearekin konexioa egin
				
				$pasahitza = $_POST['pass1'];
				
				$sql = "UPDATE erabiltzaile SET pasahitza='".$pasahitza."' WHERE eposta='".$eposta."'";

				if ($con->query($sql) === TRUE) {
					$_SESSION['pasahitzaAldatua']=true;
					header("Location: layout.php");
				} else {
					$_SESSION['pasahitzaAldatzekoEposta']=$eposta;
					echo "<script type='text/javascript'>alert('Errorea pasahitza aldatzean. Saiatu berriro.')</script>";
					header("Location: pasahitzaBerrezarri2.php");
				}
				
				
				
			}
		?>