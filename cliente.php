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

	if((isset($_POST["nombreCliente"])) && (isset($_POST["DireccionCliente"])) && (isset($_POST["correoCliente"])) && (isset($_POST["idCliente"]))){
		$idCliente = $_POST["idCliente"];
		$nombreCliente = $_POST["nombreCliente"];
		$direccionCliente = $_POST["direccionCliente"];
		$correoCliente = $_POST["correoCliente"];
	}
	$query = "INSERT INTO CLIENTEJ VALUES(".$idCliente.",".$nombreCliente.",".$direccionCliente.",".$correoCliente.")"
	$stid = oci_parse($conn, $query);
	oci_execute($stid);
?>