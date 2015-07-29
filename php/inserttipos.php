<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='tipos';
$arraydir=array('MAX(pktipo) AS pk');
$sql=select($table,$arraydir);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['tipo']!='')
{
	$array1=array('pktipo','destipo');
	$array2=array(value($pk),value($_POST['tipo']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewtipos.php";
	</script>
	<?php
}
?>