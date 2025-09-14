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
$nilaiAngka = $_POST['nilai'];

// daftar mata kuliah tetap
$mataKuliah = [
    "Pengembangan Web",
    "Basis Data",
    "Matematika Teknik",
    "Sistem Operasi",
    "Jaringan Komputer"
];
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

    <h2>Data Mahasiswa T
