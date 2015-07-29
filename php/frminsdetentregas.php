<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
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
        $table='insumos';
        $pkd='pkinsumo';
        $des='ins_descrip';
        $pages='viewdetentregas.php';
        $array=array('pkinsumo','ins_descrip');
        ?>
        <form id="frminsdetentregas" name="frminsdetentregas" method="post" action="insertdetentregas.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Detalles Orden de Entrega</th>
                </tr>
                <tr>
                	<td>Solicitud Nro:</td>
                	<td><input required type="hidden" id="pk" name="pk" value="<?=$pk?>" /><?=$pk?></td>
                </tr>
                <tr>
                	<td>
                    <a href="#" class="add" rel=".clone">[+]</a>
                    <div class="clone">
                    	<table>
                            <tr>
                                <td>Insumo</td>
                                <td><select  id="insumo" name="insumo[]"><?php sele($datos,$table,$pkd,$des,$array);?></select></td>
                            </tr>
                            <tr>
                                <td>Cantidad</td>
                                <td><input  type="text" id="cant" name="cant[]" /></td>
                            </tr>
                        </table>
                    </div>
                    </td>
                </tr>
                <tr>
                	<td colspan="2"><input class="boton" type="submit" id="send" value="Guardar" /></td>
                </tr>
            </table>
        </form>
    </section>
</section>
</body>
</html>