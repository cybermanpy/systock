<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='tipos';
$pk=$_POST['pk'];
$pkt='pktipo';
$array1=array('pktipo','destipo');
$array2=array(value($_POST['pk']),value($_POST['tipo']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewtipos.php";
</script>