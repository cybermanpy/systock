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
        $arrayt=array('pktipo','destipo');
        $tabler='rubros';
        $pkr='pkrubro';
        $desr='tip_descrip';
        $arrayr=array('pkrubro','tip_descrip');
        $pages='viewdesinsumos.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsdesinsumos" name="frminsdesinsumos" method="post" action="insertdesinsumos.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Descripción Insumos</th>
                </tr>
                <tr>
                	<td>Descripción</td>
                    <td><input type="text" id="des" name="des" /></td>
                </tr>
                <tr>
                	<td>Tipo</td>
                	<td><select id="tipo" name="tipo"><?php sele($datos,$tablet,$pkt,$dest,$arrayt);?></select></td>
                </tr>
                <tr>
                    <td>Rubro</td>
                    <td><select id="rubro" name="rubro"><?php sele($datos,$tabler,$pkr,$desr,$arrayr);?></select></td>
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
        	$table='desinsumos';
        	$arraydpto=array('pkdesinsumo','desinsumo','fktipo','fkrubro');
        	$sql=select($table,$arraydpto);
        	$sql.=" WHERE pkdesinsumo='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsdesinsumos" name="frminsdesinsumos" method="post" action="updatedesinsumos.php">
        	<table>
                <tr>
                    <th colspan="2">Cargar Descripción Insumos</th>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><input type="text" id="des" name="des" value="<?=$row['desinsumo']?>"/></td>
                </tr>
                <tr>
                    <td>Tipo</td>
                    <td><select id="tipo" name="tipo"><?php sele($row['fktipo'],$tablet,$pkt,$dest,$arrayt);?></select></td>
                </tr>
                <tr>
                    <td>Rubro</td>
                    <td><select id="rubro" name="rubro"><?php sele($row['fkrubro'],$tabler,$pkr,$desr,$arrayr);?></select></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkdesinsumo']?>" />
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