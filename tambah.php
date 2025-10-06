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
    <div class="form-container">
        <form method="POST" action="simpan.php">
            <!-- Data Mahasiswa -->
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim" required placeholder="Masukkan NIM">
            </div>

            <!-- Input Nilai untuk 5 Mata Kuliah -->
            <div class="nilai-section">
                <h3>Nilai Mata Kuliah</h3>
                
                <div class="form-group">
                    <label>Pengembangan Web:</label>
                    <input type="number" name="nilai[]" required min="0" max="100" placeholder="0-100">
                </div>

                <div class="form-group">
                    <label>Basis Data:</label>
                    <input type="number" name="nilai[]" required min="0" max="100" placeholder="0-100">
                </div>

                <div class="form-group">
                    <label>Matematika Teknik:</label>
                    <input type="number" name="nilai[]" required min="0" max="100" placeholder="0-100">
                </div>

                <div class="form-group">
                    <label>Sistem Operasi:</label>
                    <input type="number" name="nilai[]" required min="0" max="100" placeholder="0-100">
                </div>

                <div class="form-group">
                    <label>Jaringan Komputer:</label>
                    <input type="number" name="nilai[]" required min="0" max="100" placeholder="0-100">
                </div>
            </div>

            <button type="submit" class="submit-btn">Simpan Data</button>
        </form>
    </div>
</body>
</html>
