<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='desinsumos';
$arraydpto=array('MAX(pkdesinsumo) AS pk');
$sql=select($table,$arraydpto);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['des']!='' && $_POST['tipo']!='' && $_POST['rubro']!='')
{
	$array1=array('pkdesinsumo','desinsumo','fktipo','fkrubro');
	$array2=array(value($pk),value($_POST['des']),value($_POST['tipo']),value($_POST['rubro']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewdesinsumos.php";
	</script>
	<?php
}
?>