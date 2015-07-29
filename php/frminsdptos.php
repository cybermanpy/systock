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
        $table='direcciones';
        $pkd='pkdir';
        $des='dir_descrip';
        $pages='viewdptos.php';
        $array=array('pkdir','dir_descrip');
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsdptos" name="frminsdptos" method="post" action="insertdptos.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Departamentos</th>
                </tr>
                <tr>
                	<td>Departamento</td>
                    <td><input type="text" id="dpto" name="dpto" /></td>
                </tr>
                <tr>
                	<td>Direccion</td>
                	<td><select id="dir" name="dir"><?php sele($datos,$table,$pkd,$des,$array);?></select></td>
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
        	$table='departamentos';
        	$arraydpto=array('pkdpto','dep_descrip','fkdir');
        	$sql=select($table,$arraydpto);
        	$sql.=" WHERE pkdpto='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        	$table1='direcciones';
        	
        ?>
        <form id="frminsdptos" name="frminsdptos" method="post" action="updatedptos.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Departamentos</th>
                </tr>
                <tr>
                	<td>Departamento</td>
                    <td><input type="text" id="dpto" name="dpto" value="<?=$row['dep_descrip']?>" /></td>
                </tr>
                <td>Direccion</td>
                	<td><select id="dir" name="dir"><?php sele($row['fkdir'],$table1,$pkd,$des,$array);?></select></td>
                <tr>        	
                    <td><a href="<?=$pages?>" class="boton" >Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkdpto']?>" />
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