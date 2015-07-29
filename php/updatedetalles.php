<?php
include'session.php';
include '../includes/DbConnector.php';

$table='detalle_solicitudes';
$pk=$_POST['pk'];
$pkt='pkdet';
$array1=array('pkdet','can_entregada','can_sol');
$array2=array(value($_POST['pk']),value($_POST['cant']),value($_POST['cant']));
update1($array1,$table,$pk,$pkt,$array2);
?>
<script>
	alert("Datos Actualizados");
</script>
<?php
if($_SESSION['s_nivel']==2 || $_SESSION['s_nivel']==3)
{
	?>
	<script>
		window.location="viewdetallestoapro.php";
	</script>
	<?php
}
else
{
	?>
	<script>
		window.location="viewdetallesuser.php";
	</script>
	<?php
}
?>