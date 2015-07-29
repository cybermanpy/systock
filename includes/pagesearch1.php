<?php
function page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$filtro1,$filtro2,$filtro3,$filtro4,$filtro5,$filtro6){
if($filtro3=="" && $filtro4==""){
  ?>
  <form id="frmsearch" name="frmsearch" action="<?=$index?>" method="post">
	  <table>
		  <tr>
			  <td>Filtro:</td>
			  <td><input type="text" id="term" name="term" /></td>
			  <td><?=$filtro1?></td>
			  <td><input type="radio" name="radio" value="1" checked="checked" /><td>
			  <td><?=$filtro2?></td>
			  <td><input type="radio" name="radio" value="2" /></td>
		  </tr>
		  <tr>
			  <td colspan="3"><a href="<?=$index?>?a=reset" class="boton">Limpiar</a></td>
        <td colspan="4"><input class="boton" type="submit" value="Aplicar" /></td>
		  </tr>
	  </table>
  </form>
  <?php
}else{
	if($filtro5=="" && $filtro6==""){
		?>
        <form id="frmsearch" name="frmsearch" action="" method="post">
          <table>
              <tr>
                  <td>Filtro:</td>
                  <td><input type="text" id="term" name="term" /></td>
                  <td><?=$filtro1?></td>
                  <td><input type="radio" name="radio" value="1" checked="checked" /><td>
                  <td><?=$filtro2?></td>
                  <td><input type="radio" name="radio" value="2" /></td>
                  <td><?=$filtro3?></td>
                  <td><input type="radio" name="radio" value="3" /></td>
                  <td><?=$filtro4?></td>
                  <td><input type="radio" name="radio" value="4" /></td>
              </tr>
              <tr>
                  <td colspan="5"><a href="<?=$index?>?a=reset" class="boton">Limpiar</a></td>
                  <td colspan="6"><input class="boton" type="submit" value="Aplicar" /></td>
              </tr>
          </table>
        </form>
		<?php
	}else{
		?>
        <form id="frmsearch" name="frmsearch" action="" method="post">
          <table>
              <tr>
                  <td>Filtro:</td>
                  <td><input type="text" id="term" name="term" /></td>
                  <td><?=$filtro1?></td>
                  <td><input type="radio" name="radio" value="1" checked="checked" /><td>
                  <td><?=$filtro2?></td>
                  <td><input type="radio" name="radio" value="2" /></td>
                  <td><?=$filtro3?></td>
                  <td><input type="radio" name="radio" value="3" /></td>
                  <td><?=$filtro4?></td>
                  <td><input type="radio" name="radio" value="4" /></td>
                  <td><?=$filtro5?></td>
                  <td><input type="radio" name="radio" value="5" /></td>
                  <td><?=$filtro6?></td>
                  <td><input type="radio" name="radio" value="6" /></td>
              </tr>
              <tr>
                  <td colspan="7"><a href="<?=$index?>?a=reset" class="boton">Limpiar</a></td>
                  <td colspan="8"><input class="boton" type="submit" value="Aplicar" /></td>
              </tr>
          </table>
        </form>
		<?php		
	}
}
  $cant=count($arrayhead);
 $odd="#FFFFFF";
  $even="#F8F8FF";
  $head="#F1EFF1";
  // $plus="../img/vector/plus_alt.svg";
  // $cross="../img/vector/x.svg";
  // $pencil="../img/vector/pen_alt2.svg";
  $plus="../img/add.png";
  $cross="../img/delete.png";
  $pencil="../img/edit.png";
  $first="../img/skip_backward.png";
  $last="../img/skip_forward.png";
  $next="../img/arrow_right.png";
  $prev="../img/arrow_left.png";
  ?>
  <table>
  	<tr bgcolor="<?=$head?>">
    	<th colspan="<?=$cant?>"><?=$title?></th>
    </tr>
	<tr bgcolor="<?=$head?>">
		<?php
		for($ihead=0;$ihead<count($arrayhead);$ihead++){
      if($ihead==0)
      {
        ?>
        <th><a href="<?=$frm?>"><img class="img" src="<?=$plus?>"></a></th>
        <?php
      }
      else
      {
  			?>
  			<th><a href="<?=$index?>?orden=<?=$arraydb[$ihead]?>&type=<?=$type?>'"><?=$arrayhead[$ihead]?></a></th>
  			<?php
      }
		}
		?>
	</tr>
	<?php
	$a=1;
	while($row=fetchArray($res)){
		if($a%2 == 0)$color=$odd;
		else $color=$even;
		?>
		<tr bgcolor="<?=$color?>">
		<?php
		 for($idb=0;$idb<count($arraydb);$idb++){
			if($idb==0)
      {
				?>
				<td><a href="<?=$frm?>?fki=<?=$row[$arraydb[$idb][0]]?>&fkt=<?=$row[$arraydb[$idb][1]]?>"><img class="img" src="<?=$pencil?>"></a> <a href="<?=$del?>?fki=<?=$row[$arraydb[$idb][0]]?>&fkt=<?=$row[$arraydb[$idb][1]]?>"><img class="img" src="<?=$cross?>"></a></td>
				<?php
			}
      else
      {
				?>
				<td><?=$row[$arraydb[$idb]]?></td>
				<?php
			}
		}
		?>
		</tr>
		<?php
		$a++;
	}
	?>
  <tr>
  <th bgcolor="<?=$head?>" colspan="<?=$cant?>">
  <a href="<?=$index?>?page=1&orden=<?=$orden?>"><img class="img" src="<?=$first?>" ></a>
  <?php
  $display=5;
  if($page>1){
		?>
		<a href="<?=$index?>?page=<?=$page-1?>&orden=<?=$orden?>"><img class="img" src="<?=$prev?>" ></a>
		<?php
  }
  for($i=$page;$i<=$total&&$i<=($page+$display);$i++){
	if($page==$i){
		echo $i ." - ";
	}else{
		?>
		<a href="<?=$index?>?page=<?=$i?>&orden=<?=$orden?>"><?=$i?></a>
		<?php
	}
  }
  if(($display+$page)<$total){
		echo "...";
  }
  if($page<$total){
		?>
		<a href="<?=$index?>?page=<?=$page+1?>&orden=<?=$orden?>"><img class="img" src="<?=$next?>" ></a>
		<?php
  }
  ?>
  <a href="<?=$index?>?page=<?=$total?>&orden=<?=$orden?>"><img class="img" src="<?=$last?>" ></a>
  </th>
  </tr>
  </table>
  <?
}
?>