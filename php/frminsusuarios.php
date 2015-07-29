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
        $pages='viewusuarios.php';
        $table='departamentos d, direcciones dir';
        $pk='pkdpto';
        $des='dep_descrip';
        $des1='dir_descrip';
        $fk1='d.fkdir';
        $pk1='dir.pkdir';
        $arraydpto=array('pkdpto','dep_descrip','dir_descrip');
        if(!$_GET['pk'])
        {
        ?>
        <form id="frminsusuarios" name="frminsusuarios" method="post" action="insertusuarios.php">
        	<table>
            	<tr>
                	<th colspan="2">Cargar Usuario</th>
                </tr>
                <tr>
                	<td>Usuario</td>
                    <td><input type="text" id="user" name="user" /></td>
                </tr>
                <tr>
                	<td>Password</td>
                    <td><input type="password" id="pass" name="pass" /></td>
                </tr>
                <tr>
                	<td>Nombre</td>
                    <td><input type="text" id="firstname" name="firstname" /></td>
                </tr>
                <tr>
                	<td>Apellido</td>
                    <td><input type="text" id="lastname" name="lastname" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" id="email" name="email"></input></td>
                </tr>
                <tr>
                	<td>Departamento</td>
                    <td><select id="dpto" name="dpto"><?php sele2($datos,$table,$pk,$des,$des1,$arraydpto,$fk1,$pk1);?></select></td>
                </tr>
                <?php
        		$array=array('1','2','3','4');
        		?>
                <tr>
                	<td>Nivel</td>
                    <td><select id="nivel" name="nivel"><?php sele1($datos,$array);?></select></td>
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
        	$table='usuarios';
        	$arrayu=array('pkusuario','usu_nick','usu_pass','fkdpto','usu_nivel','usu_firstname','usu_lastname','email');
        	$sql=select($table,$arrayu);
        	$sql.=" WHERE pkusuario='".$_GET['pk']."' ";
        	$res=connector2($sql);
        	$row=fetchArray($res);
        	$tabled='departamentos d, direcciones dir';
        	$pkd='pkdpto';
        	$desd='dep_descrip';
            $desd1='dir_descrip';
            $fk1='d.fkdir';
            $pk1='dir.pkdir'
        ?>
        <form id="frminsusuarios" name="frminsusuarios" method="post" action="updateusuarios.php">
        	<table>
            	<tr>
                	<th colspan="2">Actualizar Usuario</th>
                </tr>
                <tr>
                	<td>Usuario</td>
                    <td><input type="text" id="user" name="user" value="<?=$row['usu_nick']?>" /></td>
                </tr>
                <tr>
                	<td>Nuevo Password</td>
                    <td><input type="password" id="pass" name="pass" /></td>
                </tr>
                <tr>
                	<td>Nombre</td>
                    <td><input type="text" id="firstname" name="firstname" value="<?=$row['usu_firstname']?>" /></td>
                </tr>
                <tr>
                	<td>Apellido</td>
                    <td><input type="text" id="lastname" name="lastname" value="<?=$row['usu_lastname']?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" id="email" name="email" value="<?=$row['email']?>"></input></td>
                </tr>
                <tr>
                	<td>Departamento</td>
                    <td><select id="dpto" name="dpto"><?php sele2($row['fkdpto'],$tabled,$pkd,$desd,$des1,$arraydpto,$fk1,$pk1);?></select></td>
                </tr>
                <?php
        		$array=array('1','2','3','4');
        		?>
                <tr>
                	<td>Nivel</td>
                    <td><select id="nivel" name="nivel"><?php sele1($row['usu_nivel'],$array);?></select></td>
                </tr>
                <tr>
                    <td><a href="<?=$pages?>" class="boton">Volver</a></td>
                    <input type="hidden" id="pk" name="pk" value="<?=$row['pkusuario']?>" />
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