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
      $fki=$_GET['fki'];
      $fkt=$_GET['fkt'];
      $table1='tipos_insumos ti, insumos i, tipos t';
      $table='tipos_insumos';
      $array=array('fkinsumo','fktipo','ins_descrip','destipo');
      $sql=select($table1,$array);
      $sql.=" WHERE ti.fkinsumo=i.pkinsumo AND ti.fktipo=t.pktipo AND fkinsumo='".$fki."' AND fktipo='".$fkt."' ";
      $res = connector2($sql);
      $row=fetchArray($res);
      $rows=getNumRows($res);
      $fkt1='fkinsumo';
      $fkt2='fktipo';
      $pages='viewinsumostipos.php';
      if($rows>0)
      {
      ?>
      <form id="form" name="form" method="post" action="delete1.php">
      <input type="hidden" id="table" name="table" value="<?=$table?>">
      <input type="hidden" id="fkt1" name="fkt1" value="<?=$fkt1?>">
      <input type="hidden" id="fkt2" name="fkt2" value="<?=$fkt2?>">
      <input type="hidden" id="page" name="page" value="<?=$pages?>">
      <table>
        <tr>
        	<th colspan="2">Borrar Insumo</th>
        </tr>
        <tr>
          <td>Insumo </td>
          <td><input type="hidden" id="fk1" name="fk1" value="<?=$fki?>" /><?=$row['ins_descrip'];?></td>
        </tr>
        <tr>
          <td>Tipo</td>
          <td><input type="hidden" id="fk2" name="fk2"  value="<?=$fkt?>" /><?=$row['destipo'];?></td>
        </tr>
        <tr>
          <td><a href="<?=$pages?>" class="boton">Volver</a></td>
          <td><input id="delete" type="submit" class="boton" value="Borrar" ></td>
        </tr>
      </table>
      </form>
      <?
      }
      ?>
    </section>
</section>
</body>
</html>