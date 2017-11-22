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
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href="logOut.php">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layoutErreg.php'>Home</a></span>
		<span><a href='addQuestion.php'>Add questions</a><span>
		<span><a href='showQuestions.php'>See questions</a><span>
		<span><a href='showXMLQuestions.php'>See XML questions</a><span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a></a></span>
		<span><a></a></span>
		<span><a></a></span>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com/mikelxabiws/mikelxabiws'>Link GITHUB</a>
	</nav>
    <section class="main" id="s1" style="height:1000px;">
	<div id="div">
			<?php
				include 'handlingQuizes.php';
			?>
	</div>
    </section>

	
	
</div>
</body>
</html>