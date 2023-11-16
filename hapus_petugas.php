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
$query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id'");
if ($query) {
    echo '<script>alert("Data Berhasil Di Hapus");location.href="?page=petugas";</script>';
}else {
    echo '<script>alert("Data Gagal Di Hapus");location.href="?page=petugas";</script>';
}