<br>
<div class="row">
    <div class="col">
        <center>
            <div class="card w-50 shadow ">
                <div class="card-header">
                    <h3 class="text-center">Tambah Jadwal</h3>

                </div>
                <div class="card-body">
                    <form action="query/tambahMapelQuery.php" method="post">
                        <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="kelas" id="kelas" required>
                                    <option value="vii">VII</option>
                                    <option value="viii">VIII</option>
                                    <option value="ix">IX</option>
                                </select>
                        </div>
                        <div class="mb-3">
                                <label for="nama_mapel" class="form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="contoh: Bahasa Inggris" required>
                        </div>
                        <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <select class="form-select" aria-label="Default select example" id="hari" name="hari" required>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                </select>
                        </div>
                        <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <select class="form-select" aria-label="Default select example" id="waktu" name="waktu" required>
                                    <option></option>
                                    <option value="08.00 - 10.00">08.00 - 10.00</option>
                                    <option value="10.00 - 11.30">10.00 - 11.30</option>
                                    <option value="12.45 - 14.00">12.45 - 14.00</option>
                                </select>
                        </div>
                        <div class="row">
                            <div class="col">

                                <button class="w-100 btn  btn-outline-secondary" type="button" onclick="goBack()"><i class=" fas fa-angle-left"></i> Kembali </button>

                            </div>
                            <div class="col">
                                <button class="w-100 btn  btn-outline-primary" type="submit"><i class="fas fa-plus"></i> Tambah </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            
        </center>

    </div>
</div>
<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    switch ($pesan) {
        case 'tambah-berhasil':
        ?>
            <script>
                Swal.fire({
                    title: 'Sukses!!',
                    text: `Data Berhasil Ditambah!!`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                })
            </script>
       <?php
            break;
        case 'tambah-gagal':
        ?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `Data Gagal Ditambah!!`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'jadwal-bentrok':
        ?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `Jadwal tidak tersedia!! (FULL)`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
<?php
            break;


        default:
            # code...
            break;
    }
}


?>