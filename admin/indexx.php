<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bemon</title>
  <?php
		include 'koneksi.php';
		session_start();
		$email 	= $_SESSION['email'];
		$sql = mysql_query("select * from customer_acc where email = '".$_SESSION['email']."' ");
		$data = mysql_fetch_row($sql);
		$id = $data[0]; 
		$query	=	mysql_query("SELECT * FROM customer_acc where email='$email' and verifikasi = 'belum'");  
		$cek	=	mysql_num_rows($query);
		if($cek){
			include 'head2.php';
			$konsultasi = "verifikasi";
			$emergency =  "verifikasi";
			$umum = "verifikasi";
			$berkala = "verifikasi";
			$sparepart = "verifikasi";
			$cleaning = "verifikasi";
			
		}else{
			if(empty($_SESSION['email'])){
				include 'head.php';
				$konsultasi = "login";
				$emergency =  "login";
				$umum = "login";
				$berkala = "login";
				$sparepart = "login";
				$cleaning = "login";
			}else{
				include 'head1.php';
				$konsultasi = "konsultasi";
				$emergency =  "emergency";
				$umum = "umum";
				$berkala = "berkala";
				$sparepart = "sparepart";
				$cleaning = "cleaning";
				
			}
		}
	?>
	<script>
        $(document).ready(function(){
        $("#cpx").hide();
				$("#pelayanan").hide();
  		$("#cp").click(function(){
				$("#pelayanan").show(500);
            $("#cpx").show();
            $("#cp").hide();
			});
			$("#cpx").click(function(){
    		$("#pelayanan").hide(500);
            $("#cpx").hide();
            $("#cp").show();
  		});
	});

	$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1400, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

</script>

</head>
<body class="body-bg">
<div class="container-fluid"> 
<div class="col-md-10 col-md-offset-1">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>		
			</ol>
			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img class="img-responsive" src="admin/image/10691a3ea9ac5bbf647fe60042bf3c11.jpg" alt="www.malasngoding.com">
					<div class="carousel-caption">
						<h1>Bemon.com</h1>
						<h4>Servis Motor ditempat anda</h4>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="admin/image/audi.jpg" alt="www.malasngoding.com">
					<div class="carousel-caption">
						<h1>Bemon.com</h1>
						<h4>Lebih Hemat Waktu</h4>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="admin/image/gelandewagen.jpg" alt="www.malasngoding.com">
					<div class="carousel-caption">
						<h1>Bemon.com</h1>
						<h4>Layanan Bergaransi</h4>
					</div>
				</div>				
			</div>
			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
 
<div class="container ">
<div class="row box-pesan ">
  <div class="col-md-12">
		<h1 class="">Pilih layanan</h1>
		<a href="#pelayanan" id="cp" class="btn btn-primary zxc">Cara Pesan?</a>
		<a href="#pelayanan" id="cpx" class="btn btn-danger zxc" >Tutup</a>
  </div>
		<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" data-toggle="modal" data-dismiss="modal" data-target="#<?php echo $konsultasi?>"><span class="glyphicon glyphicon-user"></span><br/>Konsultasi</button>
		</div>
		<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" data-toggle="modal" data-dismiss="modal" data-target="#<?php echo $emergency ?>"><span class="glyphicon glyphicon-warning-sign"></span><br/>emergency</button>
		</div>
		<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" data-toggle="modal" data-dismiss="modal" data-target="#<?php echo $umum ?>"><span class="glyphicon glyphicon-wrench"></span><br/>Servis umum</button>
		</div>
		<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" data-toggle="modal" data-dismiss="modal" data-target="#<?php echo $berkala ?>"><span class="glyphicon glyphicon-wrench"></span><br/>Servis berkala</button>
		</div>
		<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" data-toggle="modal" data-dismiss="modal" data-target="#<?php echo $sparepart ?>"><span class="glyphicon glyphicon-wrench"></span><br/>Sparepart</button>
		</div>
		<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" data-toggle="modal" data-dismiss="modal" data-target="#<?php echo $cleaning ?>"><span class="glyphicon glyphicon-tint"></span><br/>cleaning</button>
		</div>
 </div>
</div>

<div id="pelayanan">
  <div class="container">
  <div class="col-sm-12 text-center">
	<h1>Cara Pesan</h1>
	<br/>

  </div>
    <div class="col-sm-3">
		<img src="image/T1.png" class="img-responsive img-rounded text-center"/>
		<h3 class="text-center">Login</h3>
		<p class="text-center">Sebelum anda menggunakan jasa kami,anda wajib login ke Bemon,
		jika belum menjadi member anda bisa klik login lalu klik daftar sekarang</p>
    </div>
    <div class="col-sm-3">
		<img src="image/T2.png" class="img-responsive img-rounded text-center"/>
		<h3 class="text-center">Pesan</h3>
		<p class="text-center">pilih layanan yang diinginkan lalu klik pesan, tunggu sejenak montir akan datang</p>
    </div>
    <div class="col-sm-3">
		<img src="image/T1.png" class="img-responsive img-rounded text-center"/>	  
		<h3 class="text-center">Montir Akan Datang</h3>
		<p class="text-center">Montir akan datang ke tempat anda,untuk memperbaiki sepeda motor anda</p>
    </div>
	<div class="col-sm-3">
		<img src="image/T1.png" class="img-responsive img-rounded text-center" />
		<h3 class="text-center">Lakukan Pembayaran</h3>
		<p class="text-center">Setelah montir selesai memperbaiki sepeda motor anda, anda bisa melakukan pembayaran tunai maupun non tunai via be-money</p>
    </div>
  </div>
<br/>
</div>
</div>
</body>
</html>
