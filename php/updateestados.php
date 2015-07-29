<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='estados';
$pk=$_POST['pk'];
$pkt='pkestado';
$array1=array('pkestado','es_descrip');
$array2=array(value($_POST['pk']),value($_POST['estado']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewestados.php";
</script>