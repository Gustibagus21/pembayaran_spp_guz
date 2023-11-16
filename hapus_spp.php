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
$query = mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp='$id'");
if ($query) {
    echo '<script>alert("Data Berhasil Di Hapus");location.href="?page=spp"</script>';
}else{
    echo '<script>alert("Data Gagal Di Hapus");location.href="?page=spp"</script>';
}

?>