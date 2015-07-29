<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='usuarios';
$arrayusu=array('MAX(pkusuario) AS pk');
$sql=select($table,$arrayusu);
$res=connector2($sql);
$row=fetchArray($res);
$pk=$row['pk']+1;
if ($_POST['user']!='' && $_POST['pass']!='' && $_POST['dpto']!='' && $_POST['nivel']!='' && $_POST['firstname']!='' && $_POST['lastname']!='' && $_POST['email']!='')
{
	$array1=array('pkusuario','usu_nick','usu_pass','fkdpto','usu_nivel','usu_firstname','usu_lastname','email');
	$array2=array(value($pk),value($_POST['user']),value(md5($_POST['pass'])),value($_POST['dpto']),value($_POST['nivel']),value($_POST['firstname']),value($_POST['lastname']),value($_POST['email']));
	insert1($array1,$table,$array2);
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewusuarios.php";
	</script>
	<?php
}
?>