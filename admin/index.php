<?php include'validasi_login2.php';?>
<html>
<head>
	<title>Admin Be-mon</title>
	<meta http-equiv="refresh" content="300" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>
<body class="body-bg">
<div class="container">
<div class="login-admin">
	<form action="process_login.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div align="center">
				<div class="modal-body modal-md">
					<br/>
						<img src="image/logo.png" class="img-circle logo">
						<h3>Admin</h3>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
					<input type="text" title="Masukan Username" class="form-control" name="username" placeholder="email"/>
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" title="Masukan Password" class="form-control " name="password" placeholder="password"/>
					</div>
					<br/>
				</div>
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
		</div>
	</div>
	</form>
</div>

</div>
</body>
</html>