<?php
include ("conf/db_conn.php");
$id = $_GET['id'];
$query = "SELECT * FROM tb_kab_kota WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
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
            <div class="col-md-8">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="tambahData" method="post" action="proses/kabkota/proses_ubah_kabkota.php" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $row['id']; ?>" name="id">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kabupaten_kota">Kabupaten/Kota</label>
                                <input type="text" name="kabupaten_kota" class="form-control" id="kabupaten_kota" placeholder="Masukan nama Kabupaten/Kota baru..." value="<?= $row['kabupaten_kota']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pusat_pemerintahan">Pusat Pemerintahan</label>
                                <input type="text" name="pusat_pemerintahan" class="form-control" id="pusat_pemerintahan" placeholder="Masukan nama pusat pemerintahan..." value="<?= $row['pusat_pemerintahan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="bupati_walikota">Kepala Daerah</label>
                                <input type="text" name="bupati_walikota" class="form-control" id="bupati_walikota" placeholder="Masukan nama kepala daerah..." value="<?= $row['bupati_walikota']; ?>">
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Berdiri</label>
                                <div class="input-group date" id="tanggal_berdiri" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_berdiri" id="tanggal_berdiri" name="tanggal_berdiri" value="<?= $row['tanggal_berdiri']; ?>">
                                    <div class="input-group-append" data-target="#tanggal_berdiri" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="luas_wilayah">Luas Wilayah (m2)</label>
                                <input type="number" name="luas_wilayah" class="form-control" id="luas_wilayah" placeholder="Masukan luas wilayah..." value="<?= $row['luas_wilayah']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_penduduk">Jumlah Penduduk (jiwa)</label>
                                <input type="number" name="jumlah_penduduk" class="form-control" id="jumlah_penduduk" placeholder="Masukan jumlah penduduk..." value="<?= $row['jumlah_penduduk']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kecamatan">Jumlah Kecamatan</label>
                                <input type="number" name="jumlah_kecamatan" class="form-control" id="jumlah_kecamatan" placeholder="Masukan jumlah kecamatan..." value="<?= $row['jumlah_kecamatan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kelurahan">Jumlah Kelurahan</label>
                                <input type="number" name="jumlah_kelurahan" class="form-control" id="jumlah_kelurahan" placeholder="Masukan jumlah kelurahan..." value="<?= $row['jumlah_kelurahan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_desa">Jumlah Desa</label>
                                <input type="number" name="jumlah_desa" class="form-control" id="jumlah_desa" placeholder="Masukan jumlah desa..." value="<?= $row['jumlah_desa']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="url_peta_wilayah">Link URL Peta Wilayah</label>
                                <input type="text" name="url_peta_wilayah" class="form-control" id="url_peta_wilayah" placeholder="Masukan url peta wilayah..." value="<?= $row['url_peta_wilayah']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Singkat</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control"><?= $row['deskripsi']; ?></textarea>
                            </div>
                            <input type="hidden" value="<?= $row['logo']; ?>" name="logo_lama">
                            <div class="form-group">
                                <label for="logo">Masukan Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo" disabled>
                                    <label class="custom-file-label" for="logo"><?= $row['logo']; ?></label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="ubah_logo" class="custom-control-input" id="ubah_logo" onchange="disableLogo(this)">
                                    <label class="custom-control-label" for="ubah_logo">Ubah Logo</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!--/.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
