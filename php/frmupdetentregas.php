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
        if($_GET['pk'])
        {
        	$table='detalle_entregas de, insumos i, tipos t ';
        	$array=array('pkdetent','fkentrega','ins_descrip','cantdetalle','destipo');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkdetent='".$_GET['pk']."' AND de.fkinsumo=i.pkinsumo AND i.fktipo=t.pktipo";
        	$res=connector2($sql);
        	$row=fetchArray($res);	
        	$pages='viewordenentregas.php';
        ?>
        <form id="frmupdetentregas" name="frmupdetentregas" method="post" action="updatedetentregas.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Detalles Orden de Entrega</th>
                </tr>
                <tr>
                	<td>Detalle Nro:</td>
                	<td><input type="hidden" id="pk" name="pk" value="<?=$_GET['pk']?>" /><?=$_GET['pk']?></td>
                </tr>        
                <tr>
                	<td>Solicitud Nro:</td>
                	<td><input type="text" disabled value="<?=$row['fkentrega']?>" /></td>
                </tr>
                <tr>
                	<td>Insumo</td>
                    <td><input type="text" disabled value="<?=$row['ins_descrip'].' '.$row['destipo']?>"/></td>
                </tr>
                <tr>
                	<td>Cantidad</td>
                    <td><input type="text" id="cant" name="cant" value="<?=$row['cantdetalle'] ?>" /></td>
                </tr>
                <tr>
                	<td><a href="<?=$pages?>" class="boton">Volver</a></td>
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
