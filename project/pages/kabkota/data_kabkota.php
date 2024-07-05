<?php 
require("conf/db_conn.php"); // Memastikan file hanya dimasukkan sekali
$query = "SELECT * FROM tb_kab_kota";
$daftar_kab_kota = mysqli_query($conn, $query);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Kelola Data <i class="fas fa-angle-right"></i> Kabupaten/Kota</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kabupaten/Kota</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="index.php?page=tambah_kabkota" type="button" class="btn btn-primary mb-3">
                            <i class="fa fa-plus"></i>&nbsp;&nbsp; Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table id="kabkota" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Pusat Pemerintahan</th>
                                        <th>Kepala Daerah</th>
                                        <th>Tanggal Berdiri</th>
                                        <th style="text-align: center;">Logo</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($daftar_kab_kota as $row): ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no = $no + 1; ?></td>
                                            <td><?= $row["kabupaten_kota"]; ?></td>
                                            <td><?= $row["pusat_pemerintahan"]; ?></td>
                                            <td><?= $row["bupati_walikota"]; ?></td>
                                            <td><?= $row["tanggal_berdiri"]; ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                $logo = $row["logo"];
                                                if ($logo == null) {
                                                    echo "<img src='image/logo/logo_default.png' style='width: 80px;'/>";
                                                } else {
                                                    echo "<img src='image/logo/$logo' style='width: 80px;'/>";
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: center; white-space:nowrap;">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-<?= $row["id"]; ?>"><i class="fas fa-eye"></i></button>
                                                <a href="index.php?page=ubah_kabkota&id=<?=$row['id'];?>" class="btn btn-success btn-sm" role="button" title="Ubah Data"><i class="fas fa-edit"></i></a>
                                                <a href="proses/kabkota/proses_hapus_kabkota.php?id=<?=$row['id'];?>" class="btn btn-danger btn-sm" role="button" title="Hapus Data" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-<?= $row["id"]; ?>">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail Data <?= $row["kabupaten_kota"]; ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12 mb-2 text-center">
                                                                    <?php
                                                                    $peta_wilayah = $row["url_peta_wilayah"];
                                                                    if ($peta_wilayah == null) {
                                                                        echo "<img src='image/peta/Indonesia.svg' style='width: 400px;'/>";
                                                                    } else {
                                                                        echo "<img src='$peta_wilayah' style='width: 400px;'/>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-sm-5 col-6">Pusat Pemerintahan</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["pusat_pemerintahan"]; ?></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Kepala Daerah</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["bupati_walikota"]; ?></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Tanggal Berdiri</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["tanggal_berdiri"]; ?></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Luas Wilayah</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["luas_wilayah"]; ?> m²</div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Jumlah Penduduk</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["jumlah_penduduk"]; ?> jiwa</div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Jumlah Kecamatan</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["jumlah_kecamatan"]; ?></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Jumlah Kelurahan</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["jumlah_kelurahan"]; ?></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Jumlah Desa</div>
                                                                <div class="col-sm-5 col-6">: <?= $row["jumlah_desa"]; ?></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6">Link URL Logo</div>
                                                                <div class="col-6 col-sm-6">: <a href="image/logo/<?= $row["logo"]; ?>"><?= $row["kabupaten_kota"]; ?></a></div>
                                                                <div class="w-100 d-none d-md-block"></div>
                                                                <div class="col-sm-5 col-6"><u>Deskripsi Singkat</u></div>
                                                                <div class="col-10"><?= $row["deskripsi"]; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-body -->
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
