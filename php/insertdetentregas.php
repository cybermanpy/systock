<?php
include 'session.php';
include '../includes/DbConnector.php';

$insumos=$_POST['insumo'];
$cant=$_POST['cant'];
$table='detalle_entregas';
if($_POST['pk']!="" && $_POST['insumo']!="" && $_POST['cant']!="")
{
  for($i=0;$i<count($insumos);$i++)
  {
  	$var = explode("-",$insumos[$i]);
	$arraydet=array('MAX(pkdetent) AS pk');
	$sql=select($table,$arraydet);
	$res=connector2($sql);
	$row=fetchArray($res);
	$pk=$row['pk']+1;
	$array1=array('pkdetent','fkentrega','fkinsumoapro','cantdetalle');
    $array2=array(value($pk),value($_POST['pk']),value($var[0]),value($cant[$i]));
	insert1($array1,$table,$array2);
	
	$tablei="insumos";
	$pk=$var[1];
	$pkt="fkdesinsumo";
	$arrayi1=array('stock');
	$arrayi2=array(value($cant[$i]));
	updatesum1($arrayi1,$tablei,$pk,$pkt,$arrayi2);

	$tableia="insumos_aprov";
	$pkia=$var[0];
	$pktia="pkinsumoapro";
	$pkia1=$var[2];
	$pktia1="fkordenc";
	$arrayia1=array('stock');
	$arrayia2=array(value($cant[$i]));
	updatesub($arrayia1,$tableia,$pkia,$pktia,$pkia1,$pktia1,$arrayia2);
  }
  ?>
  <script>
  	alert("Datos Insertados");
  	window.location.href="viewordenentregas.php";
  </script>
<?php
}
else
{
	?>
	<script>
		alert('Todos los campos son obligatorios');
  		window.location.href="frminsaddetentregas.php";
  	</script>
  	<?php
}
?>