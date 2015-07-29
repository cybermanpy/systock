<?php
$play='../img/play.png';
$cargar = array
(
	
	0=>array('name'=>'Solicitud','url'=>'frminssolicitudes.php','icon'=>$play),
);
$cantc=count($cargar);
$mostrar = array
(
	
	0=>array('name'=>'Detalles','url'=>'viewdetallesuser.php','icon'=>$play),
	
);
$cantm=count($mostrar);
$administrar = array
(
	0=>array('name'=>'Departamentos','url'=>'viewdptos.php','icon'=>$play),
	1=>array('name'=>'Direcciones','url'=>'viewdir.php','icon'=>$play),
	2=>array('name'=>'Estados','url'=>'viewestados.php','icon'=>$play),
	3=>array('name'=>'Insumos SSEE','url'=>'viewinsumos.php','icon'=>$play),
	4=>array('name'=>'Informe','url'=>'viewinforme.php','icon'=>$play),
	5=>array('name'=>'Orden de Entrega','url'=>'viewordenentregas.php','icon'=>$play),
	6=>array('name'=>'Proveedores','url'=>'viewproveedores.php','icon'=>$play),
	7=>array('name'=>'Rubros','url'=>'viewrubros.php','icon'=>$play),
	8=>array('name'=>'Tipos de Insumos','url'=>'viewtipos.php','icon'=>$play),
	9=>array('name'=>'Unidad de medida','url'=>'viewunidadmedida.php','icon'=>$play),
	10=>array('name'=>'Usuarios','url'=>'viewusuarios.php','icon'=>$play),
	11=>array('name'=>'Descripción Insumos','url'=>'viewdesinsumos.php','icon'=>$play),
	12=>array('name'=>'Orden de Compras','url'=>'viewordencompras.php','icon'=>$play),
	13=>array('name'=>'Insumos Aprovicionamiento','url'=>'viewinsumosaprov.php','icon'=>$play),
	14=>array('name'=>'Detalles Orden de Compras','url'=>'viewdetordencompras.php','icon'=>$play),
);
$canta=count($administrar);
$entregado = array
(
	0=>array('name'=>'Insumos Entregados','url'=>'viewdetallesapro.php','icon'=>$play)
);
$cante=count($entregado);
$aprobar = array 
(
	0=>array('name'=>'Solicitudes Pendientes','url'=>'viewdetallestoapro.php','icon'=>$play)
);
$cantap=count($aprobar);
$adminda=array
(
	0=>array('name'=>'Cargar Stock','url'=>'viewordenentregas.php','icon'=>$play),
	1=>array('name'=>'Listar Insumos','url'=>'viewinsumos.php','icon'=>$play),
	2=>array('name'=>'Cargar Orden de Entrega','url'=>'frminsentregas.php','icon'=>$play),
	3=>array('name'=>'Cargar Detalle Orden de Entrega','url'=>'viewordenentregas.php','icon'=>$play),
	4=>array('name'=>'Cargar Orden de Compras','url'=>'viewordencompras.php','icon'=>$play),
	5=>array('name'=>'Cargar Insumos Aprovicionamiento','url'=>'viewdetordencompras.php','icon'=>$play),
	6=>array('name'=>'Listar Insumos Aprovicionamiento','url'=>'viewinsumosaprov.php','icon'=>$play)
);
$cantda=count($adminda);
$informe=array
(
	0=>array('name'=>'Insumos por Dirección','url'=>'viewinforme.php','icon'=>$play),
);
$cantinf=count($informe);
$home='http://www.economia.gov.py/systock/php';
$exit='exit.php';
$homeicon='../img/home.png';
$cargaricon='../img/add.png';
$adminicon='../img/process.png';
$mostraricon='../img/search.png';
$aprobaricon='../img/accept.png';
$entregadoicon='../img/notebook.png';
$informeicon='../img/page.png';
$exiticon='../img/shut_down.png';
$menu = array
(
	0=>array('name'=>'Home','url'=>$home,'icon'=>$homeicon, 'nivel'=>'1'),
	1=>array('name'=>'Home','url'=>$home,'icon'=>$homeicon, 'nivel'=>'2'),
	2=>array('name'=>'Home','url'=>$home,'icon'=>$homeicon, 'nivel'=>'3'),
	3=>array('name'=>'Home','url'=>$home,'icon'=>$homeicon, 'nivel'=>'4'),
	4=>array('name'=>'Cargar','submenu'=>$cargar, 'cant'=>$cantc, 'icon'=>$cargaricon, 'nivel'=>'2'),
	5=>array('name'=>'Cargar','submenu'=>$cargar, 'cant'=>$cantc, 'icon'=>$cargaricon, 'nivel'=>'3'),
	6=>array('name'=>'Cargar','submenu'=>$cargar, 'cant'=>$cantc, 'icon'=>$cargaricon, 'nivel'=>'4'),
	7=>array('name'=>'Mostrar','submenu'=>$mostrar, 'cant'=>$cantm, 'icon'=>$mostraricon, 'nivel'=>'2'),
	8=>array('name'=>'Mostrar','submenu'=>$mostrar, 'cant'=>$cantm, 'icon'=>$mostraricon, 'nivel'=>'3'),
	9=>array('name'=>'Mostrar','submenu'=>$mostrar, 'cant'=>$cantm, 'icon'=>$mostraricon, 'nivel'=>'4'),
	10=>array('name'=>'Administrar','submenu'=>$administrar, 'cant'=>$canta, 'icon'=>$adminicon, 'nivel'=>'1'),
	11=>array('name'=>'Administrar','submenu'=>$adminda, 'cant'=>$cantda, 'icon'=>$adminicon, 'nivel'=>'2'),
	12=>array('name'=>'Aprobar','submenu'=>$aprobar, 'cant'=>$cantap, 'icon'=>$aprobaricon, 'nivel'=>'2'),
	13=>array('name'=>'Aprobar','submenu'=>$aprobar, 'cant'=>$cantap, 'icon'=>$aprobaricon, 'nivel'=>'3'),
	14=>array('name'=>'Entregados','submenu'=>$entregado, 'cant'=>$cante, 'icon'=>$entregadoicon, 'nivel'=>'1'),
	15=>array('name'=>'Entregados','submenu'=>$entregado, 'cant'=>$cante, 'icon'=>$entregadoicon, 'nivel'=>'2'),
	16=>array('name'=>'Entregados','submenu'=>$entregado, 'cant'=>$cante, 'icon'=>$entregadoicon, 'nivel'=>'3'),
	17=>array('name'=>'Entregados','submenu'=>$entregado, 'cant'=>$cante, 'icon'=>$entregadoicon, 'nivel'=>'4'),
	18=>array('name'=>'Informes','submenu'=>$informe, 'cant'=>$cantinf, 'icon'=>$informeicon, 'nivel'=>'2'),
	19=>array('name'=>'Logout','url'=>$exit, 'icon'=>$exiticon, 'nivel'=>'1'),
	20=>array('name'=>'Logout','url'=>$exit, 'icon'=>$exiticon, 'nivel'=>'2'),
	21=>array('name'=>'Logout','url'=>$exit, 'icon'=>$exiticon, 'nivel'=>'3'),
	22=>array('name'=>'Logout','url'=>$exit, 'icon'=>$exiticon, 'nivel'=>'4')
);
?>
<div class="wrap">
	<ul class="menu">
		<?php
		for ($x=0;$x<count($menu);$x++)
		{
			switch($menu[$x]['nivel'])
			{
				case $_SESSION['s_nivel']:
					if ($menu[$x]['name']=='Logout')
					{
						?>
						<li id="<?=$x?>"><a href="<?=$menu[$x]['url']?>"><img class="icon" src="<?=$menu[$x]['icon']?>"> <?=$menu[$x]['name']." - ".$_SESSION['s_user']?></a>
						<?php
					}
					else
					{
						?>
						<li id="<?=$x?>"><a href="<?=$menu[$x]['url']?>"><img class="icon" src="<?=$menu[$x]['icon']?>"> <?=$menu[$x]['name']?></a>
						<?php
					}
					?>
						<ul>
							<?php
							if ($menu[$x]['submenu'])
							{
								for($i=0;$i<$menu[$x]['cant'];$i++)
								{
									?>
									<li><a href="<?=$menu[$x]['submenu'][$i]['url']?>" ><img class="icon" src="<?=$menu[$x]['submenu'][$i]['icon']?>"> <?=$menu[$x]['submenu'][$i]['name']?></a></li>
									<?php
								}
							}
							?>
						</ul>
					</li>
					<?php
				break;
			}
		}
		?>
	</ul>
</div>
