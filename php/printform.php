<?php
include 'session.php';
include '../includes/charset.php';
include '../includes/DbConnector.php';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/stylesmainprint.css" />
<title>.:SYSTOCK::.</title>
</head>

<body>
<?php
$table="solicitudes s, detalle_solicitudes ds, usuarios u, departamentos d, direcciones dir, insumos i, tipos t, desinsumos di";
$array1=array('pksol','sol_fecha','fkestado','usu_nick','usu_firstname','usu_lastname','desinsumo','dep_descrip','destipo');
$sql=select($table,$array1);
$sql.=" WHERE i.pkinsumo=ds.fkinsumo AND s.pksol=ds.fksol AND u.fkdpto=d.pkdpto AND d.fkdir=dir.pkdir AND s.fkusuario=u.pkusuario AND di.fktipo=t.pktipo AND i.fkdesinsumo=di.pkdesinsumo AND pksol='".$_GET['pk']."'";
$res=connector2($sql);
$row=fetchArray($res);
?>
<table class="tableprint">
	<tr>
    	<td colspan="4"><div id="banner"><br><img class="imgbanner" src="../img/logoMH.png" />SUB SECRETARÍA DE ECONOMÍA</div></td>
    </tr>
    <tr>
    	<th colspan="4">DEPARTAMENTO ADMINISTRATIVO</th>
    </tr>
    <tr>
        <th colspan="4">SOLICITUD DE INSUMOS</th>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</table>
<table class="tableprint1">
    <tbody>
    	<tr>
        	<td colspan="2">Dependencia Solicitante: <?=$row['dep_descrip']?></td>
            <td colspan="2">Fecha: <?=$row['sol_fech']?></td>
        </tr>
        <tr>
        	<td  colspan="2">Observación:</td>
            <td colspan="2"><br>Firma Responsable: _ _  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </td>
        </tr>
        <tr bgcolor="#CCCCCC">
        	<td>N°</td>
            <td>Cantidad</td>
            <td>Descripción</td>
            <td>Cantidad entregada</td>
        </tr>
        	<?php
			$table1="detalle_solicitudes ds, insumos i, tipos t, desinsumos di";
			$arrayins=array('pkdet','fksol','fkinsumo','can_entregada','desinsumo','destipo');
			$sql1=select($table1,$arrayins);
			$sql1.=" WHERE ds.fkinsumo=i.pkinsumo AND di.fktipo=t.pktipo AND i.fkdesinsumo=di.pkdesinsumo AND fksol='".$_GET['pk']."'";
			$res1=connector2($sql1);
			while($row1=fetchArray($res1)){
				?>
                <tr>
                    <td><?=$row1['pkdet']?></td>
                    <td><?=$row1['can_entregada']?></td>
                    <td><?=$row1['desinsumo']." ".$row1['destipo']?></td>
                    <td><?=$row1['can_entregada']?></td>
                </tr>
                <?php
			}
			?>
        <tr>
        	<td colspan="2"></td>
            <td colspan="2" bgcolor="#CCCCCC">Conformidad</td>
        </tr>
        <tr>
        	<td colspan="2">Responsable de la entrega: <?=$_SESSION['s_name']?></td>
            <td colspan="2">Funcionario: <?=$row['usu_firstname']." ".$row['usu_lastname']?></td>
        </tr>
        <tr>
        	<td colspan="2">Verificado por: </td>
            <td colspan="2"><br>Firma: _ _  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </td>
        </tr>
        <tr>
        	<td colspan="2"><br><br>V° B° Jefe Departamento: _ _  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</td>
            <td colspan="2">N°: <?=$row['pksol']?></td>
        </tr>
    </tbody>
</table>
</body>
</html>