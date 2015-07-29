<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='tipos_insumos';
if ($_POST['insumo']!='' && $_POST['tipo']!='' && $_POST['unidad']!='')
{
	$array1=array('fkinsumo','fktipo','fkunidad','fechaentrega');
	$array2=array(value($_POST['insumo']),value($_POST['tipo']),value($_POST['unidad']),'now()');
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewinsumostipos.php";
	</script>
	<?php
}
?>