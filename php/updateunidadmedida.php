<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='unidad_medidas';
$pk=$_POST['pk'];
$pkt='pkunidad';
$array1=array('pkunidad','uni_descrip');
$array2=array(value($_POST['pk']),value($_POST['unidad']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewunidadmedida.php";
</script>