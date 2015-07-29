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
    $index="viewdetallestoapro.php";
    $table="solicitudes s,estados e, usuarios u ";
    $array=array('pksol','es_descrip','usu_nick');
    $sql1=select($table,$array);
    if($_SESSION['s_dpto']==1 && $_SESSION['s_nivel']==2)
    {
    	$sql1.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND s.fkestado=3 ";
        $updet='frmupdetallescant.php';
        $deldet='';
        $insdet='';
    }
    else
    {

    	$sql1.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=1 ";
        $updet='frmupdetalles.php';
        $deldet='frmdeldetalles.php';
        $insdet='frminsertdet.php';
    }
    $res1=connector2($sql1);
    $rows=getNumRows($res1);
    $total=ceil($rows/$pagtam);
    $sql=select($table,$array);
    if($_SESSION['s_dpto']==1 && $_SESSION['s_nivel']==2)
    {
    	$sql.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND s.fkestado=3 ";
    }
    else
    {
    	$sql.=" WHERE s.fkestado=e.pkestado AND s.fkusuario=u.pkusuario AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=1 ";
    }
    $sql.=" ORDER BY ".$orden." ".$type." LIMIT ".$pagtam." OFFSET ".$inicio;
    $res=connector2($sql);
    $arrayhead=array('Tareas','Solicitud Nro.','Usuario','Estado','Detalles');
    $arraydb=array('pksol','pksol','usu_nick','es_descrip','pksol');
    $title="SOLICITUDES";
    $del="frmdelsolicitudes.php";
    $frm="frminssolicitudes.php";

    //Muestra los Detalles
    $tableparte='detalle_solicitudes ds, insumos i, desinsumos di, tipos t';
    $arrayparte=array('fksol','desinsumo','pkdet','can_entregada','destipo','can_sol');
    $arraypartehead=array('TAREAS','Insumo','Tipo','Cantidad Entregada','Cantidad Solicitada');
    $arraypartedb=array('pkdet','desinsumo','destipo','can_entregada','can_sol');
    $whereparte =" WHERE ds.fkinsumo=i.pkinsumo AND i.fkdesinsumo=di.pkdesinsumo AND di.fktipo=t.pktipo AND fksol='";
    

    //Form aprobacion
    $tablesol='solicitudes s,usuarios u,departamentos d';
    $pksol='pksol';
    $dessol='pksol';
    $arraysele=array('pksol');
    if($_SESSION['s_nivel']==1 || $_SESSION['s_nivel']==2 || $_SESSION['s_nivel']==3)
    {
    	if($_SESSION['s_dpto']==1 && $_SESSION['s_nivel']==2)
        {
    		$if=" WHERE s.fkusuario=u.pkusuario AND d.pkdpto=u.fkdpto AND s.fkestado=3 ";
    	}
        else
        {
    		$if=" WHERE s.fkusuario=u.pkusuario AND d.pkdpto=u.fkdpto AND u.fkdpto='".$_SESSION['s_dpto']."' AND s.fkestado=1 ";
    	}
    }
    ?>
    <form id="frmapro" name="frmapro" action="updatesolicitudes.php" method="post">
      <table>
        <tr>
          <td>Aprobar Solicitud:</td>
          <td><select id="pk" name="pk"><?=seleif($datos,$tablesol,$pksol,$dessol,$if,$arraysele);?></select></td>
        </tr>
        <tr>
    			<?php
          if($_SESSION['s_dpto']==1 && $_SESSION['s_nivel']==2)
          {
            ?>
            <input type="hidden" name="estado" id="estado" value="4" />
            <?php
          }
          else
          {
            ?>
            <input type="hidden" name="estado" id="estado" value="3" />
            <?php
          }
          ?>
          <td colspan="2"><input class="boton" type="submit" id="send" name="send" value="Aprobar" /></td>
        </tr>
      </table>
    </form>
    <?php
    $show=$inicio+1 ." al ".$fin = min($pagtam * $page, $rows)." / Total de registros: ".$rows;
    page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$tableparte,$arrayparte,$arraypartedb,$arraypartehead,$whereparte,$user,$pass,$show,$updet,$deldet,$insdet)
    ?>
  </section>
</section>
</body>
</html>