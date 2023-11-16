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
if (isset($_POST['nisn'])) {
	$nisn = $_POST['nisn'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jk'];
	$id_kelas = $_POST['kelas'];
	$no_telp = $_POST['no_telp'];
	$password = md5($_POST['password']);

	$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn' OR nis='$nis'");
	$cek_siswa = mysqli_num_rows($cek);

	if ($cek_siswa >= 1) {
		echo '<script>alert("Data Sudah Di Pakai");location.href="?page=siswa";</script>';
	} else {
		$query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama,alamat,jk,id_kelas,no_telp,password) VALUES ('$nisn','$nis','$nama','$alamat','$jk','$id_kelas','$no_telp','$password')");

		if ($query) {
			echo '<script>alert("Data Berhasil Di Tambah");location.href="?page=siswa";</script>';
		} else {
			echo '<script>alert("Data Gagal Di Tambah");location.href="?page=siswa";</script>';
		}
	}
}
?>

<h1 class="h3 mb-3"> Tambah siswa</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">


			<div class="card-body">
				<form action="" method="POST">

					<div class="mb-3">
						<label class="form-label">NISN</label>
						<div class="coll-sm-12">
							<input type="text" name="nisn" class="form-control mb-3" required>
						</div>

						<div class="mb-3">
							<label class="form-label">NIS</label>
							<div class="coll-sm-12">
								<input type="text" name="nis" class="form-control mb-3" required>
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label">NAMA SISWA</label>
							<div class="coll-sm-12">
								<input type="text" name="nama" class="form-control mb-3" required>
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label">alamat</label>
							<div class="coll-sm-12">
								<textarea name="alamat" class="form-control" required></textarea>
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label">No. HP</label>
							<div class="coll-sm-12">
								<input type="text" name="no_telp" class="form-control mb-3" required>
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label">Password</label>
							<div class="col-sm-12">
								<input type="password" name="password" class="form-control mb-3" required>
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label">JENIS KELAMIN</label>
							<div class="coll-sm-12">
								<select name="jk" class="form-select">
									<option value="" hidden></option>
									<option value="Laki-Laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label">Kelas</label>
							<select name="kelas" class="form-select" required>
								<option value="" hidden></option>
								<?php
								$query = mysqli_query($koneksi, "SELECT * FROM kelas");
								while ($data = mysqli_fetch_array($query)) {
								?>
									<option value="<?php echo $data['id_kelas'] ?>"> <?php echo $data['kelas'] ?> - <?php echo $data['kompetensi_keahlian'] ?></option>
								<?php
								}
								?>
							</select>
							<div class="mb-3" style="float: right;">
								<button class="btn btn-primary">Simpan</button>
								<a href="?page=siswa" class="btn btn-danger">kembali</a>
							</div>

						</div>
				</form>
			</div>
		</div>
	</div>
</div>