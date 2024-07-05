<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');

include_once 'conf/db_config.php';
include_once 'model/kabkota.php';

$database = new Database();
$db = $database->connect();
$kabkota = new KabKota($db);

const TARGET_DIR = "../image/logo/";
const ALLOWED_EXT = array('png', 'jpg', 'jpeg', 'gif');
const MAX_FILE_SIZE = 512000;

function checkImage($image, $remove_image) {
    $filename = $_FILES[$image]['name'];
    $ukuran = $_FILES[$image]['size'];
    $tmp_file = $_FILES[$image]['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $target_file = TARGET_DIR . basename($filename);

    if ($_FILES[$image]['error'] !== UPLOAD_ERR_OK) {
        return "Tidak ada file yang diupload atau error!";
    }

    $image_size = getimagesize($tmp_file);
    if (!$image_size) {
        return "File yang diupload bukan image!";
    }

    if (file_exists($target_file)) {
        return "File yang diupload sudah ada, silahkan ganti nama file!";
    }

    if ($ukuran > MAX_FILE_SIZE) {
        return "File yang diupload melebihi 512kb!";
    }

    if (!in_array($ext, ALLOWED_EXT)) {
        return "Ekstensi file yang diupload tidak diperbolehkan (upload hanya .png, .jpg, .jpeg, .gif)!";
    }

    if (move_uploaded_file($tmp_file, $target_file)) {
        $remove_file = TARGET_DIR . $remove_image;
        if (file_exists($remove_file)) {
            unlink($remove_file);
        }
        return "OK";
    } else {
        return "Gagal mengupload file! $target_file";
    }
}

if (count($_POST) && isset($_POST['logo'])) {
    $remove_image = $_POST['logo'];
    $file_image = 'image';
    $result = checkImage($file_image, $remove_image);

    if ($result != "OK") {
        echo json_encode(['message' => $result, 'data' => null]);
    } else {
        $params = [
            'id' => $_POST['id'],
            'kabupaten_kota' => $_POST['kabupaten_kota'],
            'pusat_pemerintahan' => $_POST['pusat_pemerintahan'],
            'bupati_walikota' => $_POST['bupati_walikota'],
            'tanggal_berdiri' => $_POST['tanggal_berdiri'],
            'luas_wilayah' => $_POST['luas_wilayah'],
            'jumlah_penduduk' => $_POST['jumlah_penduduk'],
            'jumlah_kecamatan' => $_POST['jumlah_kecamatan'],
            'jumlah_kelurahan' => $_POST['jumlah_kelurahan'],
            'jumlah_desa' => $_POST['jumlah_desa'],
            'url_peta_wilayah' => $_POST['url_peta_wilayah'],
            'deskripsi' => $_POST['deskripsi'],
            'logo' => $_FILES[$file_image]['name']
        ];

        if ($kabkota->updateKabKota($params)) {
            echo json_encode(['message' => 'Data kabupaten/kota berhasil diupdate!', 'data' => $params]);
        }
    }
} else {
    $params = [
        'id' => $_POST['id'],
        'kabupaten_kota' => $_POST['kabupaten_kota'],
        'pusat_pemerintahan' => $_POST['pusat_pemerintahan'],
        'bupati_walikota' => $_POST['bupati_walikota'],
        'tanggal_berdiri' => $_POST['tanggal_berdiri'],
        'luas_wilayah' => $_POST['luas_wilayah'],
        'jumlah_penduduk' => $_POST['jumlah_penduduk'],
        'jumlah_kecamatan' => $_POST['jumlah_kecamatan'],
        'jumlah_kelurahan' => $_POST['jumlah_kelurahan'],
        'jumlah_desa' => $_POST['jumlah_desa'],
        'url_peta_wilayah' => $_POST['url_peta_wilayah'],
        'deskripsi' => $_POST['deskripsi']
    ];

    if ($kabkota->updateKabKotaById($params)) {
        echo json_encode(['message' => 'Data kabupaten/kota berhasil diupdate!', 'data' => $params]);
    }
}
?>
