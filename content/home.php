<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    switch ($pesan) {
        case 'berhasil-login':
            if (isset($_SESSION['status'])) {
                if ($_SESSION['status'] == 'login') {
?>
                    <script>
                        Swal.fire({
                            title: 'Selamat Datang, <?= $_SESSION['username']  ?>',
                            text: `Anda Berhasil Login`,
                            icon: 'success',
                            confirmButtonText: 'Oke'
                        })
                    </script>
<?php
                }
            }
            break;

        default:
            # code...
            break;
    }
}
?>


<?php

$query = "SELECT COUNT(*) FROM user";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_row($result);

$total_records = $row[0];

$query2 = "SELECT COUNT(*) FROM user where status = 1";
$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_row($result2);

$total_records2 = $row2[0];

$query3 = "SELECT COUNT(*) FROM user where `status` = '0'";
$result3 = mysqli_query($db, $query3);
$row3 = mysqli_fetch_row($result3);

$total_records3 = $row3[0];

$query4 = "SELECT COUNT(*) FROM user where role = 'siswa'";
$result4 = mysqli_query($db, $query4);
$row4 = mysqli_fetch_row($result4);

$total_records4 = $row4[0];

$query5 = "SELECT COUNT(*) FROM user where role = 'guru'";
$result5 = mysqli_query($db, $query5);
$row5 = mysqli_fetch_row($result5);

$total_records5 = $row5[0];

?>

<br>
<div class="row">
    <div class="col">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Jumlah Semua Akun</div>
            <div class="card-body text-center">
                <h1 class="card-title"><i class="fas fa-users"></i></h1>
                <h2 class="card-text"><?= $total_records ?> </h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Jumlah Akun yang aktif</div>
            <div class="card-body text-center">
                <h1 class="card-title"><i class="fas fa-users"></i></h1>
                <h2 class="card-text"><?= $total_records2 ?> </h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Jumlah Akun yang tidak aktif </div>
            <div class="card-body text-center">
                <h1 class="card-title"><i class="fas fa-users"></i></h1>
                <h2 class="card-text"><?= $total_records3 ?> </h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Jumlah Siswa</div>
            <div class="card-body text-center">
                <h1 class="card-title"><i class="fa-solid fa-graduation-cap"></i></h1>
                <h2 class="card-text"><?= $total_records4 ?> </h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Jumlah Guru</div>
            <div class="card-body text-center">
                <h1 class="card-title"><i class="fas fa-chalkboard-teacher"></i></h1>
                <h2 class="card-text"><?= $total_records5 ?> </h2>
            </div>
        </div>
    </div>

</div>