<?php
include("../../conf/db_conn.php");

const TARGET_DIR = "../../image/logo/";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_kab_kota WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $kabupaten_kota = $row['kabupaten_kota'];
        $target_file = TARGET_DIR . $row['logo'];

        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $query = "DELETE FROM tb_kab_kota WHERE id = '$id'";
        $deleteResult = mysqli_query($conn, $query);
        if ($deleteResult) {
            echo "<script> alert('Berhasil menghapus data $kabupaten_kota.'); </script>";
        } else {
            echo "<script> alert('Gagal menghapus data $kabupaten_kota, terjadi kesalahan.'); </script>";
        }
    } else {
        echo "<script> alert('Gagal menghapus, data tidak ditemukan.'); </script>";
    }
    echo "<script> window.location = '../../index.php?page=data_kabkota'; </script>";
}
?>
