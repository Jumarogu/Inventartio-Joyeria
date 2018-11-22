<?php
	session_start();			
	if(isset($_POST['email'])){
		$email = $_POST['email'];
		if(isset($_POST['password'])){
			$pass = $_POST['password'];
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
		    $query = "SELECT * FROM admin";
		    $stid = oci_parse($conn, $query);
			oci_execute($stid);

			while (($row = oci_fetch_array($stid, OCI_BOTH))) {
				$dbUserName = $row['ANAME'] ." ".$row['ALNAME'];
				$dbUserEmail = $row['AEMAIL'];
				$dbUserPass = $row['APASS'];
			}
		}
		if(($email == $dbUserEmail) && ($pass == $dbUserPass)){
			$_SESSION['login_user'] = $dbUserName;
			$_SESSION['login_user_email'] = $dbUserEmail;
			header("location: admin.php");
		}
		else{
			echo "<p>email o contraseña incorrectas</p>";
		}
	}
?>