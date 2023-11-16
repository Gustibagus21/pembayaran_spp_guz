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

<h1 class="h3 mb-3">Petugas</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <a href="?page=tambah_petugas" class="btn btn-success btn-sm"<?= ($role == 'petugas' ? 'hidden' : '') ?>>+ Tambah Petugas</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover cell-border" id="petugas">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $No=1;
                                           $query = mysqli_query($koneksi, "SELECT * FROM petugas ");
                                           while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                             <tr>
                                                <td><?php echo $No ?></td>
                                                <td><?php echo $data['nama_petugas'] ?></td>
                                                <td><?php echo $data['username'] ?></td>
                                                <td><?php echo $data['level'] ?></td>
                                              
                                                <td> 
                                                    <a href="?page=edit_petugas&id=<?php echo $data['id_petugas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="?page=hapus_petugas&id=<?php echo $data['id_petugas']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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
                         let table = new DataTable('#petugas');
                    </script>