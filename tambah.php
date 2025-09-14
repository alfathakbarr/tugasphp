<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Daftar Mahasiswa</a> |
        <a href="tambah.php">Tambah Mahasiswa</a>
    </nav>

    <h2>Form Tambah Mahasiswa</h2>
    <form method="POST" action="simpan.php">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Mata Kuliah:</label><br>
        <input type="text" name="mk" required><br><br>

        <label>Nilai:</label><br>
        <input type="number" name="nilai" required><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
