<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

// Validate input
if (!isset($_POST['nama'], $_POST['nim'], $_POST['nilai'], $_POST['old_nim'])) {
    die("Error: Data tidak lengkap!");
}

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$oldNim = $_POST['old_nim'];
$nilaiArray = $_POST['nilai'];

// Validate nilai
foreach ($nilaiArray as $nilai) {
    if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
        die("Error: Nilai harus berupa angka antara 0-100!");
    }
}

// Read existing data
$jsonFile = "data_mahasiswa.json";
$mahasiswa = json_decode(file_get_contents($jsonFile), true);

// Find and update student data
$mataKuliah = [
    "Pengembangan Web",
    "Basis Data",
    "Matematika Teknik",
    "Sistem Operasi",
    "Jaringan Komputer"
];

$updated = false;
foreach ($mahasiswa as $key => $mhs) {
    if ($mhs['nim'] === $oldNim) {
        // Update student data
        $mahasiswa[$key]['nama'] = $nama;
        $mahasiswa[$key]['nim'] = $nim;
        
        // Update nilai
        for ($i = 0; $i < count($mataKuliah); $i++) {
            $mahasiswa[$key]['mk'][$i]['nilai'] = intval($nilaiArray[$i]);
        }
        
        $updated = true;
        break;
    }
}

if ($updated) {
    // Save updated data
    file_put_contents($jsonFile, json_encode($mahasiswa, JSON_PRETTY_PRINT));
    header("Location: index.php?status=updated");
} else {
    die("Error: Data mahasiswa tidak ditemukan!");
}
?>