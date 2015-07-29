<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
?>
<!doctype html>
<html lang="es">
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
        $user=$_SESSION['s_pk'];
        if($_SESSION['s_nivel']==1 || $_SESSION['s_nivel']==2 || $_SESSION['s_nivel']==3)
        {
        	$pages='viewdetallestoapro.php';
        }
        else
        {
        	$pages='viewdetallesuser.php';
        }
        $table='departamentos';
        $pkd='pkdpto';
        $des='dep_descrip';
        $tablee='estados';
        $pke='pkestado';
        $dese='es_descrip';
        $tableu='usuarios';
        $pku='pkusuario';
        $desu='usu_nick';
        $arraye=array('pkestado','es_descrip');
        $arrayu=array('pkusuario','usu_nick');
        $datose=1;
        if($_SESSION['s_nivel']==1 || $_SESSION['s_nivel']==2 || $_SESSION['s_nivel']==3)
        {
         	$if=" ";
        }
        else
        {
        	$if=" WHERE pkestado='2' OR pkestado = '1' ";
        }
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminssolicitudes" name="frminssolicitudes" method="post" action="insertsolicitudes.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Solicitud</th>
                </tr>
                <tr>
                	<td>Estado</td>
                    <td><select disabled id="estado" name="estado"><?php sele($datose,$tablee,$pke,$dese,$arraye);?></select><input type="hidden" id="estado1" name="estado1" value="1"></td>
                </tr>
                <tr>
                	<td>Usuario Solicitante</td>
                    <td><select disabled id="user" name="user"><?php sele($user,$tableu,$pku,$desu,$arrayu);?></select><input type="hidden" id="user1" name="user1" value="<?=$user?>"/></td>
                </tr>
                <tr>
                	<td colspan="2"><input class="boton" type="submit" id="send" value="Guardar" /></td>
                </tr>
            </table>
        </form>
        <?php
        }
        else
        {
        	$table='solicitudes';
        	$arrays=array('pksol','fkestado','fkusuario');
        	$sql=select($table,$arrays);
        	$sql.=" WHERE pksol='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminssolicitudes" name="frminssolicitudes" method="post" action="updatesolicitudes.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Solicitud</th>
                </tr>
                <tr>
                	<td>Estado</td>
                    <td><select id="estado" name="estado"><?php seleif($row['fkestado'],$tablee,$pke,$dese,$if,$arraye);?></select></td>
                </tr>
                <tr>
                	<td>Usuario Solicitante</td>
                    <td><select disabled id="user" name="user"><?php sele($row['fkusuario'],$tableu,$pku,$desu,$arrayu);?></select></td>
                </tr>
                <tr>        	
                    <td><a href="<?=$pages?>" class="boton" >Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pksol']?>" />
                    <td><input class="boton" type="submit" id="send" value="Guardar" /></td>
                </tr>
            </table>
        </form>
        <?php
        }
        ?>
    </section>
</section>
</body>
</html>