<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Joyería Cristal Venta</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Styles -->
		<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!-- Bootstrap CSS -->
		<link href="ui/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="ui/css/font-awesome.min.css" rel="stylesheet">
		<!-- Main CSS -->
		<link href="ui/css/style-12.css" rel="stylesheet">
		<link href="ui/css/estilos.css" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/315-200.png">
	</head>
	<body>
		<script type="text/javascript">
			var today = new Date();
    		var dd = today.getDate();
		    var mm = today.getMonth()+1; //January is 0!
		    var yyyy = today.getFullYear();
		    if(dd<10){
		        dd='0'+dd
		    } 
		    if(mm<10){
		        mm='0'+mm
		    } 
		    var today = dd+'/'+mm+'/'+yyyy;
		    document.getElementById("DATE").value = today;
		</script>
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
  				<button type="button" class="btn btn-default" id="return">
  					
  					<a href="admin.php">Regresar</a>
  				</button>
  				<button type="button" class="btn btn-default" id="logOut">
  					<i class="fa fa-sign-out"></i>
  					<a href="logout.php">Log out</a>
  				</button>
			</div>	
		</div>
		<br><br>
		<!-- UI X -->
		<div class="ui-12">
			<div class="container">
				<!-- UI Content -->
				<div class="ui-content">

					<!-- Ui head -->
					<div class="ui-head bg-lblue">
						<!-- Heading -->
						<h2>Venta</h2>
					</div>

					<!-- UI Body -->
					<div class="ui-body br-lblue">
						<!-- Container -->
						<div class="row">
								<!-- UI Features -->
								<div class="ui-feature">
									<!-- Heading -->
									<h3>Tabla</h3>
									<div class="ui-273">
									<!-- Table Responsive -->
									<div class="table-responsive">
										<!-- Table -->
										<table class="table table-bordered">
											<!-- Table Heading -->
											<form action="" method="post">
											<tr>
												<th>Fecha</th>
												<th>ID Pieza</th>
												<th>Cantidad</th>
												<th>Total</th>
											</tr>
											<tr>
												<td>
													<?php 
														echo date("d-m-Y");
													 ?>
												</td>
												<td><input type="text" name="id" placeholder="ID"></input></td>
												<td><input type="text" name="cantidad" placeholder="Cantidad"></input></td>
												<td><input type="text" name="precio" placeholder="Precio $"></input></td>
											</tr>
										</table>
										<?php
											include('compra.php');
										?>
										<button type = "submit" class="btn btn-lblue">Finalizar Venta $</button>
										<a href="#" class="btn btn-white">Eliminar Articulo</a>
										<a href="#" class="btn btn-white">Cancelar</a>
										</form>	
									</div>
								</div>
						</div>
					</div>
				</div>

				<!-- UI Content -->
				<div class="ui-content">
					<!-- Ui head -->
					<div class="ui-head bg-lblue">
						<!-- Heading -->
						<h2>Piezas</h2>
					</div>
					<!-- UI Body -->
					<div class="ui-body br-lblue">
						<!-- Container -->
						<div class="row">
								<!-- UI Features -->
								<div class="ui-feature">
									<!-- Heading -->
									<div><!--buscar-->
										<form action="" method="post">
											<div class="row">
			    									<div class="input-group">
				      									<input name ="search" type="text" class="form-control" placeholder="Buscar...">
				      									<span class="input-group-btn">
				        								<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				      									</span>	
			  										</div>
											</div><!-- /.row -->
										</form>
									</div><!--fin buscar-->
									<h3>Tabla</h3>
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
												<th>Nombre Categoria</th>
										        <th>Metal</th>
										        <th>Joya</th>
										        <th>Kilataje</th>
										        <th>ID Pieza</th>
											</tr>
											<?php
												if(isset($_POST['search'])){
													$search = $_POST['search'];
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
														$query = "SELECT nombre, metal, kilataje, Joya, idPieza FROM (SELECT * FROM Categoriaj WHERE nombre LIKE '%".$search."%' OR metal LIKE '%".$search."%') b LEFT JOIN (SELECT Joya, Cantidad, IDcategoria, idPieza from Piezaj) a ON a.IDcategoria=b.IDcategoria";
														$stid = oci_parse($conn, $query);
														oci_execute($stid);
														while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
															$nombreCat = "".$pow['NOMBRE']."";
															$metal = "".$pow['METAL']."";
															$kilataje = "".$pow['KILATAJE']."";
															$joya = "".$pow['JOYA']."";
															$idPieza = "".$pow['IDPIEZA']."";
															echo '<tr>
																<td><a href="#" class="ui-check"><i class="fa fa-check"></i></a></td>
												      			<td>'.$nombreCat.'</td>
												      			<td>'.$metal.'</td>
											        			<td>'.$joya.'</td>
											        			<td>'.$kilataje.'</td>
												       			<td>'.$idPieza.'</td>
												    			';
														}	
											      	}
											    } 
											?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--fin Ui content-->
			</div>
		</div>
		<br><br>
		<br><br>
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
	</body>
</html>
