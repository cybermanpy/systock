<?php
include'session.php';
include '../includes/DbConnector.php';

$table='insumos_aprov';
$pk=$_POST['pk'];
$pkt='pkinsumoapro';
$array1=array('pkinsumoapro','fkordenc','fkunidad','stockmin');
$array2=array(value($_POST['pk']),value($_POST['ordenc']),value($_POST['unidad']),value($_POST['stockmin']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewinsumosaprov.php";
</script>