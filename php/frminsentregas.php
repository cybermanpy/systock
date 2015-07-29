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
        $tablep='proveedores';
        $pkp='pkprov';
        $desp='prov_nombre';
        $arrayp=array('pkprov','prov_nombre');
        $pages='viewordenentregas.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsentregas" name="frminsentregas" method="post" action="insertentregas.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Entregas</th>
                </tr>
                <tr>
                	<td>Descripción</td>
                    <td><input type="text" id="des" name="des" /></td>
                </tr>
                <tr>
                	<td>Fecha</td>
                    <td><input type="text" name="fecha" id="fecha" /></td>
                </tr>
                <tr>
                	<td>Nro. orden de entrga</td>
                    <td><input type="text" id="norden" name="norden" /></td>
                </tr>
                <!-- <tr>
                	<td>Nro. orden de compra</td>
                    <td><input type="text" id="ncompra" name="ncompra" /></td>
                </tr> -->
                <tr>
                	<td>Proveedor</td>
                	<td><select id="prov" name="prov"><?php sele($datos,$tablep,$pkp,$desp,$arrayp);?></select></td>
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
        	$table='entregas';
        	$array=array('pkentrega','fkprov','desentrega','norden');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkentrega='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsentregas" name="frminsentregas" method="post" action="updateentregas.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Entregas</th>
                </tr>
                <tr>
                	<td>Descripcion</td>
                    <td><input type="text" id="des" name="des" value="<?=$row['desentrega']?>" /></td>
                </tr>
                <tr>
                	<td>Nro. orden de entrga</td>
                    <td><input type="text" id="norden" name="norden" value="<?=$row['norden']?>" /></td>
                </tr>
                <tr>
                	<td>Proveedor</td>
                	<td><select id="prov" name="prov"><? sele($row['fkprov'],$tablep,$pkp,$desp,$arrayp);?></select></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkentrega']?>" />
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