<?PHP include_once 'sesioa.php';

if(isset($_SESSION['pasahitzaAldatua'])){
	unset($_SESSION['pasahitzaAldatua']);
	unset($_SESSION['pasahitzaAldatzekoEposta']);
	echo "<script type='text/javascript'>alert('Pasahitza zuzenki aldatu da. Layout-era itzuliko zara eta bertan login egin ahal izango duzu.')</script>";		
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
  </head>
  <body>

<?php

if (!(isset($_SESSION['eposta']))){
	
?>
<div id='page-wrap'>
	<header class='main' id='h1'>
	  <span class="right">Gonbidatua</span><br/>
      <span class="right"><a href="logIn.php">LogIn</a> </span><br/>
      <span class="right"><a href="signUp.php">SignUp</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='oP.php'>One-Play</a></span>
		<span><a href='credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com/mikelxabiws/mikelxabiws'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
<?php

}else{
	
?>


  <div id='page-wrap'>
	<header class='main' id='h1'>
	  <span class="right"><?php echo $_SESSION['eposta']; ?></span><br/>
      <span class="right"><a href="logOut.html">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		
		<?php
				if($_SESSION['eposta']!='web000@ehu.es'){
					
			?>
		
		<span><a href='addQuestion.php'>Add questions</a><span>
		<span><a href='showQuestions.php'>See questions</a><span>
		<span><a href='showXMLQuestions.php'>See XML questions</a><span>
		
		<?php
				}
		?>
		
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='oP.php'>One-Play</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a></a></span>
		<span><a></a></span>
		<span><a></a></span>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com/mikelxabiws/mikelxabiws'>Link GITHUB</a>
	</nav>
    <section class="main" id="s1" style="height:220px;">
	<div id="div">
			<?php
				if($_SESSION['eposta']=='web000@ehu.es'){
					include 'reviewingQuizes.php';
				}else{
					include 'handlingQuizes.php';
				}
			?>
	</div>
    </section>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script>
		$('#div').bind("DOMSubtreeModified",function(){
			document.getElementById("s1").style.height = ($(document).height()-120)+"px";
		});
	</script>

	
	
</div>
</body>
</html>

<?php

}
	
?>