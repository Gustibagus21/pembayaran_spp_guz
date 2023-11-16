<?php
if ($role == 'admin' || $role == 'petugas') {
?>
    <h1 class="h3 mb-3"> Dashboard</h1>

    <div class="col-xl 12">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">pembayaran</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pembayaran");
                                $data = mysqli_fetch_assoc($query);
                                echo $data['total'];
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">petugas</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM petugas");
                                $data = mysqli_fetch_assoc($query);
                                echo $data['total'];
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Jumlah sisawa PeremPuan</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM siswa WHERE jk='Perempuan'");
                                $data = mysqli_fetch_assoc($query);
                                echo $data['total'];
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Jumlah siswa Laki-Laki</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM siswa WHERE jk='laki-laki'");
                                $data = mysqli_fetch_assoc($query);
                                echo $data['total'];
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Status Anda Sebagai</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="activity"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">
                                <?php


                                echo $role;
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <h1 class="h3 mb-3"> Story </h1>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $No = 1;
                            $nisn = $_SESSION['user']['nisn'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas INNER JOIN spp on pembayaran.id_spp=spp.id_spp INNER JOIN siswa on pembayaran.nisn=siswa.nisn WHERE pembayaran.nisn='$nisn'");
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
<?php
}
?>