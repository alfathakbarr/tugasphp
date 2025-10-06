<?php
session_start();

if (!isset($_GET['nim'])) {
    header("Location: index.php");
    exit();
}

$nim = $_GET['nim'];

// Read JSON file
$jsonFile = "data_mahasiswa.json";
$mahasiswa = json_decode(file_get_contents($jsonFile), true);

// Find and remove student
$found = false;
foreach ($mahasiswa as $key => $mhs) {
    if ($mhs['nim'] === $nim) {
        unset($mahasiswa[$key]);
        $found = true;
        break;
    }
}

if ($found) {
    // Reindex array and save
    $mahasiswa = array_values($mahasiswa);
    file_put_contents($jsonFile, json_encode($mahasiswa, JSON_PRETTY_PRINT));
    header("Location: index.php?status=deleted");
} else {
    die("Error: Data mahasiswa tidak ditemukan!");
}
?>