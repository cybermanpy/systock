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
        $pages='viewunidadmedida.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsunidadmedida" name="frminsunidadmedida" method="post" action="insertunidadmedida.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Unidad Medida</th>
                </tr>
                <tr>
                	<td>Unidad Medida</td>
                    <td><input type="text" id="unidad" name="unidad" /></td>
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
        	$table='unidad_medidas';
        	$array=array('pkunidad','uni_descrip');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkunidad='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsunidadmedida" name="frminsunidadmedida" method="post" action="updateunidadmedida.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Unidad Medida</th>
                </tr>
                <tr>
                	<td>Unidad Medida</td>
                    <td><input type="text" id="unidad" name="unidad" value="<?=$row['uni_descrip']?>" /></td>
                </tr>
                <tr>        	
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkunidad']?>" />
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