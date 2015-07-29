<?php
include'session.php';
include '../includes/DbConnector.php';

$table='tipos_insumos';
$fki=$_POST['fki'];
$fkt=$_POST['fkt'];
$fkti='fkinsumo';
$fktt='fktipo';
$array1=array('fkunidad');
$array2=array(value($_POST['unidad']));
updatefk($array1,$table,$fki,$fkt,$fkti,$fktt,$array2);
?>
<script>
	alert("Datos Actualizados");
	window.location="viewinsumostipos.php";
</script>