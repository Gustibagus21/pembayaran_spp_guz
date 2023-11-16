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
$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn='$id'");
if ($query) {
    echo '<script>alert("Data Berhasil Di Hapus");location.href="?page=siswa"</script>';
}else{
    echo '<script>alert("Data Gagal Di Hapus");location.href="?page=siswa"</script>';
}

?>