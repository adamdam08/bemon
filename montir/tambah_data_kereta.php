<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
?>

<div class="container-fluid">
   <?php include'sidebar.php'?>
    <div class="">
		<form action="insert_kereta_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Tambah Data Kereta</h3>
						</div>
						
						<!-- mark -->
						<p>Nama Kereta :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" placeholder="Nama Kereta" name="perusahaan" class="form-control">
						</div>
						<!-- mark -->
						
						<br/>
						<p>Masukan Gambar : </p>
						<center><img id="blah" src="" width="120px" height="140px" /></center></br>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
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
				<center><input id="imgInp" type="file" name="image" placeholder="masukan" onchange="readURL(this);"  class="btn btn-md btn-default form-control"/></center>
						</div>
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Save</button>  
						</div>
				</form>
			</div>
</div>