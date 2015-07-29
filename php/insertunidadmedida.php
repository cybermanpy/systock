<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='unidad_medidas';
$arrayu=array('MAX(pkunidad) AS pk');
$sql=select($table,$arrayu);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['unidad']!='')
{
	$array1=array('pkunidad','uni_descrip');
	$array2=array(value($pk),value($_POST['unidad']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewunidadmedida.php";
	</script>
	<?php
}
?>