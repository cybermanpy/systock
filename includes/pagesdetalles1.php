<?php
function page($res,$total,$pagetam,$page,$inicio,$arraydb,$arrayhead,$title,$index,$frm,$del,$orden,$type,$tableparte,$arrayparte,$arraypartedb,$arraypartehead,$whereparte,$user,$pass,$show,$updet,$deldet,$insdet){
  $cant=count($arrayhead);
  $odd="#FFFFFF";
  $even="#F8F8FF";
  $head="#F1EFF1";
  $plus="../img/add.png";
  $cross="../img/delete.png";
  $pencil="../img/edit.png";
  // $plus="../img/vector/plus_alt.svg";
  // $cross="../img/vector/x.svg";
  // $pencil="../img/vector/pen_alt2.svg";
  $first="../img/skip_backward.png";
  $last="../img/skip_forward.png";
  $next="../img/arrow_right.png";
  $prev="../img/arrow_left.png";
  ?>
  <div>
  <table>
  	<tr bgcolor="<?=$head?>">
    	<th colspan="<?=$cant?>"><?=$title."<br> Registro ".$show?></th>
    </tr>
	<tr bgcolor="<?=$head?>">
		<?php
		for($ihead=0;$ihead<count($arrayhead);$ihead++){
			?>
			<th><a href="<?=$index?>?orden=<?=$arraydb[$ihead]?>&type=<?=$type?>"><?=$arrayhead[$ihead]?></a></th>
			<?php
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
			 switch($idb){
				case 0:
					?>
          <td><a href="<?=$frm?>?pk=<?=$row[$arraydb[$idb]]?>"><img class="img" src="<?=$pencil?>"></a> <a href="<?=$del?>?pk=<?=$row[$arraydb[$idb]]?>"><img class="img" src="<?=$cross?>"></a></td>
          <?php
				break;
				case (count($arraydb)-1):
					?>
					<td>
            <table class="tablereg1">
              <tr bgcolor="<?=$head ?>">
								<?php
                for($iparte=0;$iparte<count($arraypartehead);$iparte++){
									if($iparte==0){
										?>
                    <td><a href="<?=$insdet?>?pk=<?=$row[$arraydb[$idb]]?>"><img class="img" src="<?=$plus?>"></a></td>
                    <?php
									}else{
										?>
										<th><?=$arraypartehead[$iparte]?></th>	
										<?php
									}
                }
                ?>
              </tr>
							<?php
              $sqlparte=select($tableparte,$arrayparte);
              $sqlparte.=" ".$whereparte." ".$row[$arraydb[$idb]]."' ";
              $resparte=connector2($sqlparte);
              while($rowparte=fetchArray($resparte))
              {
                ?>
                <tr bgcolor="<?=$color?>">
                  <?php
                  for($ipartedb=0;$ipartedb<count($arraypartedb);$ipartedb++)
                  {
										?>
										<td><?=$rowparte[$arraypartedb[$ipartedb]]?></td>
										<?php	
                  }
                  ?>
                </tr>
                <?php
              }
              ?>
            </table>
					</td>
					<?php
				break;
				default;
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
  if($page>1)
  {
		?>
		<a href="<?=$index?>?page=<?=$page-1?>&orden=<?=$orden?>"><img class="img" src="<?=$prev?>" ></a>
		<?php
  }
  for($i=$page;$i<=$total&&$i<=($page+$display);$i++)
  {
  	if($page==$i)
    {
  		echo $i ." - ";
  	}
    else
    {
  		?>
  		<a href="<?=$index?>?page=<?=$i?>&orden=<?=$orden?>"><?=$i?></a>
  		<?php
  	}
  }
  if(($display+$page)<$total)
  {
		echo "...";
  }
  if($page<$total)
  {
		?>
		<a href="<?=$index?>?page=<?=$page+1?>&orden=<?=$orden?>"><img class="img" src="<?=$next?>" ></a>
		<?php
  }
  ?>
  <a href="<?=$index?>?page=<?=$total?>&orden=<?=$orden?>"><img class="img" src="<?=$last?>" ></a>
  </th>
  </tr>
  </table>
  </div>
  <?
}
?>