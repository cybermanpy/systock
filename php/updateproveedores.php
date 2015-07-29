<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='proveedores';
$pk=$_POST['pk'];
$pkt='pkprov';
$array1=array('pkprov','prov_nombre','prov_telefono','prov_direccion','prov_correo');
$array2=array(value($_POST['pk']),value($_POST['name']),value($_POST['phone']),value($_POST['dir']),value($_POST['mail']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewproveedores.php";
</script>