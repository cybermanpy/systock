<?php
session_start();
include 'DbConnector.php';
$user=$_POST['user'];
$pwd=$_POST['pass'];
$table='usuarios';
$array=array('pkusuario','usu_lastname','usu_nivel','fkdpto','usu_firstname');
$sql=select($table,$array);
$sql.=" WHERE usu_nick='".$user."' AND usu_pass='".md5($pwd)."' ";
$res=connector2($sql);
$rows=getNumRows($res);
if($rows>0)
{
	$row=fetchArray($res);
	$_SESSION["s_user"] = $user;
	$_SESSION["s_pass"] = $pwd;
	$_SESSION['s_pk']= $row['pkusuario'];
	$_SESSION['s_dpto']= $row['fkdpto'];
	$_SESSION['s_nivel']= $row['usu_nivel'];
	$_SESSION['s_name']=$row['usu_firstname']." ".$row['usu_lastname'];
	?>
	<script>
		window.location.href="../php/";
	</script>	
    <?php
}
else
{
	?>
	<script>
		alert('Usuario o password incorrecto');
		window.location.href=('../');
	</script> 
	<?php
}
?>


<?
/*session_start();
require_once'DbConnector.php';
$user=$_POST['user'];
$pass=$_POST['pass'];
$conn=connectorpass($user,$pass);
if(!$conn){
?>
		<script language="javascript">
		alert("Usuario o password incorrecto");
		window.location.href="../login";
		</script> 
<?
	}
		$_SESSION["s_username"] = $user;
		$_SESSION["s_pass"] = $pass;
?>
	<script language="javascript">
		window.location.href="../php/";
	</script>

<?
pg_close($conn);*/
/***************************************************/
?>
<?
/*session_start();
require_once'DbConnector.php';
$user=$_POST['user'];
$pass=$_POST['pass'];
$conn=connectorpass($user,$pass);
if(!$conn){
?>
		<script language="javascript">
		alert("Usuario o password incorrecto");
		window.location.href="../login";
		</script> 
<?
	}
		$_SESSION["s_username"] = $user;
		$_SESSION["s_pass"] = $pass;
?>
	<script language="javascript">
		window.location.href="../php/";
	</script>

<?
mysql_close($conn);*/
?>
