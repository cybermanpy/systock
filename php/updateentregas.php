<?php
include 'session.php';
include '../includes/DbConnector.php';
$table='entregas';
$pk=$_POST['pk'];
$pkt='pkentrega';
$array1=array('pkentrega','fkprov','desentrega','norden');
$array2=array(value($_POST['pk']),value($_POST['prov']),value($_POST['des']),value($_POST['norden']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewordenentregas.php";
</script>