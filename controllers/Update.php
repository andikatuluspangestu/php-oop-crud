<?php

// Koneksi ke Database
include('../models/Siswa.php');

// Tampung data yang telah diedit
$id     = $_POST['id_siswa'];
$nisn   = $_POST['nisn'];
$nama   = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection();

// Query insert data
$siswa->updateData($id, $nisn, $nama, $alamat);

?>