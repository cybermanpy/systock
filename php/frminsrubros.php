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
        $pages='viewrubros.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsrubros" name="frminsrubros" method="post" action="insertrubros.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Rubros</th>
                </tr>
                <tr>
                	<td>Tipo</td>
                    <td><input type="text" id="tipo" name="tipo" /></td>
                </tr>
                <tr>
                	<td>Rubro</td>
                    <td><input type="text" id="rubro" name="rubro" /></td>
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
        	$table='rubros';
        	$array=array('pkrubro','tip_descrip','rubro');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkrubro='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsrubros" name="frminsrubros" method="post" action="updaterubros.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Rubros</th>
                </tr>
                <tr>
                	<td>Tipo</td>
                    <td><input type="text" id="tipo" name="tipo" value="<?=$row['tip_descrip']?>" /></td>
                </tr>
                <tr>
                	<td>Rubro</td>
                    <td><input type="text" id="rubro" name="rubro" value="<?=$row['rubro']?>" /></td>
                </tr>
                <tr>        	
                    <td><a href="<?=$pages?>" class="boton" >Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkrubro']?>" />
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