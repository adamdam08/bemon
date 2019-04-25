<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
?>

<div align="center">

<div class="container-fluid">
    <div class="col-md-1 menus">
		<div class="container-fluid mci">
			<ul class="list-group">
					<a class="active2 list-group-item list-group-item-action" data-toggle="collapse" href="#collapse1"><span class="glyphicon glyphicon-chevron-down"></span> Menu Kereta Api </a>
					<div id="collapse1" class="panel-collapse collapse">
					<a class="list-group-item list-group-item-action" href="index2.php"><span class="glyphicon glyphicon-list"></span> Keberangkatan</a>
					<a class="list-group-item list-group-item-action " href="stasiun.php"><span class="glyphicon glyphicon-list"></span> Stasiun</a>
					<a class="list-group-item list-group-item-action " href="kereta.php"><span class="glyphicon glyphicon-list"></span> Kereta</a>
					<a class="list-group-item list-group-item-action " href="pemesanan.php"><span class="glyphicon glyphicon-list"></span> Pemesanan</a>
					</div>
					<a class="active2 list-group-item list-group-item-action" data-toggle="collapse" href="#collapse2"><span class="glyphicon glyphicon-chevron-down"></span> Menu Pesawat </a>
					<div id="collapse2" class="panel-collapse">
					<a class="list-group-item list-group-item-action" href="index3.php"><span class="glyphicon glyphicon-list"></span> Keberangkatan</a>
					<a class="list-group-item list-group-item-action " href="bandara.php"><span class="glyphicon glyphicon-list"></span> Bandara</a>
					<a class="active list-group-item list-group-item-action " href="pesawat.php"><span class="glyphicon glyphicon-list"></span> Pesawat</a>
					<a class="list-group-item list-group-item-action " href="pemesanan.php"><span class="glyphicon glyphicon-list"></span> Pemesanan</a>
					</div>	
			</ul>
		</div>
	</div>
	
    <div class="col-md-11 tab-sc">
		<form action="insert_pesawat_engine.php" enctype="multipart/form-data" method="post">
			<div class="container-fluid bdr">
						<div>
							<h3 class="text-left">Tambah Data Pesawat</h3>
						</div>
						<div class="tab-s">
						<!-- mark -->
						<p>Type Pesawat :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" placeholder="Type Pesawat" name="nama_pes" class="form-control">
						</div>
						</div>
						<!-- mark -->
						
						<div class="tab-s">
						<p>Eco seat Num:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="number" class="form-control" name="eco_seat" placeholder="Eco Seat" "></input>
						</div>
						</div>
						
						<div class="tab-s">
						<p>Business seat Num</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="number" class="form-control" name="buss_seat" placeholder="Bussiness Seat"></input>
						</div>
						</div>
						
						<div class="tab-s">
						<p>First Class seat Num</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<input type="number" placeholder="First_Class_seat" name="fclass_seat" class="form-control">
						</div>
						</div>
						
						<div class="tab-s-btn">
							<button type="submit" class="btn btn-primary form-control">Save</button>  
						</div>
				</form>
			</div>
</div>