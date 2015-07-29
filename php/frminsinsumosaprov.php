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
        $pages='viewinsumosaprov.php';
        $tableu='unidad_medidas';
        $pku='pkunidad';
        $desu='uni_descrip';
        $tabledi="desinsumos di, tipos t";
        $pkdi="pkdesinsumo";
        $desdi="desinsumo";
        $desdi1="destipo";
        $fk1="di.fktipo";
        $pk1="t.pktipo";
        $tableoc='orden_compras';
        $pkoc='pkordenc';
        $desoc='norden';
        $arrayu=array('pkunidad','uni_descrip');
        $arraydi=array('pkdesinsumo','desinsumo','destipo');
        $arrayoc=array('pkordenc','norden');
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsinsumosapro" name="frminsinsumosapro" method="post" action="insertinsumosaprov.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Insumo Aprovicionamiento</th>
                </tr>
                <tr>
                    <td>Insumo</td>
                    <td><select id="fkdesinsumo" name="fkdesinsumo"><?php sele2($datos,$tabledi,$pkdi,$desdi,$desdi1,$arraydi,$fk1,$pk1);?></select></td>
                </tr>
                <tr>
                    <td>Orden de compra</td>
                    <td><select id="ordenc" name="ordenc"><?php sele($datos,$tableoc,$pkoc,$desoc,$arrayoc);?></select></td>
                </tr>
                <tr>
                    <td>Unidad de medida</td>
                    <td><select id="unidad" name="unidad"><?php sele($datos,$tableu,$pku,$desu,$arrayu);?></select></td>
                </tr>
                <tr>
                    <td>Stock minimo</td>
                    <td><input type="text" id="stockmin" name="stockmin"/></td>
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
        	$table='insumos_aprov';
        	$arrayi=array('pkinsumoapro','fkdesinsumo','fkunidad','stockmin','fkordenc');
        	$sql=select($table,$arrayi);
        	$sql.=" WHERE pkinsumoapro='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsinsumos" name="frminsinsumos" method="post" action="updateinsumosaprov.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Insumo Aprovicionamiento</th>
                </tr>
                <tr>
                	<td>Insumo</td>
                    <td><select id="fkdesinsumo" name="fkdesinsumo"><?php sele2($row['fkdesinsumo'],$tabledi,$pkdi,$desdi,$desdi1,$arraydi,$fk1,$pk1);?></select></td>
                </tr>
                 <tr>
                    <td>Orden de compra</td>
                    <td><select id="ordenc" name="ordenc"><?php sele($row['fkordenc'],$tableoc,$pkoc,$desoc,$arrayoc);?></select></td>
                </tr>
                <tr>
                    <td>Unidad de medida</td>
                    <td><select id="unidad" name="unidad"><?php sele($row['fkunidad'],$tableu,$pku,$desu,$arrayu);?></select></td>
                </tr>
                 <tr>
                    <td>Stock Minimo</td>
                    <td><input type="text" id="stockmin" name="stockmin" value="<?=$row['stockmin']?>"/></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkinsumoapro']?>" />
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