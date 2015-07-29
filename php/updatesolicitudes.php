<?php
include 'session.php';
include '../includes/DbConnector.php';

if($_POST['estado']==4)
{
	#$tablesol='detalle_solicitud ds, solicitud s, insumos i ';
	$tablesol='detalle_solicitudes';
	$arraysol=array('pkdet','fksol','fkinsumo','can_entregada');
	$sql=select($tablesol,$arraysol);
	#$sql.=" WHERE ds.ins_codigo=i.ins_codigo AND s.sol_nrosol=ds.sol_nrosol AND ds.sol_nrosol='".$_POST['pk']."' ";
	$sql.=" WHERE fksol='".$_POST['pk']."' ";
	$res=connector2($sql);
	while($row=fetchArray($res))
	{		
		$tableins='insumos';
		$arrayins=array('stock');
		$sql2=select($tableins,$arrayins);
		$sql2.=" WHERE pkinsumo='".$row['fkinsumo']."' ";
		$res2=connector2($sql2);
		$row2=fetchArray($res2);
		$all=$row2['stock']-$row['can_entregada'];
		$pkins=$row['fkinsumo'];
		$pkt='pkinsumo';
		$arrayins1=array('pkinsumo','stock');
		$arrayins2=array(value($pkins),value($all));
		update1($arrayins1,$tableins,$pkins,$pkt,$arrayins2);
	}
	$table='solicitudes';
	$pk=$_POST['pk'];
	$pkt='pksol';
	$array1=array('pksol','fkestado');
	$array2=array(value($_POST['pk']),value($_POST['estado']));
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
			window.location="viewedetallesuser.php";
		</script>
		<?php
	}
}
else
{
	$table='solicitudes';
	$pk=$_POST['pk'];
	$pkt='pksol';
	$array1=array('pksol','fkestado');
	$array2=array(value($_POST['pk']),value($_POST['estado']));
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
}
?>