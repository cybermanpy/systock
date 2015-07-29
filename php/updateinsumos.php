<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='insumos';
$pk=$_POST['pk'];
$pkt='pkinsumo';
$array1=array('pkinsumo','fkdesinsumo','fkunidad','stockmin');
$array2=array(value($_POST['pk']),value($_POST['fkdesinsumo']),value($_POST['unidad']),value($_POST['stockmin']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewinsumos.php";
</script>