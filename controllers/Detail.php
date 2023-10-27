<?php

// Hubungkan ke Models
include('../models/Siswa.php');

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $detail = $siswa->getDetailData($id);

    // Kirim data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($detail);
} else {
    echo json_encode(['error' => 'Invalid ID']);
}
