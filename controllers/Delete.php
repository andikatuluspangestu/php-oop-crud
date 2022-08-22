<?php

// Koneksi ke Database
include('../models/Siswa.php');

// Menampung ID
$id = $_GET['id'];

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection();

// Proses hapus data
$siswa->deleteData($id);