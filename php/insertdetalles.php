<?php
include 'session.php';
include '../includes/DbConnector.php';
?>
<?php
$insumos=$_POST['insumo'];
$cant=$_POST['cant'];
$table='detalle_solicitudes';
if($_POST['pk']!="" && $_POST['insumo']!="" && $_POST['cant']!=""){
  for($i=0;$i<count($insumos);$i++){
	$arraydet=array('MAX(pkdet) AS pk');
	$sql=select($table,$arraydet);
	$res=connector2($sql);
	$row=fetchArray($res);
	$pk=$row['pk']+1;
	$array1=array('pkdet','fksol','fkinsumo','can_entregada','can_sol');
    $array2=array(value($pk),value($_POST['pk']),value($insumos[$i]),value($cant[$i]),value($cant[$i]));
	insert1($array1,$table,$array2);
  }
	?>
	<script>
		alert("Datos Insertados");
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
}
else
{
	?>
	<script>
		alert('Todos los campos son obligatorios');
		window.location="frminsaddetentregas.php";
	</script>
	<?php
}
?>