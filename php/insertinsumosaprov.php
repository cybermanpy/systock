<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='insumos_aprov';
$arraydir=array('MAX(pkinsumoapro) AS pk');
$sql=select($table,$arraydir);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['fkdesinsumo']!='' && $_POST['ordenc']!='' && $_POST['stockmin']!='' && $_POST['unidad']!='')
{
	$array1=array('pkinsumoapro','fkdesinsumo','fkordenc','stockmin','fkunidad','fechacarga');
	$array2=array(value($pk),value($_POST['fkdesinsumo']),value($_POST['ordenc']),value($_POST['stockmin']),value($_POST['unidad']),'now()');
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewinsumosaprov.php";
	</script>
	<?php
}
?>