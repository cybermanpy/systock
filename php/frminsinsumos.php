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
        $pages='viewinsumos.php';
        $tableu='unidad_medidas';
        $pku='pkunidad';
        $desu='uni_descrip';
        $tabledi="desinsumos di, tipos t";
        $pkdi="pkdesinsumo";
        $desdi="desinsumo";
        $desdi1="destipo";
        $fk1="di.fktipo";
        $pk1="t.pktipo";
        $arrayu=array('pkunidad','uni_descrip');
        $arraydi=array('pkdesinsumo','desinsumo','destipo');
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsinsumos" name="frminsinsumos" method="post" action="insertinsumos.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Insumo</th>
                </tr>
                <tr>
                    <td>Insumo</td>
                    <td><select id="fkdesinsumo" name="fkdesinsumo"><?php sele2($datos,$tabledi,$pkdi,$desdi,$desdi1,$arraydi,$fk1,$pk1);?></select></td>
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
        	$table='insumos';
        	$arrayi=array('pkinsumo','fkdesinsumo','fkunidad','stockmin');
        	$sql=select($table,$arrayi);
        	$sql.=" WHERE pkinsumo='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsinsumos" name="frminsinsumos" method="post" action="updateinsumos.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Insumo</th>
                </tr>
                <tr>
                	<td>Insumo</td>
                    <td><select id="fkdesinsumo" name="fkdesinsumo"><?php sele2($row['fkdesinsumo'],$tabledi,$pkdi,$desdi,$desdi1,$arraydi,$fk1,$pk1);?></select></td>
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
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkinsumo']?>" />
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