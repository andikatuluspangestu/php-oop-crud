<?php

// Koneksi ke Database
include('../models/Siswa.php');

// Menampung Form
$nisn   = $_POST['nisn'];
$nama   = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection();

// Query insert data
$siswa->tambahData($nisn, $nama, $alamat);

// kembalikan ke halaman utama dan krimkan pesan sukses melalui flashdata



