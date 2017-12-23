<?php
include_once 'sesioa.php';
if (isset($_SESSION['eposta'])){
	echo 'Jada logeatuta zaude kontu batekin, beraz orrialde hau ez daukazu atzigarri.';
	echo '</br><p><a href="layout.php">Layout-era bueltatu</a></p>';
	exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pasahitza berrezarri</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
	
	
		<div id="div1">
			<form id="epostaForm" name="epostaForm" method="post" action="" >
				<legend>PASAHITZA BERREZARRI</legend>
				<fieldset>
					<h3>Sartu zure eposta eta segurtasun galderaren bidez pasahitza berrezarri ahalko duzu.</h3> <br/>
					Eposta: <input type="text" id="eposta" name="eposta" placeholder="iabizenaXXX@ikasle.ehu.e(u)s"><br/><br/>
					<input type="submit" value="Pasahitza berrezarri"> </br></br>
				
					<p><a href='layout.php'>Layout-era bueltatu</a></p>
				</fieldset>
			</form>
		</div></br></br>
		
		<div id="div2">
			
		</div>
		

</html>

		
		<?php 
			
			include('connection.php');//Datu basearekin konexioa egin
			
			
			
			if (isset($_POST['eposta'])){
				
				$eposta = $_POST["eposta"];
				
				$sql="SELECT `eposta`,`segurtasunGaldera`,`segurtasunErantzuna` FROM `erabiltzaile` WHERE `eposta`='$eposta'";
				
				$query=mysqli_query($con, $sql);
				$result = $con->query($sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$itzultzekoString = '<form id="erantzunaForm" name="erantzunaForm" method="post" action="" >';
						$itzultzekoString = $itzultzekoString . '<legend>SEGURTASUN GALDERA ERANTZUN</legend>';
						$itzultzekoString = $itzultzekoString . '<fieldset>';
						$itzultzekoString = $itzultzekoString . '<h3>Zure galderaren erantzuna sartu. Zuzena bada pasahitza berrezarri ahalko duzu.</h3> <br/>';
						$itzultzekoString = $itzultzekoString . 'Galdera: ' . $row["segurtasunGaldera"] . ' </br></br>';
						$itzultzekoString = $itzultzekoString . 'Erantzuna: <input type="text" id="erantzunaErab" name="erantzunaErab"><br/><br/>';
						$itzultzekoString = $itzultzekoString . '<input type="hidden" id="epostaErab" name="epostaErab" value="' . $row["eposta"] . '">';
						$itzultzekoString = $itzultzekoString . '<input type="submit" value="Konprobatu"> </br></br>';
						$itzultzekoString = $itzultzekoString . '</fieldset>';
						$itzultzekoString = $itzultzekoString . '</form>';
						
						echo "<script type='text/javascript'>document.getElementById('div2').innerHTML = '" . $itzultzekoString . "'</script>";
				
					
					}
				}else{
					echo '<script type="text/javascript">document.getElementById("div2").innerHTML = "<legend>EPOSTA EZ DAGO ERREGISTRATUA</legend><fieldset>Sartutako eposta (' . $eposta . ') ez dago erregistratua. Saiatu berriro.</fieldset>"</script>';
				}
			}
			
			if (isset($_POST['erantzunaErab'])){
				
				$erantzuna = $_POST["erantzunaErab"];
				$eposta = $_POST["epostaErab"];
				
				$sql="SELECT `eposta`,`segurtasunGaldera`,`segurtasunErantzuna` FROM `erabiltzaile` WHERE `eposta`='$eposta'";
				
				$query=mysqli_query($con, $sql);
				$result = $con->query($sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row["segurtasunErantzuna"]===$erantzuna){
							$_SESSION['pasahitzaAldatzekoEposta']=$eposta;
							echo '<script type="text/javascript">document.getElementById("div2").innerHTML = "<legend>ERANTZUN ZUZENA</legend><fieldset>Sartutako erantzuna zuzena da.';
							echo "<p><a href='pasahitzaBerrezarri2.php'>Pasahitza aldatzeko egin klik hemen</a></p>";
							echo '</fieldset>"</script>';
							
						}else{
							echo "<script type='text/javascript'>document.getElementById('div2').innerHTML = '<legend>ERANTZUN OKERRA</legend><fieldset>Sartutako erantzuna ez da zuzena. Ezingo duzu pasahitza berrezarri.</fieldset>'</script>";
						}
					}
				}
			}
			
?>