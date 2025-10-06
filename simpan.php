<?php
session_start();

function konversiNilai($angka) {
    if ($angka >= 85) return "A";
    elseif ($angka >= 70) return "B";
    elseif ($angka >= 60) return "C";
    elseif ($angka >= 50) return "D";
    else return "E";
}

// Validasi data yang diterima
if (!isset($_POST['nama']) || !isset($_POST['nim']) || !isset($_POST['nilai'])) {
    die("Error: Data tidak lengkap!");
}

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$nilaiArray = $_POST['nilai'];

// Validasi nilai
foreach ($nilaiArray as $nilai) {
    if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
        die("Error: Nilai harus berupa angka antara 0-100!");
    }
}

// daftar mata kuliah tetap
$mataKuliah = [
    "Pengembangan Web",
    "Basis Data",
    "Matematika Teknik",
    "Sistem Operasi",
    "Jaringan Komputer"
];

// Menyiapkan data mahasiswa baru
$newMahasiswa = [
    "nama" => $nama,
    "nim" => $nim,
    "mk" => []
];

// Menggabungkan mata kuliah dengan nilai
for ($i = 0; $i < count($mataKuliah); $i++) {
    $newMahasiswa["mk"][] = [
        "nama" => $mataKuliah[$i],
        "nilai" => intval($nilaiArray[$i])
    ];
}

// Membaca data yang sudah ada
$existingData = @file_get_contents("data_mahasiswa.json");
$mahasiswa = $existingData ? json_decode($existingData, true) : [];

// Menambahkan data baru
$mahasiswa[] = $newMahasiswa;

// Menyimpan kembali ke file
file_put_contents("data_mahasiswa.json", json_encode($mahasiswa, JSON_PRETTY_PRINT));

// Redirect ke halaman index dengan pesan sukses
header("Location: index.php?status=success");
exit();
?>
