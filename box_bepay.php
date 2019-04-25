<?php 
    include 'koneksi.php';
    error_reporting(0);
	session_start();
	if(empty($_SESSION['email'])){
		include 'head.php';
		echo "<script>document.location='index.php'</script>";
	}else{
		$_SESSION['email'];
        include 'head3.php';
        $email 	= $_SESSION['email'];
        $key = $_REQUEST['serv'];
		$sql = mysql_query("select * from customer_acc where email = '".$_SESSION['email']."' ");
		$data = mysql_fetch_row($sql);
		$id = $data[0]; 
	} 
    include 'pagination1.php';
    //mengatur variabel reload dan sql
       if(isset($_SESSION['email'])){
                $reload = "box_bepay.php?pagination=true";
                $sql =  "SELECT * FROM saldo WHERE id_customer = '$id' ";
                $result = mysql_query($sql);
        }else{
			echo "<script>document.location='index.php'</script>";
        }
        
        //pagination config start
        $rpp =5; // jumlah record per halaman
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end ?>
        <script>
        $(document).ready(function(){
        $("#sh").hide();
  		$("#hd").click(function(){
    		$(".layanan").hide(500);
            $("#sh").show();
            $("#hd").hide();
  		});
  		$("#sh").click(function(){
    		$(".layanan").show(500);
            $("#sh").hide();
            $("#hd").show();
  		});
	});
    </script>
<div class="container" style="margin-top:100px;">
	
    <div class="container bdr-xc">
    <div class="pesanan">
    <h3 class="">Pemesanan Saldo Be-Pay</h3>
    <?php    
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
    
    <div class="rsearch">
				<h4>ID order       	: <?php echo $data[0]?></h4>
				<h4>Nominal        	: <?php echo $data[2]?></h4>
				<?php $ids = $data[0]; ?>
				<?php if ($data[3] == "Pembayaran"){ ?>
				<h4>Status               : <?php echo $data[3]?></h4>
				<button type="button" data-toggle="modal" data-dismiss="modal" data-target="#payment" class="btn btn-primary zxcbtm">Kirim Bukti Pembayaran</button>
				
				<?php }else if ($data[3] == "Menunggu Konfirmasi Admin"){ ?>

				<h4>Status              : <?php echo $data[3]?> </h4>
				
				<?php }else if ($data[3] == "Lunas"){ ?>
				<h4>Status              : Lunas </h4>
				<?php } else { ?>
					<h4>Status              : <?php echo $data[3]?> </h4>
					<button type="button" data-toggle="modal" data-dismiss="modal" data-target="#payment" class="btn btn-primary zxcbtm">Kirim Bukti Pembayaran</button>
				<?php } ?>
	</div>
        <?php 
		    $i++; 
            $count++;
        } ?>
		<div class="text-center">
            <?php echo paginate_one($reload, $page, $tpages); ?>
        </div>
        
	</div>
		<br/>
	</div>
	
	<div class="modal fade" id="payment" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Pembayaran</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<form action="insert_pembayaran_saldo_engine.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
				<div class="row">
				<div class="col-sm-12 modal-body">
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
				<center><input id="imgInp" type="file" name="image" onchange="readURL(this);"  class="btn btn-md btn-primary form-control"/></center>
				<input type="hidden" name="id_saldo" value="<?php echo $ids;?>"/>
				</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="submit"  name="emergency_submit" class="btn btn-primary">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>