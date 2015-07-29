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
        $tablet='tipos';
        $pkt='pktipo';
        $dest='destipo';
        $tablei='insumos';
        $pki='pkinsumo';
        $desi='ins_descrip';
        $tableu='unidad_medidas';
        $pku='pkunidad';
        $desu='uni_descrip';
        $pages='viewinsumostipos.php';
        $arrayt=array('pktipo','destipo');
        $arrayi=array('pkinsumo','ins_descrip');
        $arrayu=array('pkunidad','uni_descrip');
        if(!$_GET['fki'] && !$_GET['fkt'])
        {
        ?>
        <form id="frminsinsumostipos" name="frminsinsumostipos" method="post" action="insertinsumostipos.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Insumos</th>
                </tr>
                <tr>
                	<td>Insumo</td>
                    <td><select id="insumo" name="insumo"><?php sele($datos,$tablei,$pki,$desi,$arrayi);?></select></td>
                </tr>
                <tr>
                	<td>Tipo</td>
                	<td><select id="tipo" name="tipo"><?php sele($datos,$tablet,$pkt,$dest,$arrayt);?></select></td>
                </tr>
                <tr>
                    <td>Unidad de Medida</td>
                    <td><select id="unidad" name="unidad"><?php sele($datos,$tableu,$pku,$desu,$arrayu);?></select></td>
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
        	$table='tipos_insumos';
        	$arrayinsumo=array('fkinsumo','fktipo','fkunidad');
        	$sql=select($table,$arrayinsumo);
        	$sql.=" WHERE fkinsumo='".$_GET['fki']."' AND fktipo ='".$_GET['fkt']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        	$table1='tipos_insumos';
        	
        ?>
        <form id="frminsinsumostipos" name="frminsinsumostipos" method="post" action="updateinsumostipos.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Insumos</th>
                </tr>
                <tr>
                    <td>Unidad Medida</td>
                    <td><select id="unidad" name="unidad"><?php sele($row['fkunidad'],$tableu,$pku,$desu,$arrayu);?></select></td>
                </tr>
                <tr>        	
                    <td><a href="<?=$pages?>" class="boton" >Volver</a></td>
                    <input type="hidden" id="fki" name="fki" value="<?=$row['fkinsumo']?>" />
                    <input type="hidden" id="fkt" name="fkt" value="<?=$row['fktipo']?>" />
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