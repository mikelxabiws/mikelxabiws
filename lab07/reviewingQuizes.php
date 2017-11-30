<?php
include_once 'sesioa.php';
if (!((isset($_SESSION['eposta'])) && $_SESSION['eposta']=='web000@ehu.es')){
	echo 'Ez zara irakaslea, ezin duzu orrialde hau ikusi.';
}else{
	
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reviewing quizes</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>

		<div id="divBotoi">
			<input type="button" value="Galderak editatu" name="galderakEditatu" id="galderakEditatu" onclick="galderakEditatuBotoi()"><br/>
		</div></br>
		<div id="divGalderaTaula">
		<legend>GALDERAK EDITATU</legend>
		
				<fieldset>
				<div id="galderak">
				
					
				
				</div>
				</fieldset>
		</div>
		
		
		<script type="text/javascript" language = "javascript">
				
				idLag=0;
				
				xhrGalderaAldatu = new XMLHttpRequest();
				xhrGalderaAldatu.onreadystatechange = function(){
					if (xhrGalderaAldatu.readyState==4 && xhrGalderaAldatu.status==200){ 
						erantzuna=xhrGalderaAldatu.responseText;
						if(erantzuna=="Galdera aldatu da"){
							document.getElementById('galdera'+idLag).disabled=true;
							document.getElementById('erantzunZ'+idLag).disabled=true;
							document.getElementById('erantzunO1'+idLag).disabled=true;
							document.getElementById('erantzunO2'+idLag).disabled=true;
							document.getElementById('erantzunO3'+idLag).disabled=true;
							document.getElementById('radio1_'+idLag).disabled=true;
							document.getElementById('radio2_'+idLag).disabled=true;
							document.getElementById('radio3_'+idLag).disabled=true;
							document.getElementById('radio4_'+idLag).disabled=true;
							document.getElementById('radio5_'+idLag).disabled=true;
							document.getElementById('gaia'+idLag).disabled=true;
							document.getElementById('a'+idLag).style.visibility='hidden';
							alert(erantzuna);
						}else{
							alert(erantzuna);
						}
					}
				}
					
				xhrGalderaBakarraKargatu = new XMLHttpRequest();
				xhrGalderaBakarraKargatu.onreadystatechange = function(){
					if (xhrGalderaBakarraKargatu.readyState==4 && xhrGalderaBakarraKargatu.status==200){ 
						document.getElementById(''+idLag).innerHTML=xhrGalderaBakarraKargatu.responseText;
					}
				}
				
				xhrGalderaGuztiakKargatu = new XMLHttpRequest();
				xhrGalderaGuztiakKargatu.onreadystatechange = function(){
					if (xhrGalderaGuztiakKargatu.readyState==4 && xhrGalderaGuztiakKargatu.status==200){ 
						document.getElementById('galderak').innerHTML=xhrGalderaGuztiakKargatu.responseText;
					}
				}
				
				xhrGalderaBorratu = new XMLHttpRequest();
				xhrGalderaBorratu.onreadystatechange = function(){
					if (xhrGalderaBorratu.readyState==4 && xhrGalderaBorratu.status==200){
						erantzuna=xhrGalderaBorratu.responseText;
						if(erantzuna=="Galdera borratu da"){
							var galdera = document.getElementById(""+idLag);
							galdera.parentNode.removeChild(galdera);
							alert(xhrGalderaBorratu.responseText);
						}else{
							alert(xhrGalderaBorratu.responseText);
						}
						
					}
				}
			
			
				function galderakEditatuBotoi(){
					document.getElementById('divBotoi').innerHTML = '<input type="button" value="Galderak ezkutatu" name="galderakEzkutatu" id="galderakEzkutatu" onclick="galderakEzkutatu()">';
					galderakIkusi();
				}
				
				function galderakEzkutatu(){
					document.getElementById('divBotoi').innerHTML = '<input type="button" value="Galderak editatu" name="galderakEditatu" id="galderakEditatu" onclick="galderakEditatuBotoi()">';
					document.getElementById('galderak').innerHTML='';
				}
				
				function galderaBorratu(id){
					idLag=id;
					if(confirm("Ziur zaude galdera borratu nahi duzula?")){
						xhrGalderaBorratu.open("POST","deleteQuestionAJAX.php", true);
						xhrGalderaBorratu.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhrGalderaBorratu.send("id="+id);
					}
				}
				
				function aldaketakDeskartatu(id){
						idLag=id;
						document.getElementById("a"+id).style.visibility='hidden';
						xhrGalderaBakarraKargatu.open("POST","galderaKargatuAJAX.php", true);
						xhrGalderaBakarraKargatu.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhrGalderaBakarraKargatu.send("id="+id);
						
				
				}
				
				function galderaAldatu(id){
					if(document.getElementById('galdera'+id).disabled==true){
						document.getElementById('galdera'+id).disabled=false;
						document.getElementById('erantzunZ'+id).disabled=false;
						document.getElementById('erantzunO1'+id).disabled=false;
						document.getElementById('erantzunO2'+id).disabled=false;
						document.getElementById('erantzunO3'+id).disabled=false;
						document.getElementById('radio1_'+id).disabled=false;
						document.getElementById('radio2_'+id).disabled=false;
						document.getElementById('radio3_'+id).disabled=false;
						document.getElementById('radio4_'+id).disabled=false;
						document.getElementById('radio5_'+id).disabled=false;
						document.getElementById('gaia'+id).disabled=false;
						document.getElementById('a'+id).style.visibility='visible';
					}else{
						galderaBerria=document.getElementById('galdera'+id).value;
						erantzunZuzenBerria=document.getElementById('erantzunZ'+id).value;
						erantzunOkerra1Berria=document.getElementById('erantzunO1'+id).value;
						erantzunOkerra2Berria=document.getElementById('erantzunO2'+id).value;
						erantzunOkerra3Berria=document.getElementById('erantzunO3'+id).value;
						if(document.getElementById('radio1_'+id).checked==true){zailtasunBerria="1";}
						if(document.getElementById('radio2_'+id).checked==true){zailtasunBerria="2";}
						if(document.getElementById('radio3_'+id).checked==true){zailtasunBerria="3";}
						if(document.getElementById('radio4_'+id).checked==true){zailtasunBerria="4";}
						if(document.getElementById('radio5_'+id).checked==true){zailtasunBerria="5";}
						gaiBerria=document.getElementById('gaia'+id).value;
						if(galderaBerria=="" || erantzunZuzenBerria=="" || erantzunOkerra1Berria=="" || erantzunOkerra2Berria=="" || 
								erantzunOkerra3Berria=="" || gaiBerria==""){//galdera ez da gordeko
							alert("Ezin dira eremuak hutsik utzi. Galdera aldatzeko eremu guztiak bete.");
						}else{//galdera gordeko da
							idLag=id;
							xhrGalderaAldatu.open("POST","changeQuestionAJAX.php", true);
							xhrGalderaAldatu.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xhrGalderaAldatu.send("id="+id+"&galdera="+galderaBerria+"&erZuzen="+erantzunZuzenBerria+"&erOker1="+erantzunOkerra1Berria+"&erOker2="+erantzunOkerra2Berria+"&erOker3="+erantzunOkerra3Berria+"&puntuazioa="+zailtasunBerria+"&arloa="+gaiBerria);
							
						}
					}
				}
				
				function galderakIkusi(){
					
					xhrGalderaGuztiakKargatu.open("POST","showQuestionsEditableAJAX.php", true);
					xhrGalderaGuztiakKargatu.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xhrGalderaGuztiakKargatu.send("");
				}
		
		</script>
		
		
	</body>

</html>


<?php

}

?>