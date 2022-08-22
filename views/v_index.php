<?php

// Hubungkan ke Models
include('../models/Siswa.php');

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection(); // Hubungkan ke Database
$hasil = $siswa->tampilData() // Tampilkan Data

?>
<?php require('partials/header.php'); ?>
<body>
    <nav>
        <?php require('partials/sidebar.php'); ?>
    </nav>
    <main>
        <div class="container">
            <div class="card mt-5 p-3">
                <table>
                    <tr>
                        <td>
                            <a href="../views/v_add.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle">&nbsp;</i>Tambah Data</a>
                            <a href="../views/v_print.php" target="_blank" class="btn btn-secondary btn-sm"><i class="bi bi-printer">&nbsp;</i>Cetak Data</a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card mt-4 mb-5 p-4 table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Action</th>
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
                                <td class="text-start">
                                    <a href="../views/v_edit.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="../controllers/Delete.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include('partials/footer.php'); ?>

</body>

</html>