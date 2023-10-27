<?php

// Hubungkan ke Models
include('../models/Siswa.php');

// Instansiasi
$siswa = new Siswa();
$siswa->getConnection();
$hasil = $siswa->tampilData();

// Pesan
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    echo "<script>var pesan = '{$pesan}';</script>";
} else if (isset($_GET['pesan_error'])) {
    $pesan_error = $_GET['pesan_error'];
    echo "<script>var pesan_error = '{$pesan_error}';</script>";
} else if (isset($_GET['pesan_hapus'])) {
    $pesan_hapus = $_GET['pesan_hapus'];
    echo "<script>var pesan_hapus = '{$pesan_hapus}';</script>";
}

// Mengambil data detail berdasarkan id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $detail = $siswa->getDetailData($id);
}

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
                <table class="table table-hover table-striped nowrap" id="myTable" style="width:100%">
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
                                    <button type="button" class="btn btn-sm btn-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="<?php echo $row['id_siswa']; ?>">Detail</button>
                                    <a href="../views/v_edit.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="../controllers/Delete.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Detail Data -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="detailModal">
                            Detail Data
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include('partials/footer.php'); ?>

</body>

</html>