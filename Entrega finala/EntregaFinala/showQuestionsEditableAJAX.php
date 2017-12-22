<?php
		
			include('connection.php');//Datu basearekin konexioa egin

			$sql = "SELECT * FROM `Questions`";
			$result = $con->query($sql);

			

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$id=$row["id"];
					$eposta=$row["eposta"];
					$galdera=$row["galdera"];
					$erantzunZuzena=$row["erantzunZuzena"];
					$erantzunOkerra1=$row["erantzunOkerra1"];
					$erantzunOkerra2=$row["erantzunOkerra2"];
					$erantzunOkerra3=$row["erantzunOkerra3"];
					$arloa=$row["arloa"];
					$zailtasuna=$row["zailtasuna"];
					
					//id eta eposta
					$galderaOsoa = "<div class='galderakDiv' id='".$id."'><legend>id: ".$id."</legend><fieldset>";
					$galderaOsoa = $galderaOsoa . "<a>Eposta: <input id='eposta".$id."' name='eposta".$id."' disabled value='".$eposta."'></a></br>";
					//galdera
					$galderaOsoa = $galderaOsoa . "<a>Galdera: <input id='galdera".$id."' name='galdera".$id."' disabled value='".$galdera."'></a></br>";
					//erantzun zuzena
					$galderaOsoa = $galderaOsoa . "<a>Erantzun zuzena: <input id='erantzunZ".$id."' name='erantzunZ".$id."' disabled value='".$erantzunZuzena."'></a></br>";
					//erantzun okerrak
					$galderaOsoa = $galderaOsoa . "<a>Erantzun okerra 1: <input id='erantzunO1".$id."' name='erantzunO1".$id."' disabled value='".$erantzunOkerra1."'></a></br>";
					$galderaOsoa = $galderaOsoa . "<a>Erantzun okerra 2: <input id='erantzunO2".$id."' name='erantzunO2".$id."' disabled value='".$erantzunOkerra2."'></a></br>";
					$galderaOsoa = $galderaOsoa . "<a>Erantzun okerra 3: <input id='erantzunO3".$id."' name='erantzunO3".$id."' disabled value='".$erantzunOkerra3."'></a></br>";
					//zailtasuna
					if($zailtasuna==1){$galderaOsoa = $galderaOsoa . "<a>Zailtasuna: <input type='radio' disabled id='radio1_".$id."' name='radio".$id."' value='1' checked> 1 <input type='radio' disabled id='radio2_".$id."' name='radio".$id."' value='2'> 2 <input type='radio' disabled id='radio3_".$id."' name='radio".$id."' value='3'> 3<input type='radio' disabled id='radio4_".$id."' name='radio".$id."' value='4'> 4 <input type='radio' disabled id='radio5_".$id."' name='radio".$id."' value='5'> 5 <br/></a>";}
					if($zailtasuna==2){$galderaOsoa = $galderaOsoa . "<a>Zailtasuna: <input type='radio' disabled id='radio1_".$id."' name='radio".$id."' value='1'> 1 <input type='radio' disabled id='radio2_".$id."' name='radio".$id."' value='2' checked> 2 <input type='radio' disabled id='radio3_".$id."' name='radio".$id."' value='3'> 3<input type='radio' disabled id='radio4_".$id."' name='radio".$id."' value='4'> 4 <input type='radio' disabled id='radio5_".$id."' name='radio".$id."' value='5'> 5 <br/></a>";}
					if($zailtasuna==3){$galderaOsoa = $galderaOsoa . "<a>Zailtasuna: <input type='radio' disabled id='radio1_".$id."' name='radio".$id."' value='1'> 1 <input type='radio' disabled id='radio2_".$id."' name='radio".$id."' value='2'> 2 <input type='radio' disabled id='radio3_".$id."' name='radio".$id."' value='3' checked> 3<input type='radio' disabled id='radio4_".$id."' name='radio".$id."' value='4'> 4 <input type='radio' disabled id='radio5_".$id."' name='radio".$id."' value='5'> 5 <br/></a>";}
					if($zailtasuna==4){$galderaOsoa = $galderaOsoa . "<a>Zailtasuna: <input type='radio' disabled id='radio1_".$id."' name='radio".$id."' value='1'> 1 <input type='radio' disabled id='radio2_".$id."' name='radio".$id."' value='2'> 2 <input type='radio' disabled id='radio3_".$id."' name='radio".$id."' value='3'> 3<input type='radio' disabled id='radio4_".$id."' name='radio".$id."' value='4' checked> 4 <input type='radio' disabled id='radio5_".$id."' name='radio".$id."' value='5'> 5 <br/></a>";}
					if($zailtasuna==5){$galderaOsoa = $galderaOsoa . "<a>Zailtasuna: <input type='radio' disabled id='radio1_".$id."' name='radio".$id."' value='1'> 1 <input type='radio' disabled id='radio2_".$id."' name='radio".$id."' value='2'> 2 <input type='radio' disabled id='radio3_".$id."' name='radio".$id."' value='3'> 3<input type='radio' disabled id='radio4_".$id."' name='radio".$id."' value='4'> 4 <input type='radio' disabled id='radio5_".$id."' name='radio".$id."' value='5' checked> 5 <br/></a>";}
					//gaia
					$galderaOsoa = $galderaOsoa . "<a>Gaia: <input id='gaia".$id."' name='gaia".$id."' disabled value='".$arloa."'></a></br></br>";
					//galdera aldatzeko botoia
					$galderaOsoa = $galderaOsoa . "<a><input type='button' value='Galdera aldatu' name='Aldatu' onclick='galderaAldatu(".$id.")'></a></br>";
					$galderaOsoa = $galderaOsoa . "<a id='a".$id."' style='visibility: hidden'><input type='button' value='Aldaketak deskartatu' name='Aldaketak deskartatu' onclick='aldaketakDeskartatu(".$id.")'></a></br>";
					//galdera borratzeko botoia
					$galderaOsoa = $galderaOsoa . "<a id='borratu".$id."'><input type='button' value='Galdera borratu' name='Galdera borratu' onclick='galderaBorratu(".$id.")'></a></br>";
					
					$galderaOsoa = $galderaOsoa . "</fieldset></br></div>";
					
					echo $galderaOsoa;
					
				}
			} else {
				echo "Ez dago galderarik datu basean";
			}

			$con->close();
			
			
			
			
							
					
		?>