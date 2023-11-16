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
if (isset($_POST{'kelas'})) {
    $kelas=$_POST['kelas'];
    $keahlian=$_POST['keahlian'];

    $query=mysqli_query($koneksi, "INSERT INTO kelas (kelas,kompetensi_keahlian) VALUES ('$kelas','$keahlian')");
    
    if ($query) {
        echo '<script>alert("Tambah Data Berhasil");location.href="?page=kelas";</script>';
    }else {
		echo '<script>alert("Tambah Data Gagal");location.href="?page=kelas";</script>';
	}
}
?>

<h1 class="h3 mb-3"> Tambah Kelas</h1>
					<div class="row">
						<div class="col-12">
							<div class="card flex-fill">
						    	<div class="card-body">
								    <form action="" method="post">
                                    <div class="mb-3">
									    <label class="form-label">Nama Kelas</label>
									        <div class="col-sm-12">
										        <select name="kelas" class="form-select" required>
													<option value="" hidden></option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
									        </div>
								    </div>
								    <div class="mb-3">
									    <label class="form-label">Kompetensi Keahlian</label>
									        <div class="col-sm-12">
										        <input type="text" name="keahlian" class="form-control mb-3" required>
									        </div>
								    </div>
							        <div class="mb-3" style="float: right;">
								        <button class="btn btn-primary">Simpan</button>
								        <button type="reset" class="btn btn-danger">Reset</button>
							        </div>
						        </div>
                                    </form>
                            </div>
					    </div>
                    </div>