<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='proveedores';
$arrayprov=array('MAX(pkprov) AS pk');
$sql=select($table,$arrayprov);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['name']!='' && $_POST['phone']!='' && $_POST['dir']!='' && $_POST['mail']!='')
{
	$array1=array('pkprov','prov_nombre','prov_telefono','prov_direccion','prov_correo');
	$array2=array(value($pk),value($_POST['name']),value($_POST['phone']),value($_POST['dir']),value($_POST['mail']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewproveedores.php";
	</script>
	<?php
}
?>