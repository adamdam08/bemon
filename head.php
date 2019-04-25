<html>
<head>
		<link rel="icon" href="image/nav_logo.png">
		<title>Bemon</title>
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
			 window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
			$('input.number').keyup(function(){
			if (
            ($(this).val().length > 0) && ($(this).val().substr(0,) != '62')
				|| ($(this).val() == '')
				){
            $(this).val('62');    
				}
			});
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Password Tidak Sama !");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
		</script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-color navbar-fixed-top ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button btn-default" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
						<img src="image/nav_logo.png" width="50" height="50">
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="" data-toggle="modal" data-target="#login"><div class="otng"><span class="glyphicon glyphicon-log-in"></span> Login </div></a></li>
			</ul>
		</div>
	</nav>
</div>

<div class="modal fade" id="login" role="dialog">
	<form action="login_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Masuk Ke Akun anda</h3>
					<button type="button" class="btn btn-default zxc" data-dismiss="modal"><span class="glyphicon glyphicon-chevron-up"></span></button>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
						<br/>
						<img src="admin/image/logo.png" class="img-circle logo">
					<br/>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
					<input type="text" title="Masukan Username" class="form-control" name="email" placeholder="Masukan Email Anda"/>
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					
					<input type="password" title="Masukan Password" class="form-control " name="pass" placeholder="Masukan Password"/>
					</div>
					<br/>
				</div>
			</div>
			
		<div class="modal-footer">
			<h6 class="zxz">Belum Menjadi Member?<a class="rrc" href="" data-toggle="modal" data-target="#register" data-dismiss="modal"> Daftar Sekarang !</a></h6>
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	  </div>
	</div>
  </form>
</div>

<div class="modal fade" id="register" role="dialog">
	<form action="register_engine.php" method="post" enctype="multipart/form-data">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Daftar Sekarang! </h3>
					<button type="button" class="btn btn-default zxc" data-dismiss="modal"><span class="glyphicon glyphicon-chevron-up"></span></button>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
					<input type="text" title="nama" class="form-control" name="nama" placeholder="Nama"/>
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
						</span>
					<input type="email" title="email" class="form-control " name="email" placeholder="Email" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
					<input type="integer" title="telp" class="form-control" name="telp" value="62" maxlength="15" placeholder="Telepon"/>
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" pattern=".{8,}" title="password kurang dari 8 karakter" id="pw1" class="form-control " name="sandi1" placeholder="Kata Sandi"/>
					</div>
					
					</br>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" pattern=".{8,}" title="password kurang dari 8 karakter" id="pw2" class="form-control " name="sandi2" placeholder="Konfirmasi Kata Sandi"/>
					</div>
					
					<br/>
					<h4>Foto Kartu Identitas (max :2MB)</h4>
					<script>
					function readURL(input) {
					if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah')
							.attr('src', e.target.result);
					};

						reader.readAsDataURL(input.files[0]);
						}
					}
					</script>
					<center><img id="blah" src="" style="width:100%; height: 240px;" /></center></br>
					<center><input id="imgInp" type="file" name="image" accept="image/*" onchange="readURL(this);"  class="btn btn-md btn-primary form-control"/></center>
				</div>
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Daftar Sekarang!</button>
			<h6 class="zxz">Gunakan sedikitnya 8 karakter untuk Password</h6>
		</div>
	  </div>
	</div>
  </form>
</div>

</div>
</body>
</html>