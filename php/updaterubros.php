<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='rubros';
$pk=$_POST['pk'];
$pkt='pkrubro';
$array1=array('pkrubro','tip_descrip','rubro');
$array2=array(value($_POST['pk']),value($_POST['tipo']),value($_POST['rubro']));
update1($array1,$table,$pk,$pkt,$array2);	
?>
<script>
	alert("Datos Insertados");
	window.location.href="viewrubros.php";
</script>