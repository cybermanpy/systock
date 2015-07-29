<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='desinsumos';
$pk=$_POST['pk'];
$pkt='pkdesinsumo';
$array1=array('pkdesinsumo','desinsumo','fktipo','fkrubro');
$array2=array(value($_POST['pk']),value($_POST['des']),value($_POST['tipo']),value($_POST['rubro']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location.href="viewdesinsumos.php";
</script>