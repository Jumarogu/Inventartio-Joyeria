
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Joyería Cristal</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Styles -->
		<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!-- Bootstrap CSS -->
		<link href="ui/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="ui/css/font-awesome.min.css" rel="stylesheet">

		<!-- Main CSS -->
		<link href="ui/css/style-23.css" rel="stylesheet">
		<link href="ui/css/style-329.css" rel="stylesheet">
		<link href="ui/css/style-286.css" rel="stylesheet">
		<link href="ui/css/estilos.css" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/315-200.png">
	</head>

	<body>
		<!-- Container -->
		<br><br>
		<div class="container">
			<div class="btn-group" role="group" aria-label="...">
			<p>
				<?php 
					session_start(); 
					echo $_SESSION["login_user"];
				?>
			</p>
  				<button type="button" class="btn btn-default" id="newSale">
  					<i class="fa fa-cart-plus"></i>
  					<a href="venta.php">Nueva venta</a>
  				</button>
  				<button type="button" class="btn btn-default" id="logOut">
  					<i class="fa fa-sign-out"></i>
  					<a href="logout.php">Log out</a>
  				</button>
			</div>	
		</div>
		<br><br>
		<!-- UI X -->
		<div class="container">
			<div class="ui-23">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<!-- Nav One -->
						<div class="ui-nav-one">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#block-one"  data-toggle="tab"><i class="fa fa-user"></i><span>Cliente</span></a></li>
								<li><a href="#block-two" data-toggle="tab"><i class="fa fa-shopping-cart"></i><span>Venta</span></a></li>
								<li><a href="#block-three" data-toggle="tab"><i class="fa fa-archive"></i><span>Categoría</span></a></li>
								<li><a href="#block-four"  data-toggle="tab"><i class="fa fa-diamond"></i><span>Pieza</span></a></li>
								<li><a href="#block-five"  data-toggle="tab"><i class="fa fa-truck"></i><span>Proveedor</span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-9 col-sm-12">
						<!-- Tab Content -->
						<div class="tab-content">

	<!--cliente-->
							<!-- Tab Pane -->
							<div role="tabpanel" class="tab-pane fade in active" id="block-one">
								<!-- Heading -->
								<h2><i class="fa fa-user lblue"></i>Cliente</h2>
								<div class="btn-group" role="group" aria-label="...">
					  			<button type="button" class="btn btn-default" id="agregarCl"><i class="fa fa-plus-circle"></i> Agregar Cliente</button>
								</div>
								<br><br>
								<div id="formaCl"><!--inicio forma-->
								<form action="" method="post">
									<div class="input-group">
  									<span class="input-group-addon" id="basic-addon1">Nombre</span>
  									<input name="nombreCliente" type="text" class="form-control" placeholder="Nombre(s) Apellido" aria-describedby="basic-addon1">
									</div>
									<div class="input-group">
  									<span class="input-group-addon" id="basic-addon1">Dirección</span>
  									<input name="direccionCliente" type="text" class="form-control" placeholder="Calle num.exterior, num.interior, Colonia" aria-describedby="basic-addon1">
									</div>
									<div class="input-group">
  									<span class="input-group-addon" id="basic-addon1">Correo Electrónico</span>
  									<input name="correoCliente" type="text" class="form-control" placeholder="ejemplo@correo.com.mx" aria-describedby="basic-addon1">
									</div>
									<div class="btn-group" role="group" aria-label="...">
						  			<button type="submit" class="btn btn-default" id="finalFormaCl">Agregar</button>
									</div>
									<br><br>
								</form>
								</div>
								<!--fin forma-->
								<?php 
									if((isset($_POST['nombreCliente'])) && (isset($_POST['direccionCliente'])) && (isset($_POST['correoCliente']))){
										$nombreCliente = "'".$_POST['nombreCliente']."'";
										$direccionCliente = "'".$_POST['direccionCliente']."'";
										$correoCliente = "'".$_POST['correoCliente']."'";
										$query = "INSERT INTO clientej VALUES('',".$nombreCliente.",".$direccionCliente.",".$correoCliente.")";
										//echo $query;

										$username = 'a00364395';
									   	$password = 'tec4395';
									    $db = "(DESCRIPTION = 
													(ADDRESS = 
									     		   	(PROTOCOL = TCP)
										  		   	(HOST = 10.40.53.10)
									    		   	(PORT = 1521))
												(CONNECT_DATA = 
												   	(SERVER = DEDICATED)
												   	(SERVICE_NAME = alum.gda.itesm.mx)))";

									    $conn = oci_connect($username, $password, $db);
									    if ($conn) {
									    	echo "GOOD CONNECTION";
									    }
										$stid = oci_parse($conn, $query);
										oci_execute($stid);
									}
								?>
				<!--inicio los clientes-->
								<?php
									$username = 'a00364395';
									$password = 'tec4395';
									$db = "(DESCRIPTION = 
												(ADDRESS = 
									     	   	(PROTOCOL = TCP)
										  	   	(HOST = 10.40.53.10)
									    	   	(PORT = 1521))
											(CONNECT_DATA = 
											   	(SERVER = DEDICATED)
											   	(SERVICE_NAME = alum.gda.itesm.mx)))";

									$conn = oci_connect($username, $password, $db);
								    if ($conn) {
								    	$query = "SELECT * FROM clientej ORDER BY NOMBRECLIENTE";
								    	$stid = oci_parse($conn, $query);
										oci_execute($stid);
										echo "<div class='ui-329'>
											<div class='container'>
											";
										$count = 0;
										while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
											$idCliente = "".$pow['IDCLIENTEJ']."";
											$nombreCliente = "".$pow['NOMBRECLIENTE']."";
											$direccionCliente = "".$pow['DIRECCION']."";
											$emailCliente = "".$pow['EMAIL']."";
											echo '
											<div class = "row">
												<div class="col-md-6 col-sm-12">
													<!-- Item -->
													<div class="item">
														<!-- Head -->
														<div class="head clearfix">
															<!-- Image -->
															<img src="http://www.twcdi.ie/images/avatars/default_set/default-avatar.png" alt="" class="img-responsive" />
															<!-- Name and designation -->
															<h2>'.$nombreCliente.'</h2>
														</div>
														<!-- Content -->
														<div class="content">
															<ul class="list-unstyled">
																<!-- Icon with content -->
																<li><a href="#"><i class="fa fa-key bg-yellow"></i>'.$idCliente.'</a></li>
																<li><a href="#"><i class="fa fa-home bg-red"></i>'.$direccionCliente.'</a></li>
																<li><a href="#"><i class="fa fa-envelope bg-green"></i>'.$emailCliente.'</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											';
										}
										echo "
											</div>
											</div>
											";
								    }
								?>
							</div>
	<!--Venta-->
							<!-- Tab Pane -->
							<div role="tabpanel" class="tab-pane fade" id="block-two">
								<!-- Heading -->
								<h2><i class="fa fa-shopping-cart lblue"></i>Venta</h2>
								<div class="ui-273">
									<!-- Table Responsive -->
									<div class="table-responsive">
										<!-- Table -->
										<table class="table table-bordered">
											<!-- Table Heading -->
											<tr>
												<!-- CheckBox -->
												<th><a href="#" class="ui-check"><i class="fa fa-check"></i></a></th>
												<!-- Name -->
												<th>Fecha Venta</th>
												<th>Nombre Cliente</th>
												<th>Cantidad Pz</th>
												<th>Total</th>
											</tr>
											<?php
													$username = 'a00364395';
													$password = 'tec4395';
													$db = "(DESCRIPTION = 
															(ADDRESS = 
												     	   	(PROTOCOL = TCP)
													  	   	(HOST = 10.40.53.10)
												    	   	(PORT = 1521))
														(CONNECT_DATA = 
														   	(SERVER = DEDICATED)
														   	(SERVICE_NAME = alum.gda.itesm.mx)))";
																					
													$conn = oci_connect($username, $password, $db);
												    if ($conn) {
														$query = "SELECT fechaVenta, NombreCliente, sum(vcantidad) AS NumPiezas, precioTotal AS Total
															FROM Clientej
															NATURAL JOIN Ventaj
															NATURAL JOIN DesVentaj
															GROUP BY( NombreCliente, fechaventa, NombreCliente, precioTotal) 
															ORDER BY fechaventa";
														$stid = oci_parse($conn, $query);
														oci_execute($stid);
														while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
															$fechaVenta = "".$pow['FECHAVENTA']."";
															$nombreCliente = "".$pow['NOMBRECLIENTE']."";
															$noPiezas = "".$pow['NUMPIEZAS']."";
															$totalVenta = "".$pow['TOTAL']."";
															echo '<tr>
																<td><a href="#" class="ui-check"><i class="fa fa-check"></i></a></td>
												      			<td>'.$fechaVenta.'</td>
												      			<td>'.$nombreCliente.'</td>
											        			<td>'.$noPiezas.'</td>
												       			<td>'.$totalVenta.'</td>
												    			';
														}	
											      	} 
											?>
										</table>
									</div>
								</div>
							</div>
	<!---Categoría-->
							<!-- Tab Pane -->
							<div role="tabpanel" class="tab-pane fade" id="block-three">
								<!-- Heading -->
								<h2><i class="fa fa-archive lblue"></i>Categoría</h2>
								<div class="btn-group" role="group" aria-label="...">
					  				<button type="button" class="btn btn-default" id="agregarCa"><i class="fa fa-plus-circle"></i>Agregar Categoría</button>
								</div>
								<br><br>
								<!--inicio forma-->
								<div id="formaCa">
								<form action="" method="post">
									<div class="input-group">
  										<span class="input-group-addon" id="basic-addon1">Metal</span>
  										<input name="metalCategoria" type="text" class="form-control" placeholder="Nombre del metal (ej. oro, plata, etc.)" aria-describedby="basic-addon1">
									</div>
										<div class="input-group">
  										<span class="input-group-addon" id="basic-addon1">Kilataje</span>
  									<input name="kilatajeCategoria" type="text" class="form-control" placeholder="número" aria-describedby="basic-addon1">
									</div>
									<div class="input-group">
  										<span class="input-group-addon" id="basic-addon1">Nombre</span>
  										<input name="nombreCategoria" type="text" class="form-control" placeholder="Nombre de la categoría (ej. anilloOro)" aria-describedby="basic-addon1">
									</div>
									<div class="input-group">
  										<span class="input-group-addon" id="basic-addon1">Peso Bruto</span>
  										<input name="pesoBruto" type="text" class="form-control" placeholder="número de gramos" aria-describedby="basic-addon1">
									</div>
									<div class="btn-group" role="group" aria-label="...">
						  				<button type="submit" class="btn btn-default" id="finalFormaCa">Agregar</button>
									</div>
								</form>
								</div>
								<!--fin forma-->
								<?php 
									if((isset($_POST['metalCategoria'])) && (isset($_POST['kilatajeCategoria'])) && (isset($_POST['nombreCategoria'])) && (isset($_POST['pesoBruto']))){		
										$metalCategoria = "'".$_POST['metalCategoria']."'";
										$kilatajeCategoria = "'".$_POST['kilatajeCategoria']."'";
										$nombreCategoria = "'".$_POST['nombreCategoria']."'";
										$pesoBruto = "'".$_POST['pesoBruto']."'";
										$query = "INSERT INTO categoriaj VALUES('',".$metalCategoria.",".$kilatajeCategoria.",".$nombreCategoria.",".$pesoBruto.")";
										echo $query;
										$username = 'a00364395';
									   	$password = 'tec4395';
									    $db = "(DESCRIPTION = 
													(ADDRESS = 
									     		   	(PROTOCOL = TCP)
										  		   	(HOST = 10.40.53.10)
									    		   	(PORT = 1521))
												(CONNECT_DATA = 
												   	(SERVER = DEDICATED)
												   	(SERVICE_NAME = alum.gda.itesm.mx)))";

									    $conn = oci_connect($username, $password, $db);
									    if ($conn) {
									    	$stid = oci_parse($conn, $query);
											oci_execute($stid);
									    }
									}
								?>
			<!--inicio de las categorias-->
								<?php
									$username = 'a00364395';
									$password = 'tec4395';
									$db = "(DESCRIPTION = 
												(ADDRESS = 
									     	   	(PROTOCOL = TCP)
										  	   	(HOST = 10.40.53.10)
									    	   	(PORT = 1521))
											(CONNECT_DATA = 
											   	(SERVER = DEDICATED)
											   	(SERVICE_NAME = alum.gda.itesm.mx)))";

									$conn = oci_connect($username, $password, $db);
								    if ($conn) {
								    	$query = "SELECT * FROM categoriaj";
								    	$stid = oci_parse($conn, $query);
										oci_execute($stid);
										echo "<div class='ui-x'>
											<div class='container'>
											";
										$count = 0;
										while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
											$idCategoria = "".$pow['IDCATEGORIA']."";
											$kilatajeCategoria = "".$pow['KILATAJE']."";
											$nombreCategoria = "".$pow['NOMBRE']."";
											$metalCategoria = "".$pow['METAL']."";
											$pesoCategoria = "".$pow['PESOBRUTO']."";
											echo '
											<div class = "row">
												<div class="col-md-4 col-sm-4 col-xs-4 col-mob">
													<!-- Item -->
													<div class="ui-item clearfix br-red">
														<!-- Image -->
														<a href="#" class="ui-img bg-red"><span><img src="ui/img/ui-286/5.png" alt="" class="img-responsive" /></span></a>
														<!-- Details -->
														<div class="ui-details">
															<!-- Heading -->
															<h3><a href="#">'.$nombreCategoria.'</a></h3>
															<!-- Paragraph -->
															<p>'.$metalCategoria.' '.$kilatajeCategoria.' Peso: '.$pesoCategoria.'</p>
															<!-- Button -->
															<a target="_blank" href="inventarios/'.$idCategoria.'.php" class="btn btn-red btn-sm">Ver productos</a>
														</div>
													</div>
												</div>
											</div>
											';
										}
										echo "
											</div>
											</div>
											";
								    }
								?>
							</div>
	<!--Pieza-->
							<!-- Tab Pane -->
							<div role="tabpanel" class="tab-pane fade" id="block-four">
								<h2><i class="fa fa-diamond lblue"></i>Pieza</h2>
								<div class="btn-group" role="group" aria-label="...">
					  				<button type="button" class="btn btn-default" id="agregarPi"><i class="fa fa-plus-circle"></i>Agregar Pieza</button>
								</div>
								<br><br>
								<div id="formaPi"><!--inicio forma-->
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Joya</span>
										<input name="joya" type="text" class="form-control" placeholder="Joya que contiene" aria-describedby="basic-addon1">
									</div>
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Cantidad</span>
										<input name="cantidadPieza" type="text" class="form-control" placeholder="Número de piezas como esta" aria-describedby="basic-addon1">
									</div>
									<h4>Categoría:</h4>
									<div class="list-group">
  										<!-- PHP DE TODOS LAS CATEGORIAS -->
  										<button type="button" class="list-group-item">AniloOro</button>
  										<button type="button" class="list-group-item">CadenaPlata</button>
  										<button type="button" class="list-group-item">AretesOro</button>
  										<button type="button" class="list-group-item">DijeOro</button>
  										<button type="button" class="list-group-item">RelojOro</button>
									</div>
									<div class="btn-group" role="group" aria-label="...">
										<button type="button" class="btn btn-default" id="finalFormaPi">Agregar</button>
									</div>
								</div><!--fin forma-->
							</div>

	<!--Proveedor-->
							<!-- Tab Pane -->
							<div role="tabpanel" class="tab-pane fade" id="block-five">
								<h2><i class="fa fa-truck lblue"></i>Proveedor</h2>
								<div class="btn-group" role="group" aria-label="...">
					  			<button type="button" class="btn btn-default" id="agregarPo"><i class="fa fa-plus-circle"></i>Agregar Proveedor</button>
								</div>
								<div id="formaPo"><!--inicio forma-->
									<form action="" method="post">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1">Nombre</span>
											<input name="nombreProveedor" type="text" class="form-control" placeholder="Nombre del proveedor" aria-describedby="basic-addon1">
										</div>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1">Teléfono</span>
											<input name="telefonoProveedor" type="text" class="form-control" placeholder="Número de teléfono del Proveedor" aria-describedby="basic-addon1">
										</div>
										<div class="btn-group" role="group" aria-label="...">
											<button type="submit" class="btn btn-default" id="finalFormaPo">Agregar</button>
										</div>
									</form>
								</div>
								<!--fin forma-->
								<br><br>
								<?php 
									if((isset($_POST['nombreProveedor'])) && (isset($_POST['telefonoProveedor']))){
										$nombreProveedor = "'".$_POST['nombreProveedor']."'";
										$telefonoProveedor = "'".$_POST['telefonoProveedor']."'";
										
										$query = "INSERT INTO proveedorj VALUES('',".$nombreProveedor.",".$telefonoProveedor.")";
										$username = 'a00364395';
									   	$password = 'tec4395';
									    $db = "(DESCRIPTION = 
													(ADDRESS = 
									     		   	(PROTOCOL = TCP)
										  		   	(HOST = 10.40.53.10)
									    		   	(PORT = 1521))
												(CONNECT_DATA = 
												   	(SERVER = DEDICATED)
												   	(SERVICE_NAME = alum.gda.itesm.mx)))";

									    $conn = oci_connect($username, $password, $db);
									    if ($conn) {
									    	echo "GOOD CONNECTION";
									    }
										$stid = oci_parse($conn, $query);
										oci_execute($stid);
									}
								?>
				<!--inicio los proveedores-->
								<?php
									$username = 'a00364395';
									$password = 'tec4395';
									$db = "(DESCRIPTION = 
												(ADDRESS = 
									     	   	(PROTOCOL = TCP)
										  	   	(HOST = 10.40.53.10)
									    	   	(PORT = 1521))
											(CONNECT_DATA = 
											   	(SERVER = DEDICATED)
											   	(SERVICE_NAME = alum.gda.itesm.mx)))";

									$conn = oci_connect($username, $password, $db);
								    if ($conn) {
								    	$query = "SELECT * FROM proveedorj ORDER BY NOMBREPROVEEDOR";
								    	$stid = oci_parse($conn, $query);
										oci_execute($stid);
										echo "
											<div class='ui-329'>
											<div class='container'>
											";
										while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
											$idProveedor = "".$pow['IDPROVEEDOR']."";
											$nombreProveedor = "".$pow['NOMBREPROVEEDOR']."";
											$telefonoProveedor = "".$pow['TELEFONO']."";
											echo '
											<div class = "row">
												<div class="col-md-6">
													<!-- Item -->
													<div class="item">
														<!-- Head -->
														<div class="head clearfix">
															<!-- Image -->
															<img src="http://www.twcdi.ie/images/avatars/default_set/default-avatar.png" alt="" class="img-responsive" />
															<!-- Name and designation -->
															<h2>'.$nombreProveedor.'</h2>
														</div>
														<!-- Content -->
														<div class="content">
															<ul class="list-unstyled">
																<!-- Icon with content -->
																<li><a href="#"><i class="fa fa-key bg-yellow"></i>'.$idProveedor.'</a></li>
																<li><a href="#"><i class="fa fa-phone-square bg-green"></i>'.$telefonoProveedor.'</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											';
										}
										echo "</div>
										</div>
										</div>";
								    }
								?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div><!-- /UI X -->
		</div><!-- /Container -->
		<br><br>
		<br><br>
		<footer>
			<p>
				<strong>Powered by Jumarogu</strong>
			</p>
			<p>
				Joyeria Cristal
			</p>
		</footer>

		<!-- Javascript files -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#formaCl").hide();
				$("#agregarCl").click(function(){
					$("#formaCl").show();
				});
				$("#finalFormaCl").click(function(){
					$("#formaCl").hide();
				});
				$("#formaCa").hide();
				$("#agregarCa").click(function(){
					$("#formaCa").show();
				});
				$("#finalFormaCa").click(function(){
					$("#formaCa").hide();
				});
				$("#formaPi").hide();
				$("#agregarPi").click(function(){
					$("#formaPi").show();
				});
				$("#finalFormaPi").click(function(){
					$("#formaPi").hide();
				});
				$("#formaPo").hide();
				$("#agregarPo").click(function(){
					$("#formaPo").show();
				});
				$("#finalFormaPo").click(function(){
					$("#formaPo").hide();
				});
			});
		</script>
		<!-- jQuery -->
		<script src="ui/js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="ui/js/bootstrap.min.js"></script>
		<!-- Placeholder JS -->
		<script src="ui/js/placeholder.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="ui/js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="ui/js/html5shiv.js"></script>
		<!--Import jQuery before materialize.js-->
     	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>
