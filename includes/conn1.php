<?php
include 'DbConnector.php';
$table='usuarios';
$user=$_GET['user'];
$array=array('pkusuario','usu_lastname','usu_nivel','fkdpto','usu_firstname','usu_nick');
$sql=select($table,$array);
$sql.=" WHERE usu_nick='".$user;
$res=connector2($sql);
$rows=getNumRows($res);
if($rows>0)
{
	$valid='true';
	echo $valid;
}
else
{
	$valid='false';
	echo $valid;
}
/*echo json_encode($valid);*/
?>