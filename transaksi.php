<?php
$nisn=$_GET['id'];
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
 <h1 class="h3 mb-3"> Dashboard</h1>

<div class="col-xl 12">
    <div class="w-100">
        <div class="row">
            <?php
            $query = mysqli_query($koneksi,"SELECT*FROM spp ORDER BY tahun");

            while ($data =mysqli_fetch_array($query)) {
                $id = $data['id_spp'];
                $nominal = $data['nominal'];

                $query_transaksi = mysqli_query($koneksi, "SELECT SUM(jumlah_bayar) AS total_bayar FROM pembayaran WHERE id_spp='$id' AND nisn='$nisn'");
                $data_transaksi = mysqli_fetch_array($query_transaksi);
    
                $total = $nominal - $data_transaksi['total_bayar'];
    
                if ($total == 0) {
                    $hasil = "LUNAS";
                } elseif ($total == $nominal) {
                    $hasil = "Belum Membayar";
                } else {
                    $hasil = "Kurang <br> Rp " . number_format($total, 0, ',', '.') . ",00";
                }
    
            
            ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">pembayaran <?= $data['tahun'] ?></h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="book"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">
                            <?php
                           echo $hasil;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
            <?php
           } 
           ?>
        </div>
    </div>
</div>