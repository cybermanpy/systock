<?php
include 'session.php';
include '../includes/DbConnector.php';
$pk=$_POST['pk'];
$pkt=$_POST['pkt'];
$table=$_POST['table'];
$page=$_POST['page'];
delete1($pk,$pkt,$table);
?>
<script>
	alert("Datos Borrados");
	window.location.href="<?=$page?>";
</script>
