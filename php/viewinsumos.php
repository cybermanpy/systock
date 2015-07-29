<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesearch3.php';

if(isset($_GET['orden'])){$orden=$_GET['orden'];}
else{$orden="pkinsumo";}

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
		$index="viewinsumos.php";
		$table="insumos i, desinsumos di, rubros r, tipos t, unidad_medidas u ";
		$array=array('pkinsumo','desinsumo','stock','stockmin','fechainsumo','destipo','tip_descrip','uni_descrip','fkdesinsumo');
		$sql1=select($table,$array);
		$sql1.=" WHERE i.fkdesinsumo=di.pkdesinsumo AND r.pkrubro=di.fkrubro AND t.pktipo=di.fktipo AND i.fkunidad=u.pkunidad ";
		if($radio==1 && $filtro!="" && (int)$filtro){
			$sql1.=" AND pkinsumo = '".$filtro."' ";
		}
		if($radio==2 && $filtro!="" && $filtro){
			$sql1.=" AND UPPER(desinsumo) LIKE UPPER('%".$filtro."%') ";
		}
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		$sql.=" WHERE i.fkdesinsumo=di.pkdesinsumo AND r.pkrubro=di.fkrubro AND t.pktipo=di.fktipo AND i.fkunidad=u.pkunidad ";
		if($radio==1 && $filtro!="" && (int)$filtro){
			$sql.=" AND pkinsumo = '".$filtro."' ";
		}
		if($radio==2 && $filtro!="" && $filtro){
			$sql.=" AND UPPER(desinsumo) LIKE UPPER('%".$filtro."%') ";
		}
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('Tareas','PK','Insumo','Descripción','Stock','Unidad Medida','Stock Minimo','Fecha');
		$arraydb=array('pkinsumo','pkinsumo','desinsumo','destipo','stock','uni_descrip','stockmin','fechainsumo');
		$title="TABLA INSUMOS";
		$del="frmdelinsumos.php";
		$frm="frminsinsumos.php";
		$filtro1="PK";
		$filtro2="Descripción";
		$filtro3="";
		$filtro4="";
		$filtro5="";
		$filtro6="";
		page($res,$total,$pagtam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$filtro1,$filtro2,$filtro3,$filtro4,$filtro5,$filtro6);
		?>
	</section>
</section>
</body>
</html>