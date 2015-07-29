<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesearch.php';

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
		$index="viewdir.php";
		$table="direcciones";
		$array=array('pkdir','dir_descrip');
		$sql1=select($table,$array);
		if($radio==1 && $filtro!="" && (int)$filtro){
			$sql1.=" WHERE pkdir = '".$filtro."' ";
		}
		if($radio==2 && $filtro!="" && $filtro){
			$sql1.=" WHERE UPPER(dir_descrip) LIKE UPPER('%".$filtro."%') ";
		}
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		if($radio==1 && $filtro!="" && (int)$filtro){
			$sql.=" WHERE pkdir = '".$filtro."' ";
		}
		if($radio==2 && $filtro!="" && $filtro){
			$sql.=" WHERE UPPER(dir_descrip) LIKE UPPER('%".$filtro."%') ";
		}
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('Tareas','PK','Descripción');
		$arraydb=array('pkdir','pkdir','dir_descrip');
		$title="TABLA DIRECCIONES";
		$del="frmdeldir.php";
		$frm="frminsdir.php";
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