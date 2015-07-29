<?php

include 'session.php';
include '../includes/DbConnector.php';

$table='solicitudes';
$arraysol=array('MAX(pksol) AS pk');
$sql=select($table,$arraysol);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['estado1']!='' && $_POST['user1']!='' )
{
	$array1=array('pksol','sol_fecha','fkestado','fkusuario');
	$array2=array(value($pk),'now()',value($_POST['estado1']),value($_POST['user1']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert('Datos Insertados');
		window.location="viewdetallesuser.php";
	</script>
	<?php
}
?>