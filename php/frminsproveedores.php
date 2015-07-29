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
        $pages='viewproveedores.php';
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsproveedor" name="frminsproveedor" method="post" action="insertproveedores.php" >
        	<table>
            	<tr>
                	<th colspan="2">Cargar Proveedor</th>
                </tr>
                <tr>
                	<td>Proveedor</td>
                    <td><input type="text" id="name" name="name" /></td>
                </tr>
                <tr>
                	<td>Telefono</td>
                    <td><input type="text" id="phone" name="phone" /></td>
                </tr>
                <tr>
                	<td>Direccion</td>
                    <td><input type="text" id="dir" name="dir" /></td>
                </tr>
                <tr>
                	<td>Correo</td>
                    <td><input type="text" id="mail" name="mail" /></td>
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
        	$table='proveedores';
        	$arrray=array('pkprov','prov_nombre','prov_telefono','prov_direccion','prov_correo');
        	$sql=select($table,$arrray);
        	$sql.=" WHERE pkprov='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        ?>
        <form id="frminsproveedor" name="frminsproveedor" method="post" action="updateproveedores.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Proveedor</th>
                </tr>
                <tr>
                	<td>Proveedor</td>
                    <td><input type="text" id="name" name="name" value="<?=$row['prov_nombre']?>" /></td>
                </tr>
                <tr>
                	<td>Telefono</td>
                    <td><input type="text" id="phone" name="phone" value="<?=$row['prov_telefono']?>"  /></td>
                </tr>
                <tr>
                	<td>Direccion</td>
                    <td><input type="text" id="dir" name="dir" value="<?=$row['prov_direccion']?>"  /></td>
                </tr>
                <tr>
                	<td>Correo</td>
                    <td><input type="text" id="mail" name="mail" value="<?=$row['prov_correo']?>"  /></td>
                </tr>
                <tr>        	
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkprov']?>" />
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