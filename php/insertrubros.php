<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='rubros';
$arrayti=array('MAX(pkrubro) AS pk');
$sql=select($table,$arrayti);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['tipo']!='')
{
	$array1=array('pkrubro','tip_descrip','rubro');
	$array2=array(value($pk),value($_POST['tipo']),value($_POST['rubro']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewrubros.php";
	</script>
	<?php
}
?>