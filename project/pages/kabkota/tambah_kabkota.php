<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Kelola Data <i class="fas fa-angle-right"></i> Kabupaten/Kota</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div><!-- /.card-header -->
                    <!-- form start -->
                    <form id="tambahData" method="post" action="proses/kabkota/proses_tambah_kabkota.php" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kabupaten_kota">Kabupaten/Kota</label>
                                <input type="text" name="kabupaten_kota" class="form-control" id="kabupaten_kota" placeholder="Masukkan nama Kabupaten/Kota baru...">
                            </div>
                            <div class="form-group">
                                <label for="pusat_pemerintahan">Pusat Pemerintahan</label>
                                <input type="text" name="pusat_pemerintahan" class="form-control" id="pusat_pemerintahan" placeholder="Masukkan nama pusat pemerintahan...">
                            </div>
                            <div class="form-group">
                                <label for="bupati_walikota">Kepala Daerah</label>
                                <input type="text" name="bupati_walikota" class="form-control" id="bupati_walikota" placeholder="Masukkan nama kepala daerah....">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_berdiri">Tanggal Berdiri</label>
                                <div class="input-group date" id="tanggal_berdiri" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_berdiri" id="tanggal_berdiri" name="tanggal_berdiri"/>
                                    <div class="input-group-append" data-target="#tanggal_berdiri" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="luas_wilayah">Luas Wilayah (m²)</label>
                                <input type="number" name="luas_wilayah" class="form-control" id="luas_wilayah" placeholder="Masukkan luas wilayah....">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_penduduk">Jumlah Penduduk (jiwa)</label>
                                <input type="number" name="jumlah_penduduk" class="form-control" id="jumlah_penduduk" placeholder="Masukkan jumlah penduduk...">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kecamatan">Jumlah Kecamatan</label>
                                <input type="number" name="jumlah_kecamatan" class="form-control" id="jumlah_kecamatan" placeholder="Masukkan jumlah kecamatan....">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kelurahan">Jumlah Kelurahan</label>
                                <input type="number" name="jumlah_kelurahan" class="form-control" id="jumlah_kelurahan" placeholder="Masukkan jumlah kelurahan..." value="0">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_desa">Jumlah Desa</label>
                                <input type="number" name="jumlah_desa" class="form-control" id="jumlah_desa" placeholder="Masukkan jumlah desa..." value="0">
                            </div>
                            <div class="form-group">
                                <label for="url_peta_wilayah">Link URL Peta Wilayah</label>
                                <input type="url" name="url_peta_wilayah" class="form-control" id="url_peta_wilayah" placeholder="Masukkan URL peta wilayah...">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Singkat</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi singkat mengenai Kabupaten/Kota..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="logo">Masukkan Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo">
                                    <label class="custom-file-label" for="logo">Pilih file...</label>
                                </div>
                            </div>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->
