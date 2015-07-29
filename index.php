<?php
include 'includes/charset.php';
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/vnd.microsoft.icon" href="img/faviconcaja.ico" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/stylesindex.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<script src="js/jquery.js"></script>
	<script src="js/validate.js"></script>
	<script src="js/prefixfree.min.js"></script>
	<script src="js/function.js"></script>
	<title>.::SISTEMA DE STOCK::.</title>
</head>
<body>
<section class="container">
	<header>
		<h1><img class="imgleft" src="img/logoMH.png" > SISTEMA DE STOCK <img class="imgright" src="img/gobNa.png" ></h1>
		<h2>SUBSECRETARÍA DE ESTADO DE ECONOMÍA</h2>
	</header>
	<section class="content">
		<span>
			<form id="frmlogin" name="frmlogin" method="post" action="includes/conn.php" >
				<input type="text" id="user" name="user"/>
				<input type="password" id="pass" name="pass" />
				<input class="boton" type="submit" id="login" name="login" value="Login" />
			</form>
		</span>
	</section>
	<footer>
		<section class="foot">
			© Copyright Derechos Reservados 2014 - Powered by @_cyberman
		</section>
	</footer>
</section>
</body>
</html>