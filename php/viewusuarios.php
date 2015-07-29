<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
include '../includes/pagesearch.php';

if(isset($_GET['orden'])){$orden=$_GET['orden'];}
else{$orden="pkusuario";}

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
		$index="viewusuarios.php";
		$table="departamentos dpto, usuarios u, direcciones dir";
		$array=array('pkusuario','usu_nick','dep_descrip','usu_nivel','usu_firstname','usu_lastname','dir_descrip','email');
		$sql1=select($table,$array);
		$sql1.=" WHERE dpto.pkdpto = u.fkdpto AND dpto.fkdir=dir.pkdir ";
		if($radio==1 && $filtro!="" && (int)$filtro){
			$sql1.=" AND pkusuario = '".$filtro."' ";
		}
		if($radio==2 && $filtro!="" && $filtro){
			$sql1.=" AND UPPER(usu_nick) LIKE UPPER('%".$filtro."%') ";
		}
		$res1=connector2($sql1);
		$rows=getNumRows($res1);
		$total=ceil($rows/$pagtam);
		$sql=select($table,$array);
		$sql.=" WHERE dpto.pkdpto = u.fkdpto AND dpto.fkdir=dir.pkdir ";
		if($radio==1 && $filtro!="" && (int)$filtro){
			$sql.=" AND pkusuario = '".$filtro."' ";
		}
		if($radio==2 && $filtro!="" && $filtro){
			$sql.=" AND UPPER(usu_nick) LIKE UPPER('%".$filtro."%') ";
		}
		$sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
		$res=connector2($sql);
		$arrayhead=array('Tareas','PK','Usuario','Dirección','Departamento','Nivel','Nombre','Apellido','Email');
		$arraydb=array('pkusuario','pkusuario','dir_descrip','usu_nick','dep_descrip','usu_nivel','usu_firstname','usu_lastname','email');
		$title="TABLA USUARIOS";
		$del="frmdelusuarios.php";
		$frm="frminsusuarios.php";
		$filtro1="PK";
		$filtro2="Usuario";
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