<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesdetalles.php';

if(isset($_GET['orden'])){$orden=$_GET['orden'];}
else{$orden="pksol";}

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

if($_GET['a']=="reset"){
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
		$index="viewdetallesuser.php";
		$table="solicitudes s,estados e, usuarios u ";
		$array=array('pksol','es_descrip','usu_nick');
		$sql1=select($table,$array);
		$sql1.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=1 AND u.pkusuario='".$_SESSION['s_pk']."' ";
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		$sql.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=1 AND u.pkusuario='".$_SESSION['s_pk']."' ";
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('Tareas','Solicitud Nro.','Usuario','Estado','Detalles');
		$arraydb=array('pksol','pksol','usu_nick','es_descrip','pksol');
		$title="TABLA SOLICITUDES";
		$del="frmdelsolicitudes.php";
		$frm="frminssolicitudes.php";

		//Muestra los Detalles
		$tableparte='detalle_solicitudes ds, insumos i, desinsumos di, tipos t';
		$arrayparte=array('can_entregada','desinsumo','pkdet','destipo');
		$arraypartehead=array('TAREAS','Cantidad','Insumo','Tipo');
		$arraypartedb=array('pkdet','can_entregada','desinsumo','destipo');
		$whereparte =" WHERE ds.fkinsumo=i.pkinsumo AND i.fkdesinsumo=di.pkdesinsumo AND di.fktipo=t.pktipo AND fksol='";
		$updet='frmupdetalles.php';
		$deldet='frmdeldetalles.php';
		$insdet='frminsertdet.php';

		$show=$inicio+1 ." al ".$fin = min($pagtam * $page, $rows)." / Total de registros: ".$rows;
		page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$tableparte,$arrayparte,$arraypartedb,$arraypartehead,$whereparte,$user,$pass,$show,$updet,$deldet,$insdet)
		?>
	</section>
</section>
</body>
</html>