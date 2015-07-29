<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='entregas';
$arrayent=array('MAX(pkentrega) AS pk');
$sql=select($table,$arrayent);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['prov']!='' )
{
	$array1=array('pkentrega','fechaent','fkprov','desentrega','norden');
	$array2=array(value($pk),value($_POST['fecha']),value($_POST['prov']),value($_POST['des']),value($_POST['norden']));
	insert1($array1,$table,$array2);
	?>
	<script>
		window.location="viewordenentregas.php";
	</script>
	<?php
}
?>