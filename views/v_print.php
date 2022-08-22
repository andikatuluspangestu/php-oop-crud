<?php

// Hubungkan ke Models
include('../models/Siswa.php');

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection(); // Hubungkan ke Database
$hasil = $siswa->tampilData() // Tampilkan Data

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Siswa</title>
    <style>
        table {
            text-align: center;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <h4>Data Siswa</h4>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php

            // Buat variable No untuk urutan data
            $no_urut = 1;

            // Lakukan perulangan while untuk menampilkan data
            while ($row = mysqli_fetch_array($hasil)) :

            ?>
                <tr>
                    <td><?= $no_urut++; ?></td>
                    <td><?= $row['nisn']; ?></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                </tr>

            <?php endwhile; ?>

        </tbody>
    </table>

    <br>
    <span><i>Dicetak pada <?= date('D, d-m-Y'); ?></i></span>

    <script>
        window.print();
    </script>

</body>

</html>