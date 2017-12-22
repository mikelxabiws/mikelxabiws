<?php
	
	include_once 'sesioa.php';	

include('connection.php');//Datu basearekin konexioa egin
$dago = true;
$guztiak = false;
$sqlG = "SELECT * FROM Questions";
$resultG = $con->query($sqlG);
if(count($_SESSION['galderak'])>=$resultG->num_rows){
	echo "Galdera guztiak erantzunda.";
	echo "<br /><br />
		<a href='layout.php'>Layout-era itzuli</a>";
}else{
	$sql = "SELECT * FROM Questions ORDER BY RAND()";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$id=$row["id"];
		if (in_array($id, $_SESSION['galderak'])) {
		}else{		
		array_push($_SESSION['galderak'], $row["id"]);
		$eposta=$row["eposta"];
		$galdera=$row["galdera"];
		$erantzunZuzena=$row["erantzunZuzena"];
		$erantzunOkerra1=$row["erantzunOkerra1"];
		$erantzunOkerra2=$row["erantzunOkerra2"];
		$erantzunOkerra3=$row["erantzunOkerra3"];
		$zailtasuna=$row["zailtasuna"];
		$arloa=$row["arloa"];
		$array = array($erantzunZuzena, $erantzunOkerra1, $erantzunOkerra2, $erantzunOkerra3);
		shuffle($array);
		
		?>
		<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>One-Play</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
		<form id="galderenF" name="galderenF" action="" onsubmit="" method="post">
			<legend><?php echo $arloa; ?></legend>
				<fieldset>
				<h3><?php echo $galdera;?></h3> <br/>
				<div class="radiogroup">	
					<input type="radio" id="r1" name="rg" value="<?php echo $array[0]; ?>" checked> <?php echo $array[0]; ?>
					<input type="radio" id="r2" name="rg" value="<?php echo $array[1]; ?>"> <?php echo $array[1]; ?>
					<input type="radio" id="r3" name="rg" value="<?php echo $array[2]; ?>"> <?php echo $array[2]; ?>
					<input type="radio" id="r4" name="rg" value="<?php echo $array[3]; ?>"> <?php echo $array[3]; ?>
					
				</div><br/>
				<input type="button" value="Erantzun" name="erantzun" id="erantzun" onclick="egiaztatu()"> 				
			</fieldset>
		</form>
		<br /><br />
		<a href='onePlay.php'>Hurrengo galdera</a>

		<br /><br />
		<a href='layout.php'>Layout-era itzuli</a>
		
		<script>
			function egiaztatu(){
				if($("#r1").is(':checked')){
					if("<?php echo $erantzunZuzena; ?>"==$("#r1").val()){
						alert("Asmatu duzu!");
						$("#erantzun").prop("disabled",true);	
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);						
					}else{
						alert("Ez duzu asmatu!");
						$("#erantzun").prop("disabled",true);
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);
					}
				}if($("#r2").is(':checked')){
					if("<?php echo $erantzunZuzena; ?>"==$("#r2").val()){
						alert("Asmatu duzu!");
						$("#erantzun").prop("disabled",true);	
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);						
					}else{
						alert("Ez duzu asmatu!");
						$("#erantzun").prop("disabled",true);
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);		
					}
				}if($("#r3").is(':checked')){
					if("<?php echo $erantzunZuzena; ?>"==$("#r3").val()){
						alert("Asmatu duzu!");
						$("#erantzun").prop("disabled",true);
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);		
					}else{
						alert("Ez duzu asmatu!");
						$("#erantzun").prop("disabled",true);
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);		
					}
				}if($("#r4").is(':checked')){
					if("<?php echo $erantzunZuzena; ?>"==$("#r4").val()){
						alert("Asmatu duzu!");
						$("#erantzun").prop("disabled",true);	
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);		
					}else{
						alert("Ez duzu asmatu!");
						$("#erantzun").prop("disabled",true);
						$("#r1").attr('disabled',true);
						$("#r2").attr('disabled',true);
						$("#r3").attr('disabled',true);
						$("#r4").attr('disabled',true);		
					}
				}
				
			}
		</script>
	
		
		<?php
		
	break;}
} }else {
    echo "0 results";
}}





$con->close();

?>
	</body>
</html>