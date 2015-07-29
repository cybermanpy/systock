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
        $table='insumos_aprov i, desinsumos di, tipos t, orden_compras oc';
        $pkd='pkinsumoapro';
        $fkdes='fkdesinsumo';
        $norden='fkordenc';
        $des='desinsumo';  
        $des1='destipo';
        $des2='norden';
        $fk1='i.fkdesinsumo';
        $pk1='di.pkdesinsumo';
        $fk2='di.fktipo';
        $pk2='t.pktipo';
        $fk3='i.fkordenc';
        $pk3='oc.pkordenc';
        $ifcan=" AND stock <> 0 ";
        $array=array('pkinsumoapro','desinsumo','destipo','norden','fkdesinsumo','fkordenc');
        ?>
        <form id="frminsaddetentregas" name="frminsaddetentregas" method="post" action="insertdetentregas.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Detalles Orden de Entrega</th>
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
                                        <td><select id="insumo" name="insumo[]"><?php sele5($datos,$table,$pkd,$des,$des1,$des2,$array,$fk1,$pk1,$fk2,$pk2,$fk3,$pk3,$fkdes,$norden,$ifcan);?></select></td>
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