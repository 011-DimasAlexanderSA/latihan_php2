
<?php 
    $is_send = isset($_POST['submit']);
    $nama_barang =  $is_send? $_POST['nama_barang'] : "";
    $harga_satuan = $is_send? $_POST['harga_satuan'] : 0;
    $jumlah_pembelian = $is_send && (int)$_POST['harga_satuan'] > 1 ? $_POST['jumlah_pembelian'] : "";
    $harga_total = (int)$harga_satuan * (int)$jumlah_pembelian;

    if($harga_total >= 500_000){
        $diskon = 0.2;
    }elseif($harga_total >=250_000){
        $diskon = 0.1;
    }else{
        $diskon = 0;
    }
?>
<form method="POST">
    <label for="nama_barang">Nama Barang: </label>
    <input type="text" id="nama_barang" name="nama_barang" /><br>
    
    <label for="harga_satuan">Harga Satuan: </label>
    <input type="number" id="harga_satuan" name="harga_satuan" /><br>
    
    <label for="jumlah_pembelian">Jumlah Pembelian : </label>
    <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" /><br>
    <button name="submit" type="submit">kirim</button>
</form>

<p>Nama Barang : <?php echo $nama_barang ?></p>
<p>Harga Satuan : <?php echo "Rp".number_format($harga_satuan) ?></p>
<p>Jumlah Pembelian : <?php echo $jumlah_pembelian ?></p>
<p>Diskon : <?php echo ($diskon*100)."%" ?></p>
<p>Total Pembayaran : <?php echo "Rp".number_format($harga_total - ($harga_total * $diskon)) ?></p>



