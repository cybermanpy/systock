<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
?>
<!doctype html>
<html lang="es">
<head>
    <?php include 'head.html';?>
<title>.::SYSTOCK::.</title>
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
        $pages='viewordencompras.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsordencompras" name="frminsordencompras" method="post" action="insertordencompras.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Orden de Compra</th>
                </tr>
                <tr>
                	<td>Nro de Orden</td>
                    <td><input type="text" id="norden" name="norden" /></td>
                </tr>
                <tr>
                	<td>Fecha</td>
                	<td><input type="text" id="fecha" name="fecha" /></td>
                </tr>
                <tr>
                	<td colspan="2"><input class="boton" type="submit" id="send" name="send" value="Guardar" /></td>
                </tr>
            </table>
        </form>
        <?php
        }
        else
        {
        	$table='orden_compras';
        	$array=array('pkordenc','norden','fecha');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkordenc='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsordencompras" name="frminsordencompras" method="post" action="updateordencompras.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Direccion</th>
                </tr>
                <tr>
                	<td>Direccion</td>
                    <td><input type="text" id="norden" name="norden" value="<?=$row['norden']?>" /></td>
                </tr>
                 <tr>
                	<td>Fecha</td>
                	<td><input type="text" id="fecha" name="fecha" value="<?=$row['fecha']?>" /></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkordenc']?>" />
                    <td><input class="boton" type="submit" id="send" name="send" value="Guardar" /></td>
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