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
if (isset($_POST{
'nama'})) {
	$nama = $_POST['nama'];
	$user = $_POST['user'];
	$level = $_POST['level'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas,level,username,password) VALUES ('$nama','$level','$user','$password')");

	if ($query) {
		echo '<script>alert("Tambah Data Berhasil");location.href="?page=petugas";</script>';
	} else {
		echo '<script>alert("Tambah Data Gagal");location.href="?page=petugas";</script>';
	}
}
?>

<h1 class="h3 mb-3"> Tambah petugas</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">nama</label>
						<div class="col-sm-12">
							<input type="text" name="nama" class="form-control mb-3" required>
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">username</label>
						<div class="col-sm-12">
							<input type="text" name="user" class="form-control mb-3" required>
						</div>

						<div class="mb-3">
							<label class="form-label">Password</label>
							<div class="col-sm-12">
								<input type="password" name="password" class="form-control mb-3" required>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">level</label>
							<div class="col-sm-12">
								<select name="level" class="form-select">
									<option value="" hidden>Pilih Level Petugas</option>
									<option value="admin">Admin</option>
									<option value="petugas">Petugas</option>
								</select>
							</div>
						</div>

						<div class="mb-3" style="float: right;">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="?page=petugas" class="btn btn-danger">kembali</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>