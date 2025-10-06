<?php
session_start();

// Check if ID is provided
if (!isset($_GET['nim'])) {
    header("Location: index.php");
    exit();
}

$nim = $_GET['nim'];

// Read JSON file
$jsonFile = "data_mahasiswa.json";
$mahasiswa = json_decode(file_get_contents($jsonFile), true);

// Find student data
$studentData = null;
foreach ($mahasiswa as $mhs) {
    if ($mhs['nim'] === $nim) {
        $studentData = $mhs;
        break;
    }
}

// If student not found, redirect
if (!$studentData) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Daftar Mahasiswa</a> |
        <a href="tambah.php">Tambah Mahasiswa</a>
    </nav>

    <h2>Edit Data Mahasiswa</h2>
    <div class="form-container">
        <form method="POST" action="update.php">
            <input type="hidden" name="old_nim" value="<?= htmlspecialchars($studentData['nim']) ?>">
            
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" required value="<?= htmlspecialchars($studentData['nama']) ?>">
            </div>

            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim" required value="<?= htmlspecialchars($studentData['nim']) ?>">
            </div>

            <div class="nilai-section">
                <h3>Nilai Mata Kuliah</h3>
                <?php foreach ($studentData['mk'] as $index => $matkul): ?>
                    <div class="form-group">
                        <label><?= htmlspecialchars($matkul['nama']) ?>:</label>
                        <input type="number" name="nilai[]" required min="0" max="100" 
                               value="<?= htmlspecialchars($matkul['nilai']) ?>" placeholder="0-100">
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="button-group">
                <button type="submit" class="submit-btn">Simpan Perubahan</button>
                <a href="index.php" class="cancel-btn">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>