<?php
session_start();

function konversiNilai($angka) {
    if ($angka >= 85) return "A";
    elseif ($angka >= 70) return "B";
    elseif ($angka >= 60) return "C";
    elseif ($angka >= 50) return "D";
    else return "E";
}

// Membaca data dari file JSON
$jsonFile = "data_mahasiswa.json";
if (file_exists($jsonFile)) {
    $jsonContent = file_get_contents($jsonFile);
    $mahasiswa = json_decode($jsonContent, true) ?: [];
} else {
    $mahasiswa = [];
}

// Menampilkan pesan berdasarkan status
if (isset($_GET['status'])) {
    $message = '';
    $type = 'success';
    
    switch ($_GET['status']) {
        case 'success':
            $message = 'Data berhasil disimpan!';
            break;
        case 'updated':
            $message = 'Data berhasil diperbarui!';
            break;
        case 'deleted':
            $message = 'Data berhasil dihapus!';
            $type = 'warning';
            break;
    }
    
    if ($message) {
        echo "<div class='alert alert-{$type}'>{$message}</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Daftar Mahasiswa</a> |
        <a href="tambah.php">Tambah Mahasiswa</a>
    </nav>

    <h2>Daftar Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Mata Kuliah</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs): ?>
                <?php 
                $firstRow = true;
                $rowspan = count($mhs['mk']);
                foreach ($mhs['mk'] as $matkul): 
                ?>
                <tr>
                    <?php if ($firstRow): ?>
                        <td rowspan="<?= $rowspan ?>"><?= htmlspecialchars($mhs['nama']) ?></td>
                        <td rowspan="<?= $rowspan ?>"><?= htmlspecialchars($mhs['nim']) ?></td>
                    <?php endif; ?>
                    <td><?= htmlspecialchars($matkul['nama']) ?></td>
                    <td><?= htmlspecialchars($matkul['nilai']) ?></td>
                    <td><?= konversiNilai($matkul['nilai']) ?></td>
                    <?php if ($firstRow): ?>
                        <td rowspan="<?= $rowspan ?>" class="action-buttons">
                            <a href="edit.php?nim=<?= urlencode($mhs['nim']) ?>" class="btn btn-edit">Edit</a>
                            <a href="javascript:void(0);" onclick="confirmDelete('<?= htmlspecialchars($mhs['nim']) ?>')" class="btn btn-delete">Hapus</a>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php 
                $firstRow = false;
                endforeach; 
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    function confirmDelete(nim) {
        if (confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')) {
            window.location.href = 'delete.php?nim=' + encodeURIComponent(nim);
        }
    }
    </script>
</body>
</html>
