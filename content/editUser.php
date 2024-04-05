<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM datapribadi WHERE user_id = '$id'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $sql2 = "SELECT * FROM user WHERE id = '$id'";
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
            <form action="query/updateUser.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="asset/img/<?= $data['gambar']; ?>" alt="" width="80%">
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="Nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="Nama" name="nama" value="<?= $data['nama']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="jk">
                                    <option selected value="<?= $data['jk']; ?>"><?= $data['jk']; ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="noHp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="noHp" name="noHp" value="<?= $data['noHp']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">status</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected value="<?= $data2['status']; ?>">
                                        <?php
                                        if ($data2['status'] == '1') {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Ubah Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $id; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <button type="button" class="btn btn-secondary" onclick="goBack()"><i class=" fas fa-angle-left"></i> Kembali</button>
                    <a onclick="return confirm('Are you sure?')" href="index.php?page=hapus-user&id=<?= $id; ?>" class='btn btn-danger'><i class='fas fa-trash'></i> Hapus</a>
                    <button type="submit" class="btn btn-primary" name="edit"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>