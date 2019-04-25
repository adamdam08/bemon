<?php 	include'validasi_login.php';?>
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

	<nav class="navbar navbar-inverse grad1 navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button btn-default" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
					<a class="navbar-brand"><div class="otng">bemon.com</div></a>
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
			<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href=" "><div class="otng otk"><span class="glyphicon glyphicon-user"></span> Hi,<i><?php echo $_SESSION['username'] ?></i></div></a>
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