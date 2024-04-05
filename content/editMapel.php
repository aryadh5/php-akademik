<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM matapelajaran WHERE id = '$id'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $sql2 = "SELECT * FROM matapelajaran WHERE id = '$id'";
    $query2 = mysqli_query($db, $sql2);
    $data2 = mysqli_fetch_assoc($query2);
}


?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
            </div>
            <form action="query/updateMapel.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="kelas">
                                    <option selected value="<?= $data['kelas']; ?>"><?= $data['kelas'];?></option>
                                    <option value="vii">VII</option>
                                    <option value="viii">VIII</option>
                                    <option value="ix">IX</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_mapel" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?= $data['nama_mapel']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <select class="form-select" aria-label="Default select example" name="hari">
                                    <option selected value="<?= $data['hari']; ?>"><?= $data['hari']; ?></option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <select class="form-select" aria-label="Default select example" name="waktu">
                                    <option selected value="<?= $data['waktu']; ?>"><?= $data['waktu']; ?></option>
                                    <option value="08.00 - 10.00">08.00 - 10.00</option>
                                    <option value="10.00 - 11.30">10.00 - 11.30</option>
                                    <option value="12.45 - 14.00">12.45 - 14.00</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <button type="button" class="btn btn-secondary" onclick="goBack()"><i class=" fas fa-angle-left"></i> Kembali</button>
                    <a onclick="return confirm('Are you sure?')" href="index.php?page=hapus-mapel&id=<?= $id; ?>" class='btn btn-danger'><i class='fas fa-trash'></i> Hapus</a>
                    <button type="submit" class="btn btn-primary" name="edit"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>