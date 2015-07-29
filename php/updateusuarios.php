<?php
include 'session.php';
include '../includes/DbConnector.php';

$table='usuarios';
$pk=$_POST['pk'];
$pkt='pkusuario';
if($_POST['pass']!='')
{
	$array1=array('pkusuario','usu_nick','usu_pass','fkdpto','usu_nivel','usu_firstname','usu_lastname','email');
	$array2=array(value($_POST['pk']),value($_POST['user']),value(md5($_POST['pass'])),value($_POST['dpto']),value($_POST['nivel']),value($_POST['firstname']),value($_POST['lastname']),value($_POST['email']));
	update1($array1,$table,$pk,$pkt,$array2);
}
else
{
	$array1=array('pkusuario','usu_nick','fkdpto','usu_nivel','usu_firstname','usu_lastname','email');
	$array2=array(value($_POST['pk']),value($_POST['user']),value($_POST['dpto']),value($_POST['nivel']),value($_POST['firstname']),value($_POST['lastname']),value($_POST['email']));
	update1($array1,$table,$pk,$pkt,$array2);
}
?>
<script>
	alert("Datos Actualizados");
	window.location="viewusuarios.php";
</script>
