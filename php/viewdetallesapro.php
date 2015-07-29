<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesdetallesapro.php';

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
		$index="viewdetallesapro.php";
		$table="solicitudes s,estados e, usuarios u ";
		$array=array('pksol','es_descrip','usu_nick');
		$sql1=select($table,$array);
		if($_SESSION['s_dpto']==1 && $_SESSION['s_nivel']==2){
			$sql1.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND s.fkestado=4 ";
		}else{
			$sql1.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=4 ";
		}
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		if($_SESSION['s_dpto']==1 && $_SESSION['s_nivel']==2){
			$sql.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND s.fkestado=4 ";
		}else{
			$sql.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=4 ";
		}
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('PRINT','Solicitud Nro.','Estado','Usuario','Detalles');
		$arraydb=array('pksol','pksol','es_descrip','usu_nick','pksol');
		$title="SOLICITUDES ENTREGADAS";
		$frm="printform.php";

		//Muestra los Detalles
		$tableparte='detalle_solicitudes ds, insumos i, tipos t, desinsumos di';
		$arrayparte=array('can_entregada','desinsumo','pkdet','destipo');
		$arraypartehead=array('Cantidad','Insumo','Descripción');
		$arraypartedb=array('can_entregada','desinsumo','destipo');
		$whereparte =" WHERE ds.fkinsumo=i.pkinsumo AND t.pktipo=di.fktipo AND i.fkdesinsumo=di.pkdesinsumo AND fksol='";

		$show=$inicio+1 ." al ".$fin = min($pagtam * $page, $rows)." / Total de registros: ".$rows;
		page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$orden,$type,$tableparte,$arrayparte,$arraypartedb,$arraypartehead,$whereparte,$user,$pass,$show)
		?>
	</section>
</section>
</body>
</html>