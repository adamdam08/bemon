<?php include'validasi_login.php';?>
<html>
<head>
	<title>bemon.com administrator</title>
		<meta http-equiv="refresh" content="300" />
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#dat").click(function(){
					$("#mNavbar").toggle(1000);
				});});
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});
		</script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>
<body>

	<nav class="navbar navbar-bg navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
					<img src="image/nav_logo.png" width="50" height="50">
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
			<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><div class="nav-user"><span class="glyphicon glyphicon-user"></span> Hi,<i><?php echo $_SESSION['username'] ?></i></div></a>
						<ul class="dropdown-menu">
							<li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log-out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>
</body>
</html>