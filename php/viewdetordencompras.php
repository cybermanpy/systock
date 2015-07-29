<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesdetalles1.php';

if(isset($_GET['orden'])){$orden=$_GET['orden'];}
else{$orden="pkordenc";}

if(isset($_GET['type'])){$type=$_GET['type'];}
if(isset($_POST["term"])){$filtro = $_POST["term"];}
if(isset($_POST["radio"])){$radio = $_POST["radio"];}

if(isset($type)){$_SESSION['type']=$type;}
if(isset($radio)){$_SESSION["radio"] = $radio;}
if(isset($filtro)){$_SESSION["term"] = $filtro;}

if(!isset($type) && isset($_SESSION["type"])){$type = $_SESSION["type"];}
if(!isset($radio) && isset($_SESSION["radio"])){$radio = $_SESSION["radio"];}
if(!isset($filtro) && isset($_SESSION["term"])){$filtro = $_SESSION["term"];}
if(!isset($type)){$type='asc';}

if($type=='desc')
{
	$type='asc';
}
else
{
	$type='desc';
}

if($_GET['a']=="reset")
{
	$_SESSION['type']=$type="";
	$_SESSION['term']=$filtro="";
	$_SESSION['radio']=$radio="";
}	
$pagtam=10;
$page=$_GET['page'];
if(isset($page)){
	$inicio=($page-1)*$pagtam;
}else{
	$inicio=0;
	$page=1;
}
?>
<!doctype html>
<html>
<head>
	<?php include 'head.html';?>
</head>

<body>
<section class="container">
	<header>
		<?php include 'title.html';?>
		<nav>
			<?php include 'menuadmin.php';?>
		</nav>
	</header>
	<section class="content">
		<?php
		$index="viewdetordencompras.php";
		$table="orden_compras";
		$array=array('pkordenc','norden','fecha');
		$sql1=select($table,$array);
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('Tareas','PK','Orden de compras','Fecha','Detalles');
		$arraydb=array('pkordenc','pkordenc','norden','fecha','pkordenc');
		$title="TABLA ORDEN DE COMPRAS";
		$del="frmdelordencompras.php";
		$frm="frminsordencompras.php";

		//Muestra los Detalles
		$tableparte="detalles_orden_compra doc, insumos_aprov ia, desinsumos di, tipos t ";
		$arrayparte=array('pkdetordenc','destipo','cantordenc','desinsumo');
		$arraypartehead=array('TAREAS','Insumo','Tipo','Cantidad');
		$arraypartedb=array('pkdetordenc','desinsumo','destipo','cantordenc');
		$whereparte =" WHERE doc.fkinsumoapro=ia.pkinsumoapro AND ia.fkdesinsumo=di.pkdesinsumo AND di.fktipo=t.pktipo AND fkordencom='";
		$updet='frmupdetentregas.php';
		$deldet='frmdeldetentregas.php';
		$insdet='frminsdetordencompras.php';

		$show=$inicio+1 ." al ".$fin = min($pagtam * $page, $rows)." / Total de registros: ".$rows;
		page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$tableparte,$arrayparte,$arraypartedb,$arraypartehead,$whereparte,$user,$pass,$show,$updet,$deldet,$insdet)
		?>
	</section>
</section>
</body>
</html>