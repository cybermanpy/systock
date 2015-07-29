<?php
	function user(){
		$user='root';
		return $user;
	}
	function pass(){
		$pass='rootadmin';
		return $pass;
	}
	function host(){
		$host='192.168.192.160';
		return $host;
	}
	function port(){
		$port='5432';
		return $port;
	}
	function dbname1(){
		$dbname='postgres';
		return $dbname;
	}
	function dbname2(){
		$dbname='systock';
		return $dbname;
	}
#----------------------------------------------------------------------------------------------------
	function connector($user, $pass, $sql){
		$host=host();
		$port=port();
		$dbname=dbname1();
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=@pg_query($conn,$sql) or die('No tiene permiso para realizar esta operacion');
		pg_close($conn);
		return $res;
	}
#----------------------------------------------------------------------------------------------------
	function fetchArray($res){
		$row=pg_fetch_array($res);
		return $row;
	}
#----------------------------------------------------------------------------------------------------
	function getNumRows($res){
		$num=pg_num_rows($res);
		return $num;
	}
#----------------------------------------------------------------------------------------------------
	function disconnect($res){
		pg_close($res);
	}
#----------------------------------------------------------------------------------------------------
	function fetchAssoc($res){
		$row=pg_fetch_assoc($res);
		return $row;
	}
#----------------------------------------------------------------------------------------------------
	function fetchObject($res){
		$row=pg_fetch_object($res);
		return $row;
	}
#----------------------------------------------------------------------------------------------------
	/*function select($table){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="SELECT * FROM ".$table." ";
		return $sql;
	}*/
	
	function select($table,$arrayselect){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql=" SELECT ";
		for($x=0;$x<count($arrayselect);$x++){
			if($x==0){
				$sql.=" ".$arrayselect[$x]." ";
			}else{
				$sql.=",".$arrayselect[$x]." ";
			}
		}
		$sql.= " FROM ".$table." ";
		return $sql;
	}

#----------------------------------------------------------------------------------------------------
	function delete($pk,$pkt,$table,$user,$pass){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="DELETE FROM ".$table." WHERE ".$pkt." = ".$pk;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=@pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}
#----------------------------------------------------------------------------------------------------
	function delete1($pk,$pkt,$table){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="DELETE FROM ".$table." WHERE ".$pkt." = ".$pk;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=@pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}
#----------------------------------------------------------------------------------------------------
	function deletefk($fk1,$fk2,$fkt1,$fkt2,$table){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="DELETE FROM ".$table." WHERE ".$fkt1." = ".$fk1." AND ".$fkt2." = ".$fk2;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=@pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}
#----------------------------------------------------------------------------------------------------
	function insert($array,$table,$array1,$user,$pass){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="INSERT INTO ".$table."(";
		for($x=0;$x<count($array);$x++){
			if($x==0){
				$sql.=$array[$x];	
			}else{
				$sql.=",".$array[$x];
			}
		}
		$sql.=")";
		$sql.=" VALUES (";
		for($x=0;$x<count($array1);$x++){
			if($x==0){
				$sql.=$array1[$x];	
			}else{
				$sql.=",".$array1[$x];
			}
		}
		$sql.=")";
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}
#----------------------------------------------------------------------------------------------------              		
	function insert1($array,$table,$array1){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="INSERT INTO ".$table."(";
		for($x=0;$x<count($array);$x++){
			if($x==0){
				$sql.=$array[$x];	
			}else{
				$sql.=",".$array[$x];
			}
		}
		$sql.=")";
		$sql.=" VALUES (";
		for($x=0;$x<count($array1);$x++){
			if($x==0){
				$sql.=$array1[$x];	
			}else{
				$sql.=",".$array1[$x];
			}
		}
		$sql.=")";
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}
#----------------------------------------------------------------------------------------------------              	
	function update($array,$table,$pk,$pkt,$array1,$user,$pass){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}

#----------------------------------------------------------------------------------------------------              	
	function update1($array,$table,$pk,$pkt,$array1){
		$user=user();
		$pass=pass();
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}

#----------------------------------------------------------------------------------------------------              	
	function update2($array,$table,$pk,$pkt,$pk1,$pkt1,$array1){
		$user=user();
		$pass=pass();
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk." AND ".$pkt1."=".$pk1;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}


#----------------------------------------------------------------------------------------------------              	
	function updatesum($array,$table,$pk,$pkt,$pk1,$pkt1,$array1){
		$user=user();
		$pass=pass();
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array[$x]."+".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array[$x]."+".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk." AND ".$pkt1."=".$pk1;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}

#----------------------------------------------------------------------------------------------------              	
	function updatesum1($array,$table,$pk,$pkt,$array1){
		$user=user();
		$pass=pass();
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array[$x]."+".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array[$x]."+".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}

