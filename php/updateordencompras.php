<?php
include'session.php';
include '../includes/DbConnector.php';

$table='orden_compras';
$pk=$_POST['pk'];
$pkt='pkordenc';
$array1=array('pkordenc','norden','fecha');
$array2=array(value($_POST['pk']),value($_POST['norden']),value($_POST['fecha']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewordencompras.php";
</script>