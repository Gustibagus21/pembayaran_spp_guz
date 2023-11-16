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
<h1 class="h3 mb-3">SPP</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <a href="?page=tambah_spp" class="btn btn-success btn-sm"<?= ($role == 'siswa' ? 'hidden' : '') ?>>+ Tambah SPP</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover cell-border" id="spp">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Nominal</th>
                                                <th <?= ($role == 'siswa' ? 'hidden' : '') ?>>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $No=1;
                                           $query = mysqli_query($koneksi, "SELECT * FROM spp ");
                                           while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                             <tr>
                                                <td><?php echo $No ?></td>
                                                <td><?php echo $data['tahun'] ?></td>
                                                <td><?php echo $data['nominal'] ?></td>
                                                <td <?= ($role == 'siswa' ? 'hidden' : '') ?>>
                                                    <a href="?page=edit_spp&id=<?php echo $data['id_spp']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="?page=hapus_spp&id=<?php echo $data['id_spp']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                           $No++;
                                           }
                                           ?>
                                        </tbody>
                                    </table>
                                    <script>
                                       let table = new DataTable('#spp');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                  