#----------------------------------------------------------------------------------------------------              	
	function updatesub($array,$table,$pk,$pkt,$pk1,$pkt1,$array1){
		$user=user();
		$pass=pass();
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array[$x]."-".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array[$x]."-".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk." AND ".$pkt1."=".$pk1;
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}

#----------------------------------------------------------------------------------------------------              	
	function updatefk($array,$table,$fki,$fkt,$fkti,$fktt,$array1){
		$user=user();
		$pass=pass();
		$host=host();
		$port=port();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$fkti."=".$fki." AND ".$fktt."=".$fkt." ";
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
	}

#----------------------------------------------------------------------------------------------------              	
	function connector1($user, $pass, $sql){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
		return $res;
	}
#----------------------------------------------------------------------------------------------------	
	function connector2($sql){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$conn=pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		$res=pg_query($conn,$sql) or die('No tiene suficientes privilegios');
		pg_close($conn);
		return $res;
	}
#----------------------------------------------------------------------------------------------------
	function connectorpass($user,$pass){
		$host=host();
		$port=port();
		$dbname=dbname1();
		$conn=@pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
		pg_close($conn);
		return $conn;
	}
	
#----------------------------------------------------------------------------------------------------	
function value($data){
	if($data=="")
		$tmp="NULL";
	else 
		$tmp="'".$data."'";
	return $tmp;
}

function sele($datos,$table,$pk,$des,$array){
	$sql=select($table,$array);
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"> <?=$rowb[$des]?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"> <?=$rowb[$des];?></option>
        <?php
		}
	}
}

function sele2($datos,$table,$pk,$des,$des1,$array,$fk1,$pk1){
	$sql=select($table,$array);
	$sql.=" WHERE ".$fk1."=".$pk1." ";
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}
	}
}

function sele3($datos,$table,$pk,$des,$des1,$array,$fk1,$pk1,$fk2,$pk2){
	$sql=select($table,$array);
	$sql.=" WHERE ".$fk1."=".$pk1." AND ".$fk2."=".$pk2 ;
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}
	}
}

function sele4($datos,$table,$pk,$des,$des1,$des2,$array,$fk1,$pk1,$fk2,$pk2,$fk3,$pk3){
	$sql=select($table,$array);
	$sql.=" WHERE ".$fk1."=".$pk1." AND ".$fk2."=".$pk2." AND ".$fk3."=".$pk3;
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1].' '.$rowb[$des2];?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1].' '.$rowb[$des2];?></option>
        <?php
		}
	}
}

function sele5($datos,$table,$pk,$des,$des1,$des2,$array,$fk1,$pk1,$fk2,$pk2,$fk3,$pk3,$fkdes,$norden,$ifcan){
	$sql=select($table,$array);
	$sql.=" WHERE ".$fk1."=".$pk1." AND ".$fk2."=".$pk2." AND ".$fk3."=".$pk3.$ifcan;
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
			$arrayi=$rowb[$pk]."-".$rowb[$fkdes]."-".$rowb[$norden];
		?>
        	<option selected="selected" value="<?=$arrayi;?>"><?=$rowb[$des].' '.$rowb[$des1].' '.$rowb[$des2];?></option>
        <?php
		}else{
			$arrayi=$rowb[$pk]."-".$rowb[$fkdes]."-".$rowb[$norden];
		?>
        	<option value="<?=$arrayi;?>"><?=$rowb[$des].' '.$rowb[$des1].' '.$rowb[$des2];?></option>
        <?php
		}
	}
}

function sele6($datos,$table,$pk,$des,$des1,$array,$fk1,$pk1,$fk2,$pk2,$ifcan){
	$sql=select($table,$array);
	$sql.=" WHERE ".$fk1."=".$pk1." AND ".$fk2."=".$pk2.$ifcan ;
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}
	}
}

function seleif($datos,$table,$pk,$des,$if,$array){
	$sql=select($table,$array);
	$sql.=" ".$if." ";
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"> <?=$rowb[$des]?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"> <?=$rowb[$des];?></option>
        <?php
		}
	}
}

function seleif2($datos,$table,$pk,$des,$des1,$if,$array,$fk1,$pk1,$fk2,$pk2){
	$sql=select($table,$array);
	$sql.=" WHERE ".$fk1."=".$pk1." AND ".$fk2."=".$pk2." AND ".$if;
	$sql.=" ORDER BY ".$des." ";
	$res=connector2($sql);
	?>
    <option value="">Seleccionar</option>
    <?php
	while($rowb=fetchArray($res)){
		if($rowb[$pk]==$datos){
		?>
        	<option selected="selected" value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}else{
		?>
        	<option value="<?=$rowb[$pk];?>"><?=$rowb[$des].' '.$rowb[$des1];?></option>
        <?php
		}
	}
}

