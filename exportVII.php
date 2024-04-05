<?php


require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';

$sql = "SELECT * FROM matapelajaran WHERE matapelajaran.kelas = 'VII' ORDER BY hari, waktu";
$query = mysqli_query($db, $sql);

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Daftar Admin</title>
<link rel="stylesheet" href="asset/css/mpdf.css">    
</head>

<body>

    <h1 class="text-center">Jadwal Mata Pelajaran Kelas VII</h1>
    <br>
    <table class="table">
        
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Mata pelajaran</th>

                
            </tr>
        </thead>
        ';

$no = 1;
while ($data = mysqli_fetch_array($query)) {
    $html .= '
        <tbody>
            <tr>
                <td>' . $data['kelas'] . '</td>
                <td>' . $data['hari'] . '</td>
                <td>' . $data['waktu'] . '</td>
                <td>' . $data['nama_mapel'] . '</td>
                
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
$mpdf->Output('Daftar Admin', \Mpdf\Output\Destination::INLINE);