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
        $pages='viewdir.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsdir" name="frminsdir" method="post" action="insertdir.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Direccion</th>
                </tr>
                <tr>
                	<td>Direccion</td>
                    <td><input type="text" id="dir" name="dir" /></td>
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
        	$table='direcciones';
        	$array=array('pkdir','dir_descrip');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkdir='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsdir" name="frminsdir" method="post" action="updatedir.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Direccion</th>
                </tr>
                <tr>
                	<td>Direccion</td>
                    <td><input type="text" id="dir" name="dir" value="<?=$row['dir_descrip']?>" /></td>
                </tr>
                <tr>
                	
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkdir']?>" />
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