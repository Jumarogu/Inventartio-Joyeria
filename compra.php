<?php 
	if(isset($_POST['id']) && isset($_POST['cantidad']) && isset($_POST['precio'])){
		$idPieza = $_POST['id'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$date = date("d/m/Y");

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
			$alter = "ALTER SESSION SET NLS_DATE_FORMAT = 'dd/mm/yyyy'";
			$stid = oci_parse($conn, $alter);
			oci_execute($stid);
			$query = "INSERT INTO VENTAJ VALUES('',SYSDATE,'Efectivo', ".$precio.", '0')";
			$stid = oci_parse($conn, $query);
			oci_execute($stid);
			$query = "SELECT idventa FROM ventaj WHERE PRECIOTOTAL = ".$precio."";
			$stid = oci_parse($conn, $query);
			oci_execute($stid);
			while (($pow = oci_fetch_array($stid, OCI_BOTH))) {
				$idventa = "".$pow['IDVENTA']."";
			}
			$query = "INSERT INTO DESVENTAJ VALUES(".$idventa.", ".$idPieza.", ".$cantidad.")";
			$stid = oci_parse($conn, $query);
			oci_execute($stid);
		}
	}
?>