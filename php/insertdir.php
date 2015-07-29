<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='direcciones';
$arraydir=array('MAX(pkdir) AS pk');
$sql=select($table,$arraydir);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['dir']!='')
{
	$array1=array('pkdir','dir_descrip');
	$array2=array(value($pk),value($_POST['dir']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewdir.php";
	</script>
	<?php
}
?>