function sele1($datos,$array){
	?>
    <option value="">Seleccionar</option>
    <?php
	for($x=0;$x<count($array);$x++){
		if($datos==$array[$x]){
		?>
        	<option selected="selected" value="<?=$array[$x];?>"> <?=$array[$x];?></option>
        <?php
		}else{
		?>
        	<option value="<?=$array[$x];?>"> <?=$array[$x];?></option>
        <?php
		}
	}
}
#----------------------------------------------------------------------------------------------------
#Funciones para conexion con Mysql	
#----------------------------------------------------------------------------------------------------
/*	function user(){
		$user='root';
		return $user;
	}
	function pass(){
		$pass='1234';
		return $pass;
	}
	function host(){
		$host='localhost';
		return $host;
	}
	function port(){
		$port='5432';
		return $port;
	}
	function dbname1(){
		$dbname='mysql';
		return $dbname;
	}
	function dbname2(){
		$dbname='clasificados';
		return $dbname;
	}


#----------------------------------------------------------------------------------------------------
	function select($table){
		$host=host();
		$port=port();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="SELECT * FROM ".$table." ";
		return $sql;
	}

#----------------------------------------------------------------------------------------------------
	function connectorpass($user,$pass){
		$host=host();
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		//mysql_close($conn);
		return $conn;
	}
#----------------------------------------------------------------------------------------------------
    function connector($user, $pass, $sql){
		$host=host();
		$dbname=dbname2();
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
		return $res;
	}
#----------------------------------------------------------------------------------------------------
	function connector1($user, $pass, $sql){
		$host=host();
		$dbname=dbname2();
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
		return $res;
	}
#----------------------------------------------------------------------------------------------------
	function connector2($sql){
		$host=host();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
		return $res;
	}
#----------------------------------------------------------------------------------------------------
	function fetchArray($res){
		$row=mysql_fetch_array($res);
		return $row;
	}
#----------------------------------------------------------------------------------------------------
	function getNumRows($res){
		$num=mysql_num_rows($res);
		return $num;
	}
#----------------------------------------------------------------------------------------------------
	function disconnect(){
		mysql_close();
	}
#----------------------------------------------------------------------------------------------------
	function fetchAssoc($res){
		$row=mysql_fetch_assoc($res);
		return $row;
	}
#----------------------------------------------------------------------------------------------------
	function fetchObject($res){
			$row=mysql_fetch_object($res);
			return $row;
		}
#----------------------------------------------------------------------------------------------------
	function delete($pk,$pkt,$table,$user,$pass){
		$host=host();
		$dbname=dbname2();
		$sql="DELETE FROM ".$table." WHERE ".$pkt." = ".$pk;
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
	}
#----------------------------------------------------------------------------------------------------
	function delete1($pk,$pkt,$table){
		$host=host();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="DELETE FROM ".$table." WHERE ".$pkt." = ".$pk;
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
	}
#----------------------------------------------------------------------------------------------------
	function insert($array,$table,$array1,$user,$pass){
		$host=host();
		$dbname=dbname2();
		$sql="INSERT INTO ".$table."(";
		for($x=0;$x<count($array);$x++){
			if($x==0){
				$sql.=$array[$x];	
			}else{
				$sql.=",".$array[$x];
			}
		}
		$sql.=")";
		$sql.=" VALUES (";
		for($x=0;$x<count($array1);$x++){
			if($x==0){
				$sql.=$array1[$x];	
			}else{
				$sql.=",".$array1[$x];
			}
		}
		$sql.=")";
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
	}
#----------------------------------------------------------------------------------------------------
	function insert1($array,$table,$array1){
		$host=host();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="INSERT INTO ".$table."(";
		for($x=0;$x<count($array);$x++){
			if($x==0){
				$sql.=$array[$x];	
			}else{
				$sql.=",".$array[$x];
			}
		}
		$sql.=")";
		$sql.=" VALUES (";
		for($x=0;$x<count($array1);$x++){
			if($x==0){
				$sql.=$array1[$x];	
			}else{
				$sql.=",".$array1[$x];
			}
		}
		$sql.=")";
		$conn=mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
	}
#----------------------------------------------------------------------------------------------------              	
	function update($array,$table,$pk,$pkt,$array1,$user,$pass){
		$host=host();
		$dbname=dbname2();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk;
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
	}
#----------------------------------------------------------------------------------------------------              	
	function update1($array,$table,$pk,$pkt,$array1){
		$host=host();
		$dbname=dbname2();
		$user=user();
		$pass=pass();
		$sql="UPDATE ".$table." SET ";
		for($x=0;$x<count($array);$x++){
			if($x!=count($array)-1){
				$sql.=$array[$x]." = ".$array1[$x].",";	
			}else{
				$sql.=$array[$x]." = ".$array1[$x];	
			}
		}
		$sql.=" WHERE ".$pkt."=".$pk;
		$conn=@mysql_connect($host, $user, $pass) or die ('Tiene problemas de conexion');
		$db=@mysql_select_db($dbname,$conn) or die ('Tiene problemas con la base de datos');
		$res=mysql_query($sql);
		mysql_close($conn);
	}*/
?>
