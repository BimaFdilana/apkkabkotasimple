<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

Header('Access-Control-Allow-Origin:*');
Header('Content-Type:application/json');
Header('Access-Control-Allow-Method: GET');


include_once('conf/db_config.php');
include_once('model/kabkota.php');

$database = new Database;
$db = $database->connect();
$kabkota = new KabKota($db);

if(isset($_GET['id'])){
    $data = $kabkota->readKabKotaById($_GET['id']);
    if($data->rowCount())
    {
        $list_data = [];
        while($row = $data->fetch(PDO::FETCH_OBJ))
        {
            $list_data = [
                'id'=>$row->id,
                'kabupaten_kota'=>$row->kabupaten_kota,
                'pusat_pemerintahan'=>$row->pusat_pemerintahan,
                'bupati_walikota'=>$row->bupati_walikota,
                'tanggal_berdiri'=>$row->tanggal_berdiri,
                'luas_wilayah'=>$row->luas_wilayah,
                'jumlah_penduduk'=>$row->jumlah_penduduk,
                'jumlah_kecamatan'=>$row->jumlah_kecamatan,
                'jumlah_kelurahan'=>$row->jumlah_kelurahan,
                'jumlah_desa'=>$row->jumlah_desa,
                'url_peta_wilayah'=>$row->url_peta_wilayah,
                'deskripsi'=>$row->deskripsi,
                'logo'=>$row->logo
            ];
        }
        echo json_encode(['message' => 'Data kabupaten kota berhasil ditemukan!', 'data' => $list_data]);
    } else {
        echo json_encode(['message' => 'Data kabupaten kota yang dicari tidak ada!', 'data' => null]);
    }
} else{
    $data = $kabkota->readKabKota();
    if($data->rowCount())
{
    $list_data = [];
    while($row = $data->fetch(PDO::FETCH_OBJ))
    {
        $item = array(
            'id' => $row->id,
            'kabupaten_kota' => $row->kabupaten_kota,
            'pusat_pemerintahan' => $row->pusat_pemerintahan,
            'bupati_walikota' => $row->bupati_walikota,
            'tanggal_berdiri' => $row->tanggal_berdiri,
            'luas_wilayah' => $row->luas_wilayah,
            'jumlah_penduduk' => $row->jumlah_penduduk,
            'jumlah_kecamatan' => $row->jumlah_kecamatan,
            'jumlah_kelurahan' => $row->jumlah_kelurahan,
            'jumlah _desa' => $row->jumlah_desa,
            'url_peta_wilayah' => $row->url_peta_wilayah,
            'deskripsi' => $row->deskripsi,
            'logo' => $row->logo
            );
            array_push($list_data, $item);
        }
        echo json_encode(['message' => 'Data kabupaten kota berhasil diambil!', 'data' => $list_data]);
    }else {
        echo json_encode(['message' => 'Data kabupaten kota tidak berhasil diambil!', 'data' => null]);
    }
}
?>


