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
        $pages='viewdetordencompras.php';
        $tableu='unidad_medidas';
        $pku='pkunidad';
        $desu='uni_descrip';
        $tabledi="insumos_aprov ia, desinsumos di, tipos t ";
        $pkdi="pkinsumoapro";
        $desdi="desinsumo";
        $desdi1="destipo";
        $fk1="ia.fkdesinsumo";
        $pk1="di.pkdesinsumo";
        $fk2="di.fktipo";
        $pk2="t.pktipo";
        $tableoc='orden_compras';
        $pkoc='pkordenc';
        $desoc='norden';
        $arrayu=array('pkunidad','uni_descrip');
        $arraydi=array('pkinsumoapro','desinsumo','destipo');
        $arrayoc=array('pkordenc','norden');
        $if=" fkordenc=".$_GET['pk'];
        $ifoc=" WHERE pkordenc=".$_GET['pk'];
        ?>
        <form id="frminsdetordencompras" name="frminsdetordencompras" method="post" action="insertdetordencompras.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Insumo Aprovicionamiento</th>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="add">Add</a>
                        <div id="displayblock">
                            <div id="mainDiv">
                                <table>
                                    <tr>
                                        <td>Insumo</td>
                                        <td><select id="insumo" name="insumo[]"><?php seleif2($datos,$tabledi,$pkdi,$desdi,$desdi1,$if,$arraydi,$fk1,$pk1,$fk2,$pk2);?></select></td>
                                    </tr>
                                    <tr>
                                        <td>Orden de compra</td>
                                        <td><select id="ordenc" name="ordenc[]"><?php seleif($_GET['pk'],$tableoc,$pkoc,$desoc,$ifoc,$arrayoc);?></select></td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td><input type="text" id="cantidad" name="cantidad[]"/></td>
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