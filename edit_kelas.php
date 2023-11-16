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
if (isset($_POST['kelas'])) {
	$kelas = $_POST['kelas'];
	$kompetensi_keahlian = $_POST['ahli'];

	$query = mysqli_query($koneksi, "UPDATE kelas SET kelas='$kelas',kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id'");

	if ($query) {
		echo '<script>alert("Data Berhasil Di Ganti");location.href="?page=kelas";</script>';
	}else {
		echo '<script>alert("Data Berhasil Di Gagal");location.href="?page=kelas";</script>';
	}
}
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3"> Ubah Kelas</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">Nama Kelas</label>
						<div class="col-sm-12">
						<select name="kelas" class="form-select" required>
							<option value="10"<?= ($data['kelas'] == '10' ? 'selected' : '' ) ?>>10</option>
							<option value="11"<?= ($data['kelas'] == '11' ? 'selected' : '' ) ?>>11</option>
							<option value="12"<?= ($data['kelas'] == '12' ? 'selected' : '' ) ?>>12</option>
						</select>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Kompetensi keahlian</label>
						<div class="col-sm-12">
							<input type="text" name="ahli" class="form-control" value="<?php echo $data['kompetensi_keahlian'] ?>">
						</div>
					</div>
					<div class="mb-3" style="float: right;">
						<button class="btn btn-primary" >Simpan</button>
						<a href="?page=kelas" class="btn btn-danger">kembali</a>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>