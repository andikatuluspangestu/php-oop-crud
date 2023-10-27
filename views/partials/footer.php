<footer>

    <script src="../assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Javascript Datatables -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                pagingType: 'simple_numbers',
                language: {
                    paginate: {
                        next: '<i class="bi bi-chevron-right"></i>',
                        previous: '<i class="bi bi-chevron-left"></i>'
                    }
                },
                responsive: true,
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>

    <!-- SweetAlert2 -->
    <script>
        if (typeof pesan !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil disimpan',
            })
        } else if (typeof pesan_error !== 'undefined') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data gagal disimpan',
            })
        } else if (typeof pesan_hapus !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil dihapus',
            })
        }

        window.history.pushState({}, document.title, "/" + "crud-php-oop/views/v_index.php");
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var detailButtons = document.querySelectorAll('.btn-detail');

            detailButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var modalBody = document.querySelector('#detailModal .modal-body');

                    // Kirim request AJAX untuk mendapatkan data detail siswa
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', '../controllers/Detail.php?id=' + id, true);

                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 400) {
                            var data = JSON.parse(xhr.responseText);

                            // Menampilkan data detail dalam modal
                            modalBody.innerHTML = `
                            <table class="table">
                                <tr>
                                    <th>ID Siswa</th>
                                    <td>${data.id_siswa}</td>
                                </tr>
                                <tr>
                                    <th>NISN</th>
                                    <td>${data.nisn}</td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>${data.nama_lengkap}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>${data.alamat}</td>
                                </tr>
                            </table>
                        `;
                        }
                    };

                    xhr.send();
                });
            });
        });
    </script>


</footer>