<?php

require_once('../controllers/Database.php');

class Siswa extends Database{

    public function tampilData(){
        $query = mysqli_query($this->conn, "SELECT * FROM siswa");
        return $query;
    }

    public function tambahData($nisn,$nama,$alamat){
        $query = "INSERT INTO siswa (nisn, nama_lengkap, alamat) VALUES ('$nisn','$nama','$alamat')";
        $proses = mysqli_query($this->conn, $query);
        if ($proses) {
            header("Location: ../views/v_index.php");
        } else {
            echo "Data tidak berhasil ditambahkan";
        }
    }

    public function pilihData($id){
        $query = "SELECT * FROM siswa WHERE id_siswa = $id LIMIT 1";
        $proses = mysqli_query($this->conn, $query);
        return $proses->fetch_array();
    }

    public function updateData($id, $nisn, $nama, $alamat){
        $query = "UPDATE siswa SET nisn = '$nisn', nama_lengkap = '$nama', alamat = '$alamat' WHERE id_siswa = '$id'";
        $proses = mysqli_query($this->conn, $query);

        if ($proses) {
            header("Location: ../views/v_index.php");
        } else {
            echo "Data tidak berhasil diubah";
        }
    }

    public function deleteData($id){
        $query = "DELETE FROM siswa WHERE id_siswa = '$id'";
        $proses = mysqli_query($this->conn, $query);

        if ($proses) {
            header("Location: ../views/v_index.php");
        } else {
            echo "Data tidak berhasil dihapus";
        }
    }

}

?>