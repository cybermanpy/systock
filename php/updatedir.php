<?php
include'session.php';
include '../includes/DbConnector.php';

$table='direcciones';
$pk=$_POST['pk'];
$pkt='pkdir';
$array1=array('pkdir','dir_descrip');
$array2=array(value($_POST['pk']),value($_POST['dir']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewdir.php";
</script>