<?php 
	  include 'koneksi.php';
	  session_start();
			if(empty($_SESSION['email'])){
				include 'head_kereta.php';
				echo "<script>document.location='index.php'</script>";
		}else{
				$_SESSION['email'];
				include 'head3.php';
		}
	  error_reporting(0); 
        include 'pagination1.php';
       if(isset($_REQUEST['book'])){
            $keyword1 = $_REQUEST['book'];
            $sql =  "SELECT * FROM saldo WHERE id_saldo like '%$keyword1%'";
            $result = mysql_query($sql);
        }else{
			//echo "<script>document.location='index.php'</script>";
        }
        
        $rpp = 10;
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1;
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
		?>
<div class="container-fluid" style="margin-top:100px;">
<form action="insert_pembayaran_saldo_engine.php" enctype="multipart/form-data" method="post">
	<div class="col-md-12">
		<div class="rsearch">
			<h3>Pembayaran Saldo via Transfer</h3>
		</div>
	</div>
	<div class="col-md-4">
		<div class="rsearch">
			<h3><center>Masukan Bukti Pembayaran</center></h3>
			<hr/>
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
				<center><img id="blah" src="" style="width:100%; height: 580px;" /></center></br>
				<center><input id="imgInp" type="file" name="image" placeholder="masukan" onchange="readURL(this);"  class="btn btn-md btn-primary form-control"/></center>
		</div>
	</div>

	  <?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
			<div class="col-md-8">
			<div class="rsearch">
				<h3 style="margin-bottom:30px;">Data Pembelian Saldo</h3>
				<hr/>
						<!-- mark -->
						<p>ID Saldo :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
							<input type="text" readonly value="<?php echo $data['id_saldo']?>" name="id_book" class="form-control">
						</div>
						
						<br/>
						<p>User :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<input type="text" readonly class="form-control" value="<?php echo $data['user'];?>" name="em" ></input>
						</div>
						
						<br/>
						<p>Nominal Pembelian : </p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
						</span>
							<input type="text" readonly class="form-control" value="<?php echo $data['nominal'];?>" name="price" ></input>
						</div>
						
						<br/>
						<p>Saldo Saat Ini :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-usd"></span>
						</span>
						<?php 
							$key1 = $data['id_jadwal'];
							$s1 = mysql_query("SELECT * FROM customer where email =  '".$data[user]."' ");
							$d1 = mysql_fetch_array($s1);
						?>
							<input type="number" readonly name="cx" class="form-control" value="<?php echo $d1['saldo'];?>"></input>
						</div>
						
						<input type="text" readonly  class="form-control hidden" value="<?php echo $_SESSION['email']?>" name="email" ></input>
						<input type="text" readonly  class="form-control hidden" value="<?php echo $data['id_jadwal']?>" name="id_jadwal" ></input>
						<br/>
							<button style="float:right;" type="submit" class="btn btn-primary"><i>Bayar</i></button>  
						<br/>
						<br/>
					</form>
				</div>
			</div>
	<?php 
		$i++; 
        $count++;
		}	?>
</div>
</div>