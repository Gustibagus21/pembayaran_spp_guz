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
$id = $_GET['id'];
if (isset($_POST['nominal'])) {
	$nominal = $_POST['nominal'];
	$tahun = $_POST['tahun'];

	$query = mysqli_query($koneksi, "UPDATE spp SET nominal='$nominal',tahun='$tahun' WHERE id_spp='$id'");

	if ($query) {
		echo '<script>alert("Data Berhasil Di edit");location.href="?page=spp";</script>';
	} else {
		echo '<script>alert("Data Gagal Di edit");location.href="?page=spp";</script>';
	}
}
$query = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3"> Edit SPP</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">

					<div class="mb-3">
						<label class="form-label">Tahun</label>
						<div class="coll-sm-12">
							<input type="text" name="tahun" class="form-control" value="<?= $data['tahun'] ?>" required>
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">nominal</label>
						<div class="col-sm-12">
							<input type="number" name="nominal" class="form-control" value="<?= $data['nominal'] ?>" required>
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