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
        $table='insumos i, tipos t';
        $pkd='pkinsumo';
        $des='ins_descrip';  
        $des1='destipo';
        $fk1='i.fktipo';
        $pk1='t.pktipo';
        $array=array('pkinsumo','ins_descrip','destipo');
        ?>
        <form id="frminsdetalles" name="frminsdetalles" method="post" action="insertdetalles.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Detalles</th>
                </tr>
                <tr>
                	<td>Solicitud Nro:</td>
                	<td><input required type="hidden" id="pk" name="pk" value="<?=$pk?>" /><?=$pk?></td>
                </tr>
                <tr>
                	<td>
                    <a href="#" id="clone">[+]</a>
                    <div class="clone">
                    	<table>
                            <tr>
                                <td>Insumo
                                <td><select  id="insumo" name="insumo[]"><?php sele2($datos,$table,$pkd,$des,$des1,$array,$fk1,$pk1);?></select></td>
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