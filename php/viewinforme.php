<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesinforme.php';

if(isset($_GET['orden'])){$orden=$_GET['orden'];}
else{$orden="pkdir";}

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
$pagtam=3;
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
		$index="viewinforme.php";
		$table="direcciones";
		$array=array('pkdir','dir_descrip');
		$sql1=select($table,$array);
		/*$sql1.=" WHERE e.fkprov=p.pkprov ";*/
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		/*$sql.=" WHERE e.fkprov=p.pkprov ";*/
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('Dirección','Departamentos');
		$arraydb=array('dir_descrip','pkdir');
		$title="INFORME DE CONSUMO DE INSUMOS POR DIRECCIONES";
		$del="frmdelentregas.php";
		$frm="frminsentregas.php";

		//Muestra los Detalles
		$tableparte='departamentos dp, usuarios u, solicitudes s, detalle_solicitudes ds, insumos i, estados e, tipos t, desinsumos di';
		$arrayparte=array('pkdpto','dep_descrip','fkdir','usu_nick','pksol','can_entregada','desinsumo','destipo');
		$arraypartehead=array('Departamento','Usuario','Nro. Solicitud','Cantidad','Insumos','Descripción');
		$arraypartedb=array('dep_descrip','usu_nick','pksol','can_entregada','desinsumo','destipo');
		$whereparte =" WHERE dp.pkdpto=u.fkdpto AND s.fkusuario=u.pkusuario AND ds.fksol=s.pksol AND ds.fkinsumo=i.pkinsumo AND t.pktipo=di.fktipo AND s.fkestado=e.pkestado AND i.fkdesinsumo=di.pkdesinsumo AND s.fkestado=4 AND fkdir='";
		$updet='frmupdetentregas.php';
		$deldet='frmdeldetentregas.php';
		$insdet='frminsaddetentregas.php';

		$show=$inicio+1 ." al ".$fin = min($pagtam * $page, $rows)." / Total de registros: ".$rows;
		page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$tableparte,$arrayparte,$arraypartedb,$arraypartehead,$whereparte,$user,$pass,$show,$updet,$deldet,$insdet)
		?>
	</section>
</section>
</body>
</html>