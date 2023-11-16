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
if (isset($_POST['simpan'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $no_telp = $_POST['no_telp'];
    $password = md5($_POST['password']);

    if (empty($_POST['password'])) {
        $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama='$nama',id_kelas='$kelas',alamat='$alamat',jk='$jk',no_telp='$no_telp' WHERE nisn='$nisn'");

        if ($query) {
            echo '<script>alert("Data berhasil di Update");location.href="?page=siswa";</script>';
        } else {
            echo '<script>alert("Data Gagal di Update");location.href="?page=siswa";</script>';
        }
    } else {
        $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama='$nama',id_kelas='$kelas',alamat='$alamat',jk='$jk',no_telp='$no_telp',password='$password' WHERE nisn='$nisn'");

        if ($query) {
            echo '<script>alert("Data berhasil di Update");location.href="?page=siswa";</script>';
        } else {
            echo '<script>alert("Data Gagal di Update");location.href="?page=siswa";</script>';
        }
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$id'");
$data = mysqli_fetch_array($query);

?>


<h1 class="h3 mb-3">Edit Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <div class="col-sm-12">
                            <input type="number" name="nisn" class="form-control" value="<?php echo $data['nisn'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <div class="col-sm-12">
                            <input type="number" name="nis" class="form-control" required value="<?php echo $data['nis'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama" class="form-control" required value="<?php echo $data['nama'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" name="alamat" class="form-control" required value="<?php echo $data['alamat'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. HP</label>
                        <div class="col-sm-12">
                            <input type="number" name="no_telp" class="form-control" required value="<?php echo $data['no_telp'] ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="col-sm-12">
                            <input type="number" name="password" class="form-control mb-3">
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jk" class="form-select">
                            <option value="Laki-Laki" <?php if ($data['jk'] == 'Laki-Laki') {
                                                            echo 'selected';
                                                        } ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <div class="col-sm-12">
                            <select name="kelas" class="form-select">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM kelas ");
                                while ($kelas = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $kelas['id_kelas'] ?>" <?php if ($data['kelas'] == $kelas['kelas']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $kelas['kelas'] ?> - <?php echo $kelas['kompetensi_keahlian'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3" style="float: right" ;>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        <a href="?page=siswa" class="btn btn-danger">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>