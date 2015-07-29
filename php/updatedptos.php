<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='departamentos';
$pk=$_POST['pk'];
$pkt='pkdpto';
$array1=array('pkdpto','dep_descrip','fkdir');
$array2=array(value($_POST['pk']),value($_POST['dpto']),value($_POST['dir']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location.href="viewdptos.php";
</script>