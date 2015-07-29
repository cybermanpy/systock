<?php
include 'session.php';
include '../includes/DbConnector.php';

$insumos=$_POST['insumo'];
$ordencompras=$_POST['ordenc'];
$cant=$_POST['cantidad'];
$table='detalles_orden_compra';
if ($_POST['insumo']!='' && $_POST['ordenc']!='' && $_POST['cantidad']!='')
{
	for($i=0;$i<count($insumos);$i++)
	{
		$arraydpto=array('MAX(pkdetordenc) AS pk');
		$sql=select($table,$arraydpto);
		$res=connector2($sql);
		$row=fetchArray($res);
		$pk=$row['pk']+1;
		$array1=array('pkdetordenc','fkinsumoapro','fkordencom','cantordenc');
		$array2=array(value($pk),value($insumos[$i]),value($ordencompras[$i]),value($cant[$i]));
		insert1($array1,$table,$array2);

		$tableia="insumos_aprov";
		$pkia=$insumos[$i];
		$pktia="pkinsumoapro";
		$pkia1=$ordencompras[$i];
		$pktia1="fkordenc";
		$arrayia1=array('stock');
		$arrayia2=array(value($cant[$i]));
		updatesum($arrayia1,$tableia,$pkia,$pktia,$pkia1,$pktia1,$arrayia2);
	}
	?>
	<script>
		alert("Datos Insertados");
		window.location.href="viewdetordencompras.php";
	</script>
	<?php
}
?>