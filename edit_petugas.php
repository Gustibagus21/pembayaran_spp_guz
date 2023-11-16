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
if (isset($_POST['masuk'])) {
	$nama_petugas = $_POST['nama_petugas'];
	$username = $_POST['username'];
	$level = $_POST['level'];
	$password = md5($_POST['password']);

	if (empty($_POST['password'])) {
		$query = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',level='$level' WHERE id_petugas='$id'");

		if ($query) {
			echo '<script>alert("Data Berhasil Di Ganti");location.href="?page=petugas";</script>';
		} else {
			echo '<script>alert("Data Berhasil Di Gagal");location.href="?page=petugas";</script>';
		}
	} else {
		$query = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',password='$password',level='$level' WHERE id_petugas='$id'");

		if ($query) {
			echo '<script>alert("Data Berhasil Di Ganti");location.href="?page=petugas";</script>';
		} else {
			echo '<script>alert("Data Berhasil Di Gagal");location.href="?page=petugas";</script>';
		}
	}
}
$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3"> Ubah petugas</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">

					<div class="mb-3">
						<label class="form-label">Nama</label>
						<div class="col-sm-12">
							<input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas'] ?>">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">Username</label>
						<div class="col-sm-12">
							<input type="text" name="username" class="form-control" value="<?php echo $data['nama_petugas'] ?>">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">Password</label>
						<div class="col-sm-12">
							<input type="password" name="password" class="form-control mb-3">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">level </label>
						<div class="col-sm-12">
							<select name="level" class="form-control">
								<option value="<?php echo $data['level'] ?>" hidden><?php echo $data['level'] ?></option>
								<option value="admin">Admin</option>
								<option value="petugas">Petugas</option>
							</select>
						</div>
					</div>
					<div class="mb-3" style="float: right;">
						<button type="submit" class="btn btn-primary" name="masuk">Simpan</button>
						<a href="?page=petugas" class="btn btn-danger">kembali</a>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>