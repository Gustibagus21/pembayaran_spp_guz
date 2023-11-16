<?php
if (isset($_POST['pembayaran'])) {
    $pembayaran = $_POST['pembayaran'];
}

if (isset($_POST['edit'])) {
    $id_pembayaran = $_POST['id_pembayaran'];
    $_pembayaran = $_POST['id_pembayaran'];
    $jumlah_pembayar = $_POST['jumlah_pembayar'];
    $query = mysqli_query($koneksi, "UPDATE pembayaran SET jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran='$id'");
    if ($query) {
        echo '<script>alert("succes");location.href="?page=laporan";</script>';
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
<h1 class="h3 mb-3"> Laporan</h1>
<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <a <?= ($role == 'siswa' || $role == 'petugas' ? 'hidden' : '') ?> href="cetak_pembayaran.php" target="_blank" class="btn btn-success btn-sm mb-3"><i idata-feather="printer"></i>print</a>
                <table class="table table bordered table-striped table-hover cell-border" id="pembayaran">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Nama Petugas</th>
                            <th>Nominal SPP</th>
                            <th>Tanggal bayar</th>
                            <th>bayar bulan ke</th>
                            <th>bayar Tahun ke</th>
                            <th>Nominal Pembayaran</th>
                            <th <?= ($role == 'siswa' || $role == 'petugas' ? 'hidden' : '') ?>>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $No = 1;
                        if ($role == 'siswa') {
                            $nisn = $_SESSION['user']['nisn'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas INNER JOIN spp on pembayaran.id_spp=spp.id_spp INNER JOIN siswa on pembayaran.nisn=siswa.nisn WHERE pembayaran.nisn='$nisn'");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas INNER JOIN spp on pembayaran.id_spp=spp.id_spp INNER JOIN siswa on pembayaran.nisn=siswa.nisn ");
                        }
                        while ($data = mysqli_fetch_array($query)) {


                        ?>
                            <tr>
                                <td><?php echo $No ?></td>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['nama_petugas'] ?></td>
                                <td><?php echo $data['nominal'] ?></td>
                                <td><?php echo $data['tgl_bayar'] ?></td>
                                <td><?php echo $data['bulan_bayar'] ?></td>
                                <td><?php echo $data['tahun_dibayar'] ?></td>
                                <td><?php echo $data['jumlah_bayar'] ?></td>

                                <td <?= ($role == 'siswa' || $role == 'petugas' ? 'hidden' : '') ?>>

                                    <a href="?page=edit_laporan&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?page=hapus_laporan&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php

                            $No++;
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    let table = new DataTable('#pembayaran');
</script>