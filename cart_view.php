<?php 
	error_reporting(0);	
?>
<h6 class="">Sparepart yang dibeli : </h6>
<table class="table table-condensed" width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
    <tr>
        <th align="left" scope="col">Sparepart</th>
        <th align="right" scope="col">Harga</th>
		<th align="right" scope="col">Aksi</th>
    </tr>
    <?php
	include 'koneksi.php';
    $total = 0;
    if (isset($_SESSION['item'])) {
        foreach ($_SESSION['item'] as $key => $val) {
            $query = mysql_query("select * from sparepart where id_sparepart = '$key'");
            $rs = mysql_fetch_array($query);
            $jumlah_harga = $rs[3] * $val;
            $total += $jumlah_harga;
            ?>
            <tr>
                <td><?php echo $rs[1]; ?></td>
                <td><?php echo number_format($rs[3]); ?></td>
				 <form action="" method="post">
					<input type="hidden" name="id_spareparts" value="<?php echo $rs[0]?>"/>
					<td><button type="submit" name="del_data" class="btn btn-md btn-danger" >Hapus</button></td>
				 </form>
            </tr>
            <?php
            mysql_free_result($query);
        }
    }
	$_SESSION['harga'] = number_format($total);
    ?>
    <tr>
        <td>Total</td>
        <td align="left"><?php echo number_format($total); ?></td>
		<form action="" method="post">
			<td align="center"><button type="submit" name="clear_cart" class="btn btn-warning btn-md ">Kosongkan Keranjang</button></td>
		</form>
	</tr>
</table>
