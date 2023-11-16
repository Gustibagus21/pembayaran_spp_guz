<?php
if (isset($_POST['nisn'])) {
	$nisn = $_POST['nisn'];
	$petugas = $_POST['petugas'];
	$tanggal_bayar = $_POST['tanggal_bayar'];
	$bulan_bayar = $_POST['bulan_bayar'];
	$tahun_bayar = $_POST['tahun_bayar'];
	$spp = $_POST['spp'];
	$nominal = $_POST['nominal'];

	$query = mysqli_query($koneksi, "INSERT INTO pembayaran (nisn,id_petugas,tgl_bayar,bulan_bayar,tahun_dibayar,id_spp,jumlah_bayar) VALUES('$nisn','$petugas','$tanggal_bayar','$bulan_bayar','$tahun_bayar','$spp','$nominal')");

	if ($query) {
		echo '<script>alert("Data Berhasil Di Tambah");location.href="?page=laporan";</script>';
	} else {
		echo '<script>alert("Data Gagal Di Tambah");location.href="?page=laporan";</script>';
	}
}

if ($role == 'siswa' || $role == '') {
?>
	<script>
		location.reload();
		alert("Anda Tidak Berhak Mengakses Halaman Ini");
		window.history.back();
	</script>
<?php
}
?>

<h1 class="h3 mb-3"> Tambah pembayaran</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">

					<div class="mb-3">
						<label class="form-label">Nama Siswa</label>
						<select name="nisn" class="form-select">
							<option value="" hidden></option>
							<?php
							$query = mysqli_query($koneksi, "SELECT * FROM siswa");
							while ($data = mysqli_fetch_array($query)) {
							?>
								<option value="<?php echo $data['nisn'] ?>"> <?php echo $data['nisn'] ?> - <?php echo $data['nama'] ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<input type="hidden" name="petugas" value="<?= $_SESSION['user']['id_petugas'] ?>">

					<div class="mb-3">
						<label class="form-label">SPP</label>
						<select name="spp" class="form-select">
							<option value="" hidden></option>
							<?php
							$query = mysqli_query($koneksi, "SELECT * FROM spp");
							while ($data = mysqli_fetch_array($query)) {
							?>
								<option value="<?php echo $data['id_spp'] ?>"> <?php echo $data['tahun'] ?> - <?php echo $data['nominal'] ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="mb-3">
						<label class="form-label">Tanggal Bayar</label>
						<div class="col-sm-12">
							<input type="date" name="tanggal_bayar" class="form-control">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">Bulan Bayar ke</label>
						<div class="col-sm-12">
							<input type="number" name="bulan_bayar" class="form-control">
						</div>
					</div>


					<div class="mb-3">
						<label class="form-label">Tahun Bayar</label>
						<div class="col-sm-12">
							<input type="number" name="tahun_bayar" class="form-control">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">nominal yang di bayar</label>
						<div class="col-sm-12">
							<input type="number" name="nominal" class="form-control">
						</div>
					</div>

			</div>
			<div class="mb-3" style="float: right;">
				<button class="btn btn-primary">Simpan</button>
				<a href="?page=pembayaran" class="btn btn-danger">kembali</a>
			</div>
			</form>
		</div>
	</div>