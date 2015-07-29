<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='orden_compras';
$arraydir=array('MAX(pkordenc) AS pk');
$sql=select($table,$arraydir);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['norden']!='' && $_POST['fecha']!='')
{
	$array1=array('pkordenc','norden','fecha');
	$array2=array(value($pk),value($_POST['norden']),value($_POST['fecha']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewordencompras.php";
	</script>
	<?php
}
?>