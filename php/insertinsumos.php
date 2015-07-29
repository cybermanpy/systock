<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='insumos';
$arrayins=array('MAX(pkinsumo) AS pk');
$sql=select($table,$arrayins);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['fkdesinsumo']!='' && $_POST['unidad']!='')
{
	$array1=array('pkinsumo','fkdesinsumo','stockmin','fechainsumo','fkunidad');
	$array2=array(value($pk),value($_POST['fkdesinsumo']),value($_POST['stockmin']),'now()',value($_POST['unidad']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewinsumos.php";
	</script>
	<?php
}
?>