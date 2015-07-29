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
        $pages='viewestados.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsestado" name="frminsestado" method="post" action="insertestados.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Estado</th>
                </tr>
                <tr>
                	<td>Estado</td>
                    <td><input type="text" id="estado" name="estado" /></td>
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
        	$table='estados';
        	$array=array('pkestado','es_descrip');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkestado='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsestado" name="frminsestado" method="post" action="updateestados.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Estado</th>
                </tr>
                <tr>
                	<td>Estado</td>
                    <td><input type="text" id="estado" name="estado" value="<?=$row['es_descrip']?>" /></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkestado']?>" />
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