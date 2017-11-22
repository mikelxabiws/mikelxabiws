<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Handling quizes</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>

		<div id="div1">
			<input type="button" value="Nire galderak ikusi" name="galderakIkusi1" id="galderakIkusi1" onclick="galderakIkusiBotoi()"><br/>
		</div></br>
		<div id="divEposta" style="visibility: hidden">
		<legend>GALDERA GEHITU</legend>
				<fieldset>
					Sartu zure eposta galderak ikusteko: <input type="text" id="emaila" name="emaila" onkeypress="botoiaIkusi()">
					<input type="button" value="Galderak ikusi" name="galderakIkusi2" id="galderakIkusi2" onclick="galderakIkusi()">
				</fieldset>
		</div></br></br>
		<div id="taula">
			
		</div></br></br></br>
		<div id="div2">
			<input type="button" value="Galdera bat igo" name="galderaGehitu" id="galderaGehitu" onclick="galderaIgoFormIkusi()"><br/>
		</div></br>
		<div id="div3" style="visibility: hidden">
			<form id="galderenF" name="galderenF" action="" onsubmit="return validateMyForm();" method="post">
			<legend>GALDERA GEHITU</legend>
				<fieldset>
				<h3>Bete ondorengo formularioa zure galdera igotzeko:</h3> <br/>
				Sartu zure eposta: <input type="text" id="eposta" name="eposta" placeholder="iabizenaXXX@ikasle.ehu.eus" pattern="[A-Za-z]{3,}[0-9]{3}@ikasle\.ehu\.eu?s"><br/><br/>
				Zure galdera: <input type="text" id="galdera" name="galdera"><br/><br/>
				Erantzun zuzena: <input type="text" id="erZuzen" name="erZuzen"><br/><br/>
				Erantzun okerra: <input type="text" id="erOker1" name="erOker1"><br/><br/>
				Erantzun okerra: <input type="text" id="erOker2" name="erOker2"><br/><br/>
				Erantzun okerra: <input type="text" id="erOker3" name="erOker3"><br/><br/>
				Galderaren zailtasuna:
				<div class="radiogroup">
					<input type="radio" id="r1" name="puntuazioa" value="1" checked> 1 
					<input type="radio" id="r2" name="puntuazioa" value="2"> 2 
					<input type="radio" id="r3" name="puntuazioa" value="3"> 3
					<input type="radio" id="r4" name="puntuazioa" value="4"> 4 
					<input type="radio" id="r5" name="puntuazioa" value="5"> 5 
				</div><br/>
				Galderaren arloa: <input type="text" id="arloa" name="arloa"><br/><br/><br/>
				<input type="button" value="Galdera igo" name="galderaIgo" id="galderaIgo" onclick="igoGaldera()"> 
				<input type="button" value="Ezabatu" name="Ezabatu" onclick="ezabatu()"><br/>
				
			</fieldset>
		</form>
		</div>
		
		<script type="text/javascript" language = "javascript">
			xhrTaula = new XMLHttpRequest();
			xhrTaula.onreadystatechange = function(){
				if (xhrTaula.readyState==4 && xhrTaula.status==200)
					{ document.getElementById('taula').innerHTML =xhrTaula.responseText+"</br></br>";}
				}
				
			xhrGaldera = new XMLHttpRequest();
			xhrGaldera.onreadystatechange = function(){
				if (xhrGaldera.readyState==4 && xhrGaldera.status==200)
					{ alert(xhrGaldera.responseText); }
				}
		
			function galderakIkusi(){
				document.getElementById('div1').innerHTML = '<input type="button" value="Galderak ezkutatu" name="galderakEzkutatu" id="galderakEzkutatu" onclick="galderakEzkutatu()">';
				eps=document.getElementById('emaila').value;
				xhrTaula.open("POST","showQuestionsAJAX.php", true);
				xhrTaula.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhrTaula.send("eposta="+eps);
				document.getElementById('galderakIkusi2').disabled=true;
			}
			
			function galderakIkusiBotoi(){
				document.getElementById('div1').innerHTML = '<input type="button" value="Galderak ezkutatu" name="galderakEzkutatu" id="galderakEzkutatu" onclick="galderakEzkutatu()">';
				document.getElementById('divEposta').style.visibility='visible'
				document.getElementById('galderakIkusi2').disabled=false;
			}
			
			function galderakEzkutatu(){
				document.getElementById('div1').innerHTML = '<input type="button" value="Nire galderak ikusi" name="galderakIkusi1" id="galderakIkusi1" onclick="galderakIkusiBotoi()">';
				document.getElementById('taula').innerHTML = '';
				document.getElementById('divEposta').style.visibility='hidden'
				document.getElementById('emaila').value="";
			}
			
			function galderaIgoFormIkusi(){
				document.getElementById('div2').innerHTML = '<input type="button" value="Formularioa ezkutatu" name="formEzkutatu" id="formEzkutatu" onclick="galderaIgoFormEzkutatu()"></br></br>';
				document.getElementById('div3').style.visibility='visible'
			}
			
			function galderaIgoFormEzkutatu(){
				document.getElementById('div2').innerHTML = '<input type="button" value="Galdera bat igo" name="galderaGehitu" id="galderaGehitu" onclick="galderaIgoFormIkusi()">';
				document.getElementById('div3').style.visibility='hidden'
				ezabatu();
			}
			
			function botoiaIkusi(){
				document.getElementById('galderakIkusi2').disabled=false;
			}
			
			function ezabatu(){
				$("#eposta").val("");
				$("#galdera").val("");
				$("#erZuzen").val("");
				$("#erOker1").val("");
				$("#erOker2").val("");
				$("#erOker3").val("");
				$("#arloa").val("");
				$("#r1").prop("checked", true);
				$("#r2").prop("checked", false);
				$("#r3").prop("checked", false);
				$("#r4").prop("checked", false);
				$("#r5").prop("checked", false);
			}
			
			function igoGaldera(){
				eps=document.getElementById('eposta').value;
				gal=document.getElementById('galdera').value;
				erZ=document.getElementById('erZuzen').value;
				erO1=document.getElementById('erOker1').value;
				erO2=document.getElementById('erOker2').value;
				erO3=document.getElementById('erOker3').value;
				if(document.getElementById("r1").checked == true){zail=1;}
				if(document.getElementById("r2").checked == true){zail=2;}
				if(document.getElementById("r3").checked == true){zail=3;}
				if(document.getElementById("r4").checked == true){zail=4;}
				if(document.getElementById("r5").checked == true){zail=5;}
				arl=document.getElementById('arloa').value;
				
				xhrGaldera.open("POST","addQuestionAJAX.php", true);
				xhrGaldera.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhrGaldera.send("eposta="+eps+"&galdera="+gal+"&erZuzen="+erZ+"&erOker1="+erO1+"&erOker2="+erO1+"&erOker3="+erO3+"&puntuazioa="+zail+"&arloa="+arl);
				document.getElementById('galderakIkusi2').disabled=true;
				ezabatu();
			}
			
			
    </script>
		
	</body>

</html>