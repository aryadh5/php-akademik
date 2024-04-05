

<?php


require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';

$sql = "SELECT * FROM datapribadi INNER JOIN user ON datapribadi.user_id = user.id ";
$query = mysqli_query($db, $sql);

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Daftar Siswa</title>
<link rel="stylesheet" href="asset/css/mpdf.css">    
</head>

<body>

    <h1 class="text-center">Hasil Daftar Semua User</h1>
    <br>
    <table class="table">
        
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                
            </tr>
        </thead>
        ';

$no = 1;
while ($data = mysqli_fetch_array($query)) {
    $html .= '
        <tbody>
            <tr>
                <td>' . $no++ . '</td>
                <td>' . $data['nama'] . '</td>
                <td>' . $data['noHp'] . '</td>
                <td>' . $data['role'] . '</td>
                
            </tr>
        </tbody>
        ';
}
$html .= '
    </table>
</body>
</html>
';




$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Semua User', \Mpdf\Output\Destination::INLINE);
