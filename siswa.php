<?php
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


<h1 class="h3 mb-3">Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <a href="?page=tambah_siswa" class="btn btn-success btn-sm" <?= ($role == 'siswa' || $role == 'petugas' ? 'hidden' : '') ?>>+ Tambah siswa</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover cell-border" id="siswa">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>ALAMAT</th>
                            <th>NO.HP</th>
                            <th>KELAS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $No = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $No ?></td>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['jk'] ?></td>
                                <td><?php echo $data['alamat'] ?></td>
                                <td><?php echo $data['no_telp'] ?></td>
                                <td><?php echo $data['kelas'] ?> - <?php echo ucwords($data['kompetensi_keahlian']) ?></td>
                                <td>
                                    <?php
                                    if ($role == 'admin') {
                                    ?>
                                        <a href="?page=edit_siswa&id=<?php echo $data['nisn']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="?page=hapus_siswa&id=<?php echo $data['nisn']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="?page=transaksi&id=<?php echo $data['nisn']; ?>" class="btn btn-danger btn-sm">Riwayat</a>
                                </td>
                            </tr>
                        <?php
                            $No++;
                        }
                        ?>
                    </tbody>
                </table>
                <script>
                    let table = new DataTable('#siswa');
                </script>
            </div>
        </div>
    </div>
</div>