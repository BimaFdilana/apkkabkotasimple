<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include_once('conf/db_config.php');
include_once('model/kabkota.php');

$database = new Database();
$db = $database->connect();
$kabkota = new KabKota($db);
$data = $kabkota->home();

echo json_encode(['message' => $data, 'data' => null]);
?>
