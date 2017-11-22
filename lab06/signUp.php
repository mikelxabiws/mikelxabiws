<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign up</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <form id="signUpF" name="signUpF" method="post" action="" onsubmit="return validateMyForm();">
		<legend>ERREGISTRATU</legend>
				<fieldset>
            <h3>Bete ondorengo hutsuneak zure datuekin erregistratu ahal izateko:</h3> <br/>
            Izen-Abizenak: <input type="text" id="izenAb" name="izenAb" pattern="[A-Z]{1}[a-z]{1,}( [A-Z]{1}[a-z]{1,}){1,}" title="Izen eta abizenak, gutxienez bi hitz hizki larriz hasten direnak."><br/><br/>
			Eposta: <input type="text" id="eposta" name="eposta" onchange="epostaAldaketa()" placeholder="iabizenaXXX@ikasle.ehu.e(u)s" pattern="[A-Za-z]{3,}[0-9]{3}@ikasle\.ehu\.eu?s" title="Epostaren formatua: iabizenaXXX@ikasle.ehu.e(u)s"><br/><br/>
            Erabiltzaile izena: <input type="text" id="eIzena" name="eIzena" pattern="[A-Za-z]{1,}" title="Hitz bakarra izkiz osatuta."><br/><br/>
            Pasahitza: <input type="password" id="pass1" name="pass1" onchange="pasahitzaAldaketa()" pattern ="([A-Za-z0-9]{6,}" title="Gutxienez 6 karaktere."><br/><br/>
            Errepikatu pasahitza: <input type="password" id="pass2" name="pass2" pattern ="[A-Za-z0-9]{6,}"><br/><br/><br/>
            <input type="submit" id="submit" value="Erregistratu"> 
        </fieldset>
		</form>
		</br>
		<div id="epostaEremua">
			<a>Epostari bururz...</a>
		</div></br>
		<div id="pasahitzaEremua">
			<a>Pasahitzari buruz...</a>
		</div></br>
		<p><a href='layout.html'>Layout-era bueltatu</a></p>
		
        <script type="text/javascript" language = "javascript">
		
			document.getElementById("submit").disabled = true;
			epostaZuzena=false;
			passZuzena=false;
		
			//epostaren tratamendua
			xhrTaulaEp = new XMLHttpRequest();
			xhrTaulaEp.onreadystatechange = function(){
				if (xhrTaulaEp.readyState==4){
					if(xhrTaulaEp.responseText=="BAI"){
						document.getElementById('epostaEremua').innerHTML = "Eposta matrikulatuta dago";
						epostaZuzena=true;
						botoiaKon();
					}else{
						document.getElementById('epostaEremua').innerHTML = "Eposta ez dago matrikulatuta";
						epostaZuzena=false;
						botoiaKon();
					}
					
				}
			}
			
			//pasahitzaren tratamendua
			xhrTaulaPass = new XMLHttpRequest();
			xhrTaulaPass.onreadystatechange = function(){
				if (xhrTaulaPass.readyState==4){
					if(xhrTaulaPass.responseText=="BALIOZKOA"){
						document.getElementById('pasahitzaEremua').innerHTML = "Pasahitza baliozkoa da";
						passZuzena=true;
						botoiaKon();
					}else{
						document.getElementById('pasahitzaEremua').innerHTML = "Pasahitza ez da baliozkoa";
						passZuzena=false;
						botoiaKon();
					}
					
				}
			}
			
			function botoiaKon(){
				if(epostaZuzena==false || passZuzena==false){
					document.getElementById("submit").disabled = true;
				}else{
					document.getElementById("submit").disabled = false;
				}
			}
			
            
			function epostaAldaketa(){
				eps=document.getElementById('eposta').value;
				xhrTaulaEp.open("POST","epostaMatrikulaKonprobatu.php", true);
				xhrTaulaEp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhrTaulaEp.send("eposta="+eps);
			}
			
			function pasahitzaAldaketa(){
				pass=document.getElementById('pass1').value;
				xhrTaulaPass.open("POST","pasahitzaKonprobatu.php", true);
				xhrTaulaPass.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhrTaulaPass.send("pass="+pass);
			}
			
			function validateMyForm(){
				if(($("#eposta").val()!=="")&&($("#izenAb").val()!=="")&&($("#eIzena").val()!=="")&&($("#pass1").val()!=="")&&($("#pass2").val()!=="")){ 
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
		
		<?php 
			
			if (isset($_POST['izenAb']) && isset($_POST['eposta']) && isset($_POST['eIzena']) && isset($_POST['pass1'])){
				
				include('connection.php');//Datu basearekin konexioa egin
				
				$eposta = $_POST["eposta"];
				$izenAbizenak = $_POST['izenAb'];
				$erabiltzailea = $_POST['eIzena'];
				$pasahitza = $_POST['pass1'];
				
				
				$sql="SELECT `eposta`,`pasahitza` FROM `erabiltzaile` WHERE `eposta`='$eposta'";
				
				$query=mysqli_query($con, $sql);
				$result = $con->query($sql);
				
				if ($result->num_rows > 0) {
					echo "Ezin zara eposta horrekin erregistratu (" . $eposta . ") jada erabileran dagoelako. Erregistroa berriz saiatzeko bete formularioa beste eposta batekin.";
				}else{
					$sql="insert into erabiltzaile (eposta, izenAbizenak, erabiltzailea, pasahitza) values ('$eposta','$izenAbizenak','$erabiltzailea','$pasahitza')";
					$query=mysqli_query($con, $sql);
					if($query){
						echo 'Zuzenki erregistratu zara, login egiteko egin klik ';
						echo "<a href='logIn.php'>hemen</a>";
					}else{
						echo 'Ezin izan dira datuak gorde datu basean, erregistroa berriro egiten saiatzeko egin klik ';
						echo "<a href='signUp.php'>hemen</a>";
					}
				}
				
				
				
			}
		?>

</html>