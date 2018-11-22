<?php
	include('login.php');
	if(isset($_SESSION["login_user"])){
		header("location: admin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign in</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="ui/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="ui/css/font-awesome.min.css" rel="stylesheet">
		<!-- Main CSS -->
		<link href="ui/css/style-150.css" rel="stylesheet">		
		<!-- Favicon -->
		<link rel="shortcut icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/315-200.png">
		<link href="ui/css/estilos.css" rel="stylesheet">
	</head>
	
	<body>
		<!-- UI # -->
		<div class="ui-150">
		
			<div class="container">
				<div class="row">
					<div class="col-md-3">
					
					</div>

					<div class="col-md-6">
					
						<!-- Login Form -->
						<div class="ui-form">
							<h3 class="text-center">Sign In</h3>
							<form action="" method="post">
								<!-- Email -->
								<div class="form-group">
									<input name="email"type="email" class="form-control" placeholder="Enter Email">
								</div>
								<!-- Password -->
								<div class="form-group">
									<input name="password" type="password" class="form-control" placeholder="Enter Password">
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox"> Remember Me
									</label>
								</div>
								<!-- Button -->
								<button type="submit" class="btn btn-block">Sign In</button> 
							</form>
						</div>
					</div>
					<div class="col-md-3">
					
					</div>
				</div>
			</div>
		
		</div>
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