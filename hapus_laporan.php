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
$query = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
if ($query) {
    echo '<script>alert("Data Berhasil Di Hapus");location.href="?page=laporan";</script>';
}