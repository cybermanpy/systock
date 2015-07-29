<?php
include'session.php';
include'../includes/charset.php';
$nivel=$_SESSION['s_nivel'];
?>
<!doctype html>
<html lang="es">
<head>
	<?php include 'head.html';?>
</head>
<body>
<section class="container">
	<header>
		<?php include 'title.html';?>
		<nav>
			<?php include 'menuadmin.php';?>
		</nav>
	</header>
	<section class="content">
		<figure>
			<img src="../img/stock-transfer.png">
		</figure>
	</section>
	<footer>
		<section class="foot">
			© Copyright Derechos Reservados 2014 - Powered by @_cyberman
		</section>
	</footer>
</section>
</body>
</html>