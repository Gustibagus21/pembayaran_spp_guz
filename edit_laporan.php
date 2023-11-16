<?php
if ($role == 'siswa' || $role == 'petugas') {
?>
    <script>
        location.reload();
        alert("Anda Tidak Berhak Mengakses Halaman Ini");
        window.history.back();
    </script>
<?php
}
?>
<?php
$id=$_GET['id'];
if (isset($_POST['nominal'])) {
    $tanggal_bayar=$_POST['tanggal_bayar'];
    $bulan_bayar=$_POST['bulan_bayar'];
    $tahun_bayar=$_POST['tahun_bayar'];
    $nominal=$_POST['nominal'];

    $query =mysqli_query($koneksi, "UPDATE pembayaran SET tgl_bayar='$tanggal_bayar',bulan_bayar='$bulan_bayar',tahun_dibayar='$tahun_bayar',jumlah_bayar='$nominal' WHERE id_pembayaran='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil Di edit");location.href="?page=laporan";</script>';
    }else {
		echo '<script>alert("Data Gagal Di edit");location.href="?page=laporan";</script>';
	}
}
$query=mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran='$id'");
$data=mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3"> Edit Laporan</h1>
					<div class="row">
						<div class="col-12">
							<div class="card flex-fill">

							
							<div class="card-body">
                                <form action="" method="post">
								</div>
								<div class="mb-3">
									<label class="form-label">Tanggal Bayar</label>
									<div class="col-sm-12">
										<input type="date" name="tanggal_bayar" class="form-control" value="<?= $data['tgl_bayar'] ?>">
									</div>
								</div>
    
								<div class="mb-3">
									<label class="form-label">Bulan Bayar</label>
									<div class="col-sm-12">
										<input type="number" name="bulan_bayar" class="form-control" value="<?= $data['bulan_bayar'] ?>">
									</div>
								</div>
    
								<div class="mb-3">
									<label class="form-label">Tahun Bayar</label>
									<div class="col-sm-12">
										<input type="number" name="tahun_bayar" class="form-control" value="<?= $data['tahun_dibayar'] ?>">
									</div>
								</div>

								<div class="mb-3">
									<label class="form-label">SPP</label>
									<select name="spp" class="form-select">
										<option value="" hidden></option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM spp");
                                        while ($spp = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $spp['id_spp'] ?>" <?= ($data['id_spp'] == $spp['id_spp'] ? 'selected' : '' ) ?>> <?php echo $spp['tahun'] ?> - <?php echo $spp['nominal'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
								</div>	
    
								<div class="mb-3">
									<label class="form-label">nominal</label>
									<div class="col-sm-12">
										<input type="number" name="nominal" class="form-control" value="<?= $data['jumlah_bayar'] ?>">
									</div>
								</div>

							</div>
							<div class="mb-3" style="float: right;">
								<button class="btn btn-primary">Simpan</button>
								<a href="?page=laporan" class="btn btn-danger">kembali</a>
							</div>
                                </form>
						</div>
					</div>