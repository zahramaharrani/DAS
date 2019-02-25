<?php

include "../koneksi.php";


$mhs = $_GET['mhs'] ?? '';

$wh = "";
$wh .= !empty($mhs) ?"id_mahasiswa = '{$mhs}' and " : "";
$wh = !empty($wh) ? "where ".substr($wh, 0, -4) : "";


$view = $mysqli->query("SELECT * FROM riwayat {$wh}");
$row = $view->fetch_all(MYSQLI_ASSOC);


header('Content-type: application/json');
echo json_encode([
  'data' => $row
]);

?>