<?php

include('../models/Siswa.php');
$siswa = new Siswa();
$siswa->getConnection();
$id = $_GET['id'];

// Pengkondisian - Cek ID NULL
if ($id) {
    $data = $siswa->pilihData($id);
} else {
    header("Location: ../views/v_index.php");
}

?>
<?php require('partials/header.php'); ?>

<body>

    <nav>
        <?php require('partials/sidebar.php'); ?>
    </nav>

    <main>
        <div class="container">
            <div class="card mt-5 p-4">
                <div class="card-header">
                    <h5 class="float-start">Edit Data Siswa</h5>
                    <a href="../views/v_index.php" class="btn btn-sm btn-primary float-end">
                        <i class="bi bi-arrow-left-circle">&nbsp;</i>
                        Kembali
                    </a>
                </div>
                <form action="../controllers/Update.php" method="post">
                    <div class="mb-3">
                        <input type="number" value="<?= $data['id_siswa']; ?>" name="id_siswa" class="form-control" id="id_siswa" placeholder="328xxx" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input value="<?= $data['nisn']; ?>" type="number" name="nisn" class="form-control" id="nisn" placeholder="328xxx">
                    </div>
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <input value="<?= $data['nama_lengkap']; ?>" type="text" name="nama_lengkap" class="form-control" id="namaLengkap" placeholder="Masukan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input value="<?= $data['alamat']; ?>" type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat lengkap">
                    </div>
                    <div class="mb-3">
                        <button name="submit" type="submit" class="btn btn-sm btn-primary">
                            <i class="bi bi-send">&nbsp;</i>Submit
                        </button>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Javascript Vendor Assets -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>