<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='estados';
$arrayes=array('MAX(pkestado) AS pk');
$sql=select($table,$arrayes);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['estado']!='')
{
	$array1=array('pkestado','es_descrip');
	$array2=array(value($pk),value($_POST['estado']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewestados.php";
	</script>
	<?php
}
?>