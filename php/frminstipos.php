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
        $pages='viewtipos.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminstipos" name="frminstipos" method="post" action="inserttipos.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Tipos</th>
                </tr>
                <tr>
                	<td>Tipo</td>
                    <td><input type="text" id="tipo" name="tipo" /></td>
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
        	$table='tipos';
        	$array=array('pktipo','destipo');
        	$sql=select($table,$array);
        	$sql.=" WHERE pktipo='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminstipos" name="frminstipos" method="post" action="updatetipos.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Tipo</th>
                </tr>
                <tr>
                	<td>Tipo</td>
                    <td><input type="text" id="tipo" name="tipo" value="<?=$row['destipo']?>" /></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pktipo']?>" />
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