<?php
include 'koneksi.php';
?>
<?php
if (empty($_SESSION['user']['nama_petugas'])) {
    $role = 'siswa';
} elseif ($_SESSION['user']['level'] == 'admin') {
    $role = 'admin';
} else {
    $role = 'petugas';
}

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

<script>
    window.print();
</script>

<table border="1" width="100%" cellpading="5" cellspacing="0">
    <tr>
        <th colspan="9">Data Siswa</th>
    </tr>
    <tr>
        <th>Nomor</th>
        <th>Nama Siswa</th>
        <th>Nama Petugas</th>
        <th>Nominal SPP</th>
        <th>Tanggal Bayar</th>
        <th>Nominal Pembayaran</th>

    </tr>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas INNER JOIN spp on pembayaran.id_spp=spp.id_spp INNER JOIN siswa on pembayaran.nisn=siswa.nisn ");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['nama_petugas'] ?></td>
                <td><?php echo $data['nominal'] ?></td>
                <td><?php echo $data['tgl_bayar'] ?></td>
                <td><?php echo $data['jumlah_bayar'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>