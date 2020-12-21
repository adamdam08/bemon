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
				});
			});

			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});

			 window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
      }
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
		<?php    
		include 'koneksi.php';
		
		if(isset($_POST['clear_cart'])){
        $barang_id = $_POST['id_sparepart'];
        if (isset($_SESSION['item'])) {
            foreach ($_SESSION['item'] as $key => $val) {
                unset($_SESSION['item'][$key]);
            }
            unset($_SESSION['item']);
			echo" <script> $(document).ready(function() { $('#sparepart').modal('show');});</script> ";
        }
		}
	
		if (isset($_POST['del_data'])) {
        $barang_id = $_POST['id_spareparts'];
        if (isset($_SESSION['item'][$barang_id])) {
            unset($_SESSION['item'][$barang_id]);
        }
		echo" <script> $(document).ready(function() { $('#sparepart').modal('show');});</script> ";
    }
	
			if(isset($_POST['add_cart'])){
			$barang_id = $_POST['id_sparepart'];
			if (isset($_SESSION['item'][$barang_id])) {
				$_SESSION['item'][$barang_id] += 1;
			} else {
				$_SESSION['item'][$barang_id] = 1; 
			}
			echo" <script> $(document).ready(function() { $('#sparepart').modal('show');});</script> ";
		}
		
		if(isset($_POST['konsultasi_submit'])){ //check if form was submitted
			$id_kendaraan = $_POST['id_kendaraan'];
			$id_layanan = $_POST['id_layanan'];
			$dt_keluhan = $_POST['keluhan'];
			echo" <script> $(document).ready(function() { $('#konsultasi_checkout').modal('show');});</script> ";
			$queryxz = mysql_query("select * from konsultasi where id_konsultasi = '$id_layanan' ");
			$dataxz = mysql_fetch_row($queryxz);
			$nama_layanan = $dataxz[1];
			$harga = $dataxz[2];
			$queryxx = mysql_query("select * from tipe_kendaraan where id_kendaraan = '$id_kendaraan' ");
			$dataxx = mysql_fetch_row($queryxx);
			$nama_kendaraan = $dataxx[1];
		}else if(isset($_POST['emergency_submit'])){
			$id_kendaraan = $_POST['id_kendaraan'];
			$id_layanan = $_POST['id_layanan'];
			echo" <script> $(document).ready(function() { $('#emergency_checkout').modal('show');});</script> ";
			$queryxz = mysql_query("select * from emergency where id_emergency = '$id_layanan' ");
			$dataxz = mysql_fetch_row($queryxz);
			$nama_layanan = $dataxz[1];
			$harga = $dataxz[2];
			$queryxx = mysql_query("select * from tipe_kendaraan where id_kendaraan = '$id_kendaraan' ");
			$dataxx = mysql_fetch_row($queryxx);
			$nama_kendaraan = $dataxx[1];
		}else if(isset($_POST['cleaning_submit'])){
			$id_kendaraan = $_POST['id_kendaraan'];
			$id_layanan = $_POST['id_layanan'];
			echo" <script> $(document).ready(function() { $('#cleaning_checkout').modal('show');});</script> ";
			$queryxz = mysql_query("select * from cleaning where id_cleaning = '$id_layanan' ");
			$dataxz = mysql_fetch_row($queryxz);
			$nama_layanan = $dataxz[1];
			$harga = $dataxz[2];
			$queryxx = mysql_query("select * from tipe_kendaraan where id_kendaraan = '$id_kendaraan' ");
			$dataxx = mysql_fetch_row($queryxx);
			$nama_kendaraan = $dataxx[1];
		}else if(isset($_POST['umum_submit'])){
			$id_kendaraan = $_POST['id_kendaraan'];
			$id_layanan = $_POST['id_layanan'];
			echo" <script> $(document).ready(function() { 
				$('#u_checkout').modal('show');
			});</script> ";
			$queryxz = mysql_query("select * from umum where id_umum = '$id_layanan' ");
			$dataxz = mysql_fetch_row($queryxz);
			$nama_layanan = $dataxz[1];
			$harga = $dataxz[2];
			$queryxx = mysql_query("select * from tipe_kendaraan where id_kendaraan = '$id_kendaraan' ");
			$dataxx = mysql_fetch_row($queryxx);
			$nama_kendaraan = $dataxx[1];
		}else if(isset($_POST['berkala_submit'])){
			$id_kendaraan = $_POST['id_kendaraan'];
			$id_layanan = $_POST['id_layanan'];
			echo" <script> $(document).ready(function() { $('#b_checkout').modal('show');});</script> ";
			$queryxz = mysql_query("select * from berkala where id_berkala = '$id_layanan' ");
			$dataxz = mysql_fetch_row($queryxz);
			$nama_layanan = $dataxz[1];
			$harga = $dataxz[2];
			$pekerjaan = $dataxz[3];
			$queryxx = mysql_query("select * from tipe_kendaraan where id_kendaraan = '$id_kendaraan' ");
			$dataxx = mysql_fetch_row($queryxx);
			$nama_kendaraan = $dataxx[1];
		}else if(isset($_POST['spare_submit'])){
			echo" <script> $(document).ready(function() { $('#spare_checkout').modal('show');});</script> ";
		}else{
			
		}
		
			$query1 = mysql_query("select * from customer_acc where email = '".$_SESSION['email']."' ");
			$datax = mysql_fetch_row($query1);
			$id_user = $datax[0];
			$email 	= $datax[1];

			$query = mysql_query("select * from customer where id_customer = '".$id_user."' ");
			$dataxs = mysql_fetch_row($query);
			$nama = $dataxs[1];
			$no_hp = $dataxs[2];
		?>

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
					<button class="btn btn-info navbar-btn" onclick="window.location.href='http://localhost/be-mon/box.php'" ><div class="otng"><span class="glyphicon glyphicon-shopping-cart"></span> Pesanan anda</div></button>
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="" data-toggle="modal" data-dismiss="modal" data-target="#voucher"><div class="otng">Saldo Anda : <?php echo $dataxs[3];?></div></a><li>
			<li class="dropdown"><a class="dropdown-toggle"style="color:white;" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-chevron-right "></span> Hi,<?php echo $_SESSION['email'];?></a>
			<ul class="dropdown-menu">
				<li><a href="#" data-toggle="modal" data-dismiss="modal" data-target="#edit_akun" ><span class="glyphicon glyphicon-user"></span> Edit Akun</a></li>
				<li><a href="log_out.php"><span class="glyphicon glyphicon-log-out"></span> Log-Out</a></li>
			</ul>
		</li>
		</div>
		</div>
	</nav>
	
	<div class="modal fade" id="voucher" role="dialog">
	<form action="tambah_saldo_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title" style="color:white;">Tambah Saldo</h3>
					<div class="zxc">
						<button type="button" class="btn btn-default" onclick="window.location.href = 'box_bepay.php'" >Tagihan Saldo!</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-chevron-up"></span></button>
					</div>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
					<p class="text-left">Masukan Nominal</p>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<select width="20px" required name="saldo" class="form-control">
								<option value="20000">10000</option>
								<option value="50000">50000</option>
								<option value="100000">100000</option>
								<option value="500000">500000</option>
								<option value="1000000">1000000</option>
								<option value="5000000">5000000</option>
							</select>
					</div>
					<input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
					<br/>
					<br/>
				</div>
			</div>
			
			
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Tambah</button>
		</div>
	  </div>
			</div>
		</form>
	</div>

	<div class="modal fade" id="edit_akun" role="dialog">
	<form action="edit_akun_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Edit Akun </h3>
					<div class="zxc">
						<button type="button" class="btn btn-default" disabled><span class="glyphicon glyphicon-lock"></span> Akun</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_biodata" data-dismiss="modal"><span class="glyphicon glyphicon-user"></span> Biodata</button>
					</div>
				</div>
			<div align="center">
			<input type="hidden" name="id_user" value="<?php echo $id_user?>" required />
				<div class="modal-body modal-xs">
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
						</span>
					<input type="email" title="email" class="form-control " name="email" value="<?php echo $email?>" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" pattern=".{8,}" title="new password" id="pw1" class="form-control " name="sandi1" placeholder="Kata Sandi Baru" required />
					</div>
					
					</br>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" pattern=".{8,}" title="retype password" id="pw2" class="form-control " name="sandi2" placeholder="Konfirmasi Kata Sandi" required />
					</div>
				</div>
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Perbarui</button>
			</form>
			<button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	  </div>
	</div>
</div>

	<div class="modal fade" id="edit_biodata" role="dialog">
	<form action="edit_bio_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Edit Biodata </h3>
					<div class="zxc">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_akun" data-dismiss="modal"><span class="glyphicon glyphicon-lock"></span> Akun</button>
						<button type="button" class="btn btn-default" disabled><span class="glyphicon glyphicon-user"></span> Biodata</button>
					</div>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
					<input type="text"  class="form-control " name="nama" placeholder="Nama"  value="<?php echo $nama ?>" required />
					<input type="hidden"  class="form-control " name="id_user" placeholder="Nama"  value="<?php echo $id_user ?>" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
					<input type="text" class="form-control " name="kontak" placeholder="No. Telepon" value="<?php echo $no_hp ?>" required />
					</div>
				</div>
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Perbarui</button>
			</form>
			<button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	  </div>
	</div>
</div>

	<div class="modal fade" id="konsultasi" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Konsultasi</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="row">
					<div class="col-sm-6">
						<h6 class="">Tipe Kendaraan : </h6>
						<?php $resultxc = mysql_query("SELECT * FROM tipe_kendaraan");?>
							<select required width="20px" name="id_kendaraan" class="form-control">
								<option value="" disabled selected >Pilih kendaraan anda</option>
								<?php while ($rows = mysql_fetch_row($resultxc)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
							</select>

						<h6 class="">Tipe masalah : </h6>
						<?php $resultx = mysql_query("SELECT * FROM konsultasi");?>
							<select required width="20px" name="id_layanan" class="form-control">
								<option value="" disabled selected >Pilih masalah anda</option>
								<?php while ($row = mysql_fetch_row($resultx)) {?>
								<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
							<?php } ?>
							</select>
					</div>
					<div class="col-sm-6">
						<h6 class="">Masukan Keluhan Anda</h6>
						<textarea rows="4" placeholder="Masukan Keluhan Anda" name="keluhan" class="form-control" required></textarea>

					</div>
					</div>
					</div>
				<div class="modal-footer">
						</form>
					<button type="submit" name="konsultasi_submit" class="btn btn-primary">Pesan sekarang</button>
				</div>
			</div>
			</div>
	</div>

	<div class="modal fade" id="konsultasi_checkout" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Konsultasi Checkout</h3>
					<div class="zxc">
						<button type="button" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#konsultasi">Kembali</button>
					</div>
				</div>
				<form action="add_konsultasi_engine.php" method="POST">
				<div class="modal-body">
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $nama; ?>" disabled/>
				<input type="hidden" name="id_user" class="form-control black" value="<?php echo $id_user; ?>" />

				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $nama_kendaraan;?>" disabled></input>
				<input type="hidden" name="id_kendaraan" class="form-control black" value="<?php echo $id_kendaraan;?>" />
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $nama_layanan; ?>" />
				<input type="hidden" name="id_layanan" class="form-control black" value="<?php echo $id_layanan;?>" />

				<h6 class="">Keluhan : </h6>
				<input type="text" class="form-control black" disabled value="<?php echo $dt_keluhan;?>" />
				<input type="hidden" name="keluhan" class="form-control black" value="<?php echo $dt_keluhan;?>" />
				
				<h6 class="">Total biaya : </h6>
				<input type="number" class="form-control black" disabled value="<?php echo $dataxz[2];?>" />
				<input type="hidden" name="price" class="form-control black" value="<?php echo $dataxz[2];?>" />
				
			</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Check-out !</button>
				</div>
			</div>
			</form>
			</div>
	</div>
	
	<div class="modal fade" id="emergency" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Emergency</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="row">
					<div class="col-sm-6">
					<h6 class="">Tipe Kendaraan : </h6>
						<?php $resultxc = mysql_query("SELECT * FROM tipe_kendaraan");?>
							<select required width="20px" name="id_kendaraan" class="form-control">
								<option value="" disabled selected >Pilih kendaraan anda</option>
								<?php while ($rows = mysql_fetch_row($resultxc)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
							</select>
					</div>
					<div class="col-sm-6">
					<h6 class="">tipe emergency</h6>
						<?php $resultx = mysql_query("SELECT * FROM emergency");?>
							<select required width="20px" name="id_layanan" class="form-control">
								<option value="" disabled selected >Pilih masalah anda</option>
								<?php while ($row = mysql_fetch_row($resultx)) {?>
								<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
							<?php } ?>
							</select>
					</div>
					</div>
					</div>
				<div class="modal-footer">
						</form>
					<button type="submit"  name="emergency_submit" class="btn btn-primary">Pesan</button>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="emergency_checkout" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Emergency Checkout</h3>
					<div class="zxc">
						<button type="button" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#emergency">Kembali</button>
					</div>
				</div>
				<form action="add_emergency_engine.php" method="POST">
				<div class="modal-body">
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $nama; ?>" disabled/>
				<input type="hidden" name="id_user" class="form-control black" value="<?php echo $id_user; ?>" />

				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $nama_kendaraan;?>" disabled></input>
				<input type="hidden" name="id_kendaraan" class="form-control black" value="<?php echo $id_kendaraan;?>" />
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $nama_layanan; ?>" />
				<input type="hidden" name="id_layanan" class="form-control black" value="<?php echo $id_layanan;?>" />
				
				<h6 class="">Total biaya : </h6>
				<input type="number" class="form-control black" disabled value="<?php echo $dataxz[2];?>" />
				<input type="hidden" name="price" class="form-control black" value="<?php echo $dataxz[2];?>" />
				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Check-out !</button>
					</form>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="umum" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Servis umum</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="row">
					<div class="col-sm-6">
					<h6 class="">Tipe Kendaraan : </h6>
						<?php $resultxc = mysql_query("SELECT * FROM tipe_kendaraan");?>
							<select required width="20px" name="id_kendaraan" class="form-control">
								<option value="" disabled selected >Pilih kendaraan anda</option>
								<?php while ($rows = mysql_fetch_row($resultxc)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
							</select>

					</div>
					<div class="col-sm-6">
						<h6 class="">Tipe Servis : </h6>
						<?php $resultxz = mysql_query("SELECT * FROM umum");?>
							<select required width="20px" name="id_layanan" class="form-control">
								<option value="" disabled selected >Pilih servis anda</option>
								<?php while ($rows = mysql_fetch_row($resultxz)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
							</select>
					</div>
					</div>
					</div>
				<div class="modal-footer">
					<button type="submit" name="umum_submit" class="btn btn-primary">Pesan</button>
				</form>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="u_checkout" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Servis umum Checkout</h3>
					<div class="zxc">
						<button type="button" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#umum">Kembali</button>
					</div>
				</div>
				<form action="add_umum_engine.php" method="POST">
				<div class="modal-body">
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $nama; ?>" disabled/>
				<input type="hidden" name="id_user" class="form-control black" value="<?php echo $id_user; ?>" />

				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $nama_kendaraan;?>" disabled></input>
				<input type="hidden" name="id_kendaraan" class="form-control black" value="<?php echo $id_kendaraan;?>" />
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $nama_layanan; ?>" />
				<input type="hidden" name="id_layanan" class="form-control black" value="<?php echo $id_layanan;?>" />
				
				<h6 class="">Total biaya : </h6>
				<input type="number" class="form-control black" disabled value="<?php echo $dataxz[2];?>" />
				<input type="hidden" name="price" class="form-control black" value="<?php echo $dataxz[2];?>" />
				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Check-out !</button>
					</form>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="berkala" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Servis berkala</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal" >Kembali</button>
					</div>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="row">
					<div class="col-sm-6">
					<h6 class="">Tipe Kendaraan : </h6>
						<?php $resultxc = mysql_query("SELECT * FROM tipe_kendaraan");?>
							<select required width="20px" name="id_kendaraan" class="form-control">
								<option value="" disabled selected >Pilih kendaraan anda</option>
								<?php while ($rows = mysql_fetch_row($resultxc)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
							</select>

					</div>
					<div class="col-sm-6">
						<h6 class="">Servis pada km </h6>
						<?php $resultx = mysql_query("SELECT * FROM berkala");?>
							<select required width="20px" name="id_layanan" class="form-control">
								<option value="" disabled selected >Pilih servis anda</option>
								<?php while ($rows = mysql_fetch_row($resultx)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
						</select>
					</div>
					</div>
					</div>
				<div class="modal-footer">
					<button type="submit" name="berkala_submit" class="btn btn-primary">Pesan</button>
					</form>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="b_checkout" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Servis Berkala Checkout</h3>
					<div class="zxc">
						<button type="button" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#berkala">Kembali</button>
					</div>
				</div>
				<form action="add_berkala_engine.php" method="POST">
				<div class="modal-body">
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $nama; ?>" disabled/>
				<input type="hidden" name="id_user" class="form-control black" value="<?php echo $id_user; ?>" />

				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $nama_kendaraan;?>" disabled></input>
				<input type="hidden" name="id_kendaraan" class="form-control black" value="<?php echo $id_kendaraan;?>" />
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $nama_layanan; ?>" />
				<input type="hidden" name="id_layanan" class="form-control black" value="<?php echo $id_layanan;?>" />
				
				<h6 class="">Pengerjaan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $pekerjaan; ?>" />
				
				<h6 class="">Total biaya : </h6>
				<input type="number" class="form-control black" disabled value="<?php echo $dataxz[2];?>" />
				<input type="hidden" name="price" class="form-control black" value="<?php echo $dataxz[2];?>" />
				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Check-out !</button>
					</form>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="sparepart" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Sparepart</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
					<div class="col-sm-12">
					<form action="" method="post">
						<h6 class="">Pilih sparepart</h6>
						<?php $resultx = mysql_query("SELECT * FROM sparepart");?>
						<select required width="20px" name="id_sparepart" class="form-control">
								<option value="" disabled selected >Pilih Sparepart</option>
								<?php while ($rows = mysql_fetch_row($resultx)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?>, <?php echo $rows[2]?></option>
							<?php } ?>
						</select>
						<br/>
						<button type="submit" name="add_cart" class="btn btn-primary">Tambah</button>
						</form>
					</div>
					<div class="col-sm-12">
					<br/>
						<?php include 'cart_view.php' ?>
					</div>
					</div>
				</div>
				<div class="modal-footer">
					<form action=" " method="post">
						<button type="submit" name="spare_submit" class="btn btn-primary">Pesan</button>
					</form>
					
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="spare_checkout" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Sparepart Checkout</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger"  data-toggle="modal" data-dismiss="modal" data-target="#sparepart" >Kembali</button>
					</div>
				</div>
				<form action="add_sparepart_engine.php" method="post">
				<div class="modal-body">
					<h6 class="">Nama Pemesan : </h6>
					<input type="text"  class="form-control black" value="<?php echo $nama; ?>" disabled/>
					<input type="hidden" name="id_user" class="form-control black" value="<?php echo $id_user; ?>" />
					<?php include 'cart_view.php' ?>
				</div>
				<div class="modal-footer">
						</form>
					<button type="submit" class="btn btn-primary">Pesan</button>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="cleaning" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Cleaning</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="row">
					<div class="col-sm-6">
					<h6 class="">Tipe Kendaraan : </h6>
						<?php $resultxc = mysql_query("SELECT * FROM tipe_kendaraan");?>
							<select required width="20px" name="id_kendaraan" class="form-control">
								<option value="" disabled selected >Pilih kendaraan anda</option>
								<?php while ($rows = mysql_fetch_row($resultxc)) {?>
								<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?></option>
							<?php } ?>
						</select>

					</div>
					<div class="col-sm-6">
					<h6 class="">Pilih layanan</h6>
						<?php $resultx = mysql_query("SELECT * FROM cleaning");?>
							<select required width="20px" name="id_layanan" class="form-control">
								<option value="" disabled selected >Pilih layanan</option>
								<?php while ($row = mysql_fetch_row($resultx)) {?>
								<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
							<?php } ?>
							</select>
					</div>
					</div>
					</div>
				<div class="modal-footer">
						</form>
					<button type="submit" name="cleaning_submit" class="btn btn-primary">Pesan</button>
				</div>
			</div>
			</div>
	</div>
	
	<div class="modal fade" id="cleaning_checkout" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Cleaning Checkout</h3>
					<div class="zxc">
						<button type="button" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#cleaning">Kembali</button>
					</div>
				</div>
				<form action="add_cleaning_engine.php" method="POST">
				<div class="modal-body">
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $nama; ?>" disabled/>
				<input type="hidden" name="id_user" class="form-control black" value="<?php echo $id_user; ?>" />

				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $nama_kendaraan;?>" disabled></input>
				<input type="hidden" name="id_kendaraan" class="form-control black" value="<?php echo $id_kendaraan;?>" />
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $nama_layanan; ?>" />
				<input type="hidden" name="id_layanan" class="form-control black" value="<?php echo $id_layanan;?>" />
				
				<h6 class="">Total biaya : </h6>
				<input type="number" class="form-control black" disabled value="<?php echo $dataxz[2];?>" />
				<input type="hidden" name="price" class="form-control black" value="<?php echo $dataxz[2];?>" />
				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Check-out !</button>
					</form>
				</div>
			</div>
			</div>
	</div>
	
</body>

</html>