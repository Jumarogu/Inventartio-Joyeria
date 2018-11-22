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
      	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<!-- Bootstrap CSS -->
		<link href="../ui/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="../ui/css/font-awesome.min.css" rel="stylesheet">
		<link href="../ui/css/estilos.css" rel="stylesheet">
		
		<!-- Main CSS -->
		<link href="../ui/css/style-273.css" rel="stylesheet">
				
		<!-- Favicon -->
		<link rel="shortcut icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/315-200.png">
	</head>
	
	<body>

		<h3 align="center">Inventario Cadena Plata</h3>
		<!-- UI - X Starts -->
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
						<th>Nombre</th>
						<th>Joya</th>
						<th>Metal</th>
						<th>Kilataje</th>
						<th>Peso bruto</th>
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
								$query = "SELECT nombre, metal, kilataje, joya, pesoBruto FROM (SELECT * FROM Categoriaj WHERE IDcategoria = '5') b LEFT JOIN (SELECT Joya, Cantidad, IDcategoria from Piezaj) a ON a.IDcategoria=b.IDcategoria";
								$stid = oci_parse($conn, $query);
								oci_execute($stid);
								while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
									$nombreCat = "".$pow['NOMBRE']."";
									$metal = "".$pow['METAL']."";
									$kilataje = "".$pow['KILATAJE']."";
									$joya = "".$pow['JOYA']."";
									$pesoB = "".$pow['PESOBRUTO']."";
									echo '<tr>
										<td><a href="#" class="ui-check"><i class="fa fa-check"></i></a></td>
						      			<td>'.$nombreCat.'</td>
						      			<td>'.$joya.'</td>
					        			<td>'.$metal.'</td>
						       			<td>'.$kilataje.'</td>
						     			<td>'.$pesoB.'</td>
						    			';
								}	
					      	} 
					?>
				</table>
			</div>
		</div>
		<!-- UI - X Ends -->
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Placeholder JS -->
		<script src="js/placeholder.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<script>
			$(document).ready(function(){
				<!-- On Click Event -->
				$("tr > th > a.ui-check").click(function(e){
					e.preventDefault();
					if(!($(this).parents("tr").hasClass("active"))){	
						$("a.ui-check").children("i").addClass("lblue");	// Add Class
						$("tr").addClass("active");			// Add Class				
					}
					else{
						$("a.ui-check").children("i").removeClass("lblue");		// Remove Class
						$("tr").removeClass("active");			// Remove Class
					}
				});
				<!-- On Click Event -->
				$("tr > td > a.ui-check").click(function(e){
					e.preventDefault();
					<!-- For Each Clicked CheckBox -->
					$(this).each(function(){
						if(!($(this).parents("tr").hasClass("active"))){
							$(this).children("i").addClass("lblue");		// Add Class
							$(this).parents("tr").addClass("active");		// Add Class	
						}	
						else{
							$(this).children("i").removeClass("lblue");			// Remove Class
							$(this).parents("tr").removeClass("active");		// Remove Class
						}				
					});
				});
			
			});
		</script>
	</body>	
</html>