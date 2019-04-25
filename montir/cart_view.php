<?php 
	error_reporting(0);
	if(isset($_POST['clear_cart'])){
        $barang_id = $_POST['id_sparepart'];
        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $key => $val) {
                unset($_SESSION['items'][$key]);
            }
            unset($_SESSION['items']);
			unset($_SESSION['harga']);
			echo"<script>window.location.href='dashboard.php'</script>";
        }
	}
	
	 if (isset($_POST['del_data'])) {
        $barang_id = $_POST['id_spareparts'];
        if (isset($_SESSION['items'][$barang_id])) {
            unset($_SESSION['items'][$barang_id]);
        }
		echo"<script>window.location.href='dashboard.php'</script>";
    }
	
?>
<table class="table table-condensed" width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
    <tr>
        <th align="left" scope="col">part_id</th>
        <th align="left" scope="col">Sparepart</th>
        <th align="right" scope="col">Harga</th>
		<th align="right" scope="col">jml_item</th>
		<th align="right" scope="col">Aksi</th>
    </tr>
    <?php
	include 'koneksi.php';
    $total = 0;
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysql_query("select * from sparepart where id_sparepart = '$key'");
            $rs = mysql_fetch_array($query);
            $jumlah_harga = $rs[3] * $val;
            $total = $total + $jumlah_harga;
            ?>
            <tr>
                <td><?php echo $rs[0]; ?></td>
                <td><?php echo $rs[1]; ?></td>
                <td><?php echo number_format($rs[3]); ?></td>
				 <td><?php echo number_format($val); ?></td>
				 <form action="" method="post">
					<input type="hidden" name="id_spareparts" value="<?php echo $rs[0]?>"/>
					<td><button type="submit" name="del_data" class="btn btn-md btn-danger" >Hapus</button></td>
				 </form>
            </tr>
            <?php
            mysql_free_result($query);
        }
    }
    ?>
    <tr>
        <td>Total</td>
        <td align="left"><?php echo number_format($total); ?></td>
		<td></td>
		<td></td>
		<form action="" method="post">
			<td align="center"><button type="submit" name="clear_cart" class="btn btn-warning btn-md ">Kosongkan Keranjang</button></td>
		</form>
	</tr>
</table>
