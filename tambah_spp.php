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
if (isset($_POST['tahun'])) {
	$tahun = $_POST['tahun'];
	$nominal = $_POST['nominal'];

	$query = mysqli_query($koneksi, "SELECT * FROM spp INNER JOIN pembayaran ON spp.id_spp=pembayaran.id_spp");

	$query = mysqli_query($koneksi, "INSERT INTO spp (tahun,nominal) VALUES ('$tahun','$nominal')");

	if ($query) {
		echo '<script>alert("Data Berhasil Di Tambah");location.href="?page=spp";</script>';
	} else {
		echo '<script>alert("Data Gagal Di Tambah");location.href="?page=spp";</script>';
	}
}
?>

<h1 class="h3 mb-3"> Tambah SPP</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="POST">

					<div class="mb-3">
						<label class="form-label">Tahun</label>
						<div class="coll-sm-12">
							<input type="text" name="tahun" class="form-control mb-3" required>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Nominal</label>
						<div class="coll-sm-12">
							<input type="text" name="nominal" class="form-control mb-3" required>
						</div>
					</div>
					<div class="mb-3" style="float: right;">
						<button class="btn btn-primary">Simpan</button>
						<a href="?page=spp" class="btn btn-danger">kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>