<?php
include 'session.php';
include '../includes/DbConnector.php';
$fk1=$_POST['fk1'];
$fk2=$_POST['fk2'];
$fkt1=$_POST['fkt1'];
$fkt2=$_POST['fkt2'];
$table=$_POST['table'];
$page=$_POST['page'];
deletefk($fk1,$fk2,$fkt1,$fkt2,$table);
?>
<script>
	alert("Datos Borrados");
	window.location.href="<?=$page?>";
</script>
