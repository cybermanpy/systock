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
        	$table='detalle_solicitudes ds, insumos i, solicitudes s, desinsumos di, tipos t ';
        	$array=array('pkdet','fksol','desinsumo','destipo','can_entregada');
        	$sql=select($table,$array);
        	$sql.=" WHERE pkdet='".$_GET['pk']."' AND ds.fkinsumo=i.pkinsumo AND s.pksol=ds.fksol AND i.fkdesinsumo=di.pkdesinsumo AND di.fktipo=t.pktipo ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        	if($_SESSION['s_nivel']==2 || $_SESSION['s_nivel']==3)
            {
        		$pages='viewdetallestoapro.php';
        	}
            else
            {
        		$pages='viewdetallesuser.php';
        	}
        ?>
        <form id="frmupdetalles" name="frmupdetalles" method="post" action="updatedetalles1.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Detalles</th>
                </tr>
                <tr>
                	<td>Detalle Nro:</td>
                	<td><input type="hidden" id="pk" name="pk" value="<?=$_GET['pk']?>" /><?=$_GET['pk']?></td>
                </tr>        
                <tr>
                	<td>Solicitud Nro:</td>
                	<td><input type="text" disabled value="<?=$row['fksol']?>" /></td>
                </tr>
                <tr>
                	<td>Insumo</td>
                    <td><input type="text" disabled value="<?=$row['desinsumo'].' '.$row['destipo']?>"/></td>
                </tr>
                <tr>
                	<td>Cantidad Entregada</td>
                    <td><input type="text" id="cant" name="cant" value="<?=$row['can_entregada'] ?>" /></td>
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
