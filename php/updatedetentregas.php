<?php
include 'session.php';
include '../includes/DbConnector.php';
$table='detalle_entregas';
$pk=$_POST['pk'];
$pkt='pkdetent';
$array1=array('pkdetent','cantdetalle');
$array2=array(value($_POST['pk']),value($_POST['cant']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewordenentregas.php";
</script>