<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class KabKota {
    public $id;
    public $kabupaten_kota;
    public $pusat_pemerintahan;
    public $bupati_walikota;
    public $tanggal_berdiri;
    public $luas_wilayah;
    public $jumlah_penduduk;
    public $jumlah_kecamatan;
    public $jumlah_kelurahan;
    public $jumlah_desa;
    public $url_peta_wilayah;
    public $deskripsi;
    public $logo;

    private $connection;
    private $table = 'tb_kab_kota';

    public function __construct($db) {
        $this->connection = $db;
    }
    
    public function home()
    {
        return "Selamat Datang di API Kabupaten Kota versi 1.0!";
    }
    
    public function readKabKota()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY tanggal_berdiri DESC';
        $data = $this->connection->prepare($query);
        $data->execute();
        return $data;
    }
    
    public function readKabKotaById($_id)
    {
        $this->id = $_id;
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=?';
        $data = $this->connection->prepare($query);
        $data->bindValue(1, $this->id, PDO::PARAM_INT);
        $data->execute();
        return $data;
    }
    
    public function createKabKota($params)
    {
        try {
            $this->kabupaten_kota = $params['kabupaten_kota'];
            $this->pusat_pemerintahan = $params['pusat_pemerintahan'];
            $this->bupati_walikota = $params['bupati_walikota'];
            $this->tanggal_berdiri = $params['tanggal_berdiri'];
            $this->luas_wilayah = $params['luas_wilayah'];
            $this->jumlah_penduduk = $params['jumlah_penduduk'];
            $this->jumlah_kecamatan = $params['jumlah_kecamatan'];
            $this->jumlah_kelurahan = $params['jumlah_kelurahan'];
            $this->jumlah_desa = $params['jumlah_desa'];
            $this->url_peta_wilayah = $params['url_peta_wilayah'];
            $this->deskripsi = $params['deskripsi'];
            $this->logo = $params['logo'];

            $query = 'INSERT INTO ' . $this->table . ' SET
                kabupaten_kota = :kabupaten_kota,
                pusat_pemerintahan = :pusat_pemerintahan,
                bupati_walikota = :bupati_walikota,
                tanggal_berdiri = :tanggal_berdiri,
                luas_wilayah = :luas_wilayah,
                jumlah_penduduk = :jumlah_penduduk,
                jumlah_kecamatan = :jumlah_kecamatan,
                jumlah_kelurahan = :jumlah_kelurahan,
                jumlah_desa = :jumlah_desa,
                url_peta_wilayah = :url_peta_wilayah,
                deskripsi = :deskripsi,
                logo = :logo';

            $data = $this->connection->prepare($query);
            $data->bindValue(':kabupaten_kota', $this->kabupaten_kota);
            $data->bindValue(':pusat_pemerintahan', $this->pusat_pemerintahan);
            $data->bindValue(':bupati_walikota', $this->bupati_walikota);
            $data->bindValue(':tanggal_berdiri', $this->tanggal_berdiri);
            $data->bindValue(':luas_wilayah', $this->luas_wilayah);
            $data->bindValue(':jumlah_penduduk', $this->jumlah_penduduk);
            $data->bindValue(':jumlah_kecamatan', $this->jumlah_kecamatan);
            $data->bindValue(':jumlah_kelurahan', $this->jumlah_kelurahan);
            $data->bindValue(':jumlah_desa', $this->jumlah_desa);
            $data->bindValue(':url_peta_wilayah', $this->url_peta_wilayah);
            $data->bindValue(':deskripsi', $this->deskripsi);
            $data->bindValue(':logo', $this->logo);

            if ($data->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateKabKotaById($params)
    {
        try {
            $this->id = $params['id'];
            $this->kabupaten_kota = $params['kabupaten_kota'];
            $this->pusat_pemerintahan = $params['pusat_pemerintahan'];
            $this->bupati_walikota = $params['bupati_walikota'];
            $this->tanggal_berdiri = $params['tanggal_berdiri'];
            $this->luas_wilayah = $params['luas_wilayah'];
            $this->jumlah_penduduk = $params['jumlah_penduduk'];
            $this->jumlah_kecamatan = $params['jumlah_kecamatan'];
            $this->jumlah_kelurahan = $params['jumlah_kelurahan'];
            $this->jumlah_desa = $params['jumlah_desa'];
            $this->url_peta_wilayah = $params['url_peta_wilayah'];
            $this->deskripsi = $params['deskripsi'];

            $query = 'UPDATE ' . $this->table . ' SET
                kabupaten_kota = :kabupaten_kota,
                pusat_pemerintahan = :pusat_pemerintahan,
                bupati_walikota = :bupati_walikota,
                tanggal_berdiri = :tanggal_berdiri,
                luas_wilayah = :luas_wilayah,
                jumlah_penduduk = :jumlah_penduduk,
                jumlah_kecamatan = :jumlah_kecamatan,
                jumlah_kelurahan = :jumlah_kelurahan,
                jumlah_desa = :jumlah_desa,
                url_peta_wilayah = :url_peta_wilayah,
                deskripsi = :deskripsi
                WHERE id = :id';

            $data = $this->connection->prepare($query);
            $data->bindValue(':id', $this->id);
            $data->bindValue(':kabupaten_kota', $this->kabupaten_kota);
            $data->bindValue(':pusat_pemerintahan', $this->pusat_pemerintahan);
            $data->bindValue(':bupati_walikota', $this->bupati_walikota);
            $data->bindValue(':tanggal_berdiri', $this->tanggal_berdiri);
            $data->bindValue(':luas_wilayah', $this->luas_wilayah);
            $data->bindValue(':jumlah_penduduk', $this->jumlah_penduduk);
            $data->bindValue(':jumlah_kecamatan', $this->jumlah_kecamatan);
            $data->bindValue(':jumlah_kelurahan', $this->jumlah_kelurahan);
            $data->bindValue(':jumlah_desa', $this->jumlah_desa);
            $data->bindValue(':url_peta_wilayah', $this->url_peta_wilayah);
            $data->bindValue(':deskripsi', $this->deskripsi);

            if ($data->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteKabKota($id) {
        try {
            $this->id = $id;
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            $data = $this->connection->prepare($query);
            $data->bindValue(':id', $this->id);
            if ($data->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
