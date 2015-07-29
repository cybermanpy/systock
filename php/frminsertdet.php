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
        $table='insumos i, desinsumos di, tipos t';
        $pkd='pkinsumo';
        $des='desinsumo';  
        $des1='destipo';
        $fk1='i.fkdesinsumo';
        $pk1='di.pkdesinsumo';
        $fk2='di.fktipo';
        $pk2='t.pktipo';
        $ifcan=" AND stock<>0 ";
        $array=array('pkdesinsumo','desinsumo','destipo','pkinsumo');
        ?>
        <form id="frminsertdet" name="frminsertdet" method="post" action="insertdetalles.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Detalles</th>
                </tr>
                <tr>
                	<td>Solicitud Nro:</td>
                	<td><input type="hidden" id="pk" name="pk" value="<?=$_GET['pk']?>" /><?=$_GET['pk']?></td>
                </tr>
                <tr>
                	<td>
                        <a href="#" class="add">Add</a>
                        <div id="displayblock">
                            <div id="mainDiv">
                                <table>
                                    <tr>
                                        <td>Insumo</td>
                                        <td><select id="insumo" name="insumo[]"><?php sele6($datos,$table,$pkd,$des,$des1,$array,$fk1,$pk1,$fk2,$pk2,$ifcan);?></select></td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td><input type="text" id="cant" name="cant[]" /></td>
                                    </tr>
                                </table>
                            </div>
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