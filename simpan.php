<?php
function konversiNilai($angka) {
    if ($angka >= 85) return "A";
    elseif ($angka >= 70) return "B";
    elseif ($angka >= 60) return "C";
    elseif ($angka >= 50) return "D";
    else return "E";
}

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$mk = $_POST['mk'];
$nilai = $_POST['nilai'];
$nilaiHuruf = konversiNilai($nilai);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa Tersimpan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Daftar Mahasiswa</a> |
        <a href="tambah.php">Tambah Mahasiswa</a>
    </nav>

    <h2>Data Mahasiswa Tersimpan</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Mata Kuliah</th>
            <th>Nilai Angka</th>
            <th>Nilai Huruf</th>
        </tr>
        <tr>
            <td><?= $nama ?></td>
            <td><?= $nim ?></td>
            <td><?= $mk ?></td>
            <td><?= $nilai ?></td>
            <td><?= $nilaiHuruf ?></td>
        </tr>
    </table>
</body>
</html>
