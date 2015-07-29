<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='departamentos';
$arraydpto=array('MAX(pkdpto) AS pk');
$sql=select($table,$arraydpto);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['dpto']!='' && $_POST['dir']!='')
{
	$array1=array('pkdpto','dep_descrip','fkdir');
	$array2=array(value($pk),value($_POST['dpto']),value($_POST['dir']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewdptos.php";
	</script>
	<?php
}
?>