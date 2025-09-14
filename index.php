<?php
function konversiNilai($angka) {
    if ($angka >= 85) return "A";
    elseif ($angka >= 70) return "B";
    elseif ($angka >= 60) return "C";
    elseif ($angka >= 50) return "D";
    else return "E";
}

$mahasiswa = [
    [
        "nama"=>"Alfath Akbar", 
        "nim"=>"21060125140101", 
        "mk"=>[
            ["nama"=>"Pengembangan Web", "nilai"=>88],
            ["nama"=>"Basis Data", "nilai"=>95],
            ["nama"=>"Matematika Teknik", "nilai"=>87],
            ["nama"=>"Sistem Operasi", "nilai"=>99],
            ["nama"=>"Jaringan Komputer", "nilai"=>91],
        ]
    ],
    [
        "nama"=>"M Farhan Noufal", 
        "nim"=>"21060125140205", 
        "mk"=>[
            ["nama"=>"Pengembangan Web", "nilai"=>92],
            ["nama"=>"Basis Data", "nilai"=>80],
            ["nama"=>"Matematika Teknik", "nilai"=>70],
            ["nama"=>"Sistem Operasi", "nilai"=>65],
            ["nama"=>"Jaringan Komputer", "nilai"=>50],
        ]
    ],
    [
        "nama"=>"Banar Pambudi", 
        "nim"=>"21060125140307", 
        "mk"=>[
            ["nama"=>"Pengembangan Web", "nilai"=>60],
            ["nama"=>"Basis Data", "nilai"=>58],
            ["nama"=>"Matematika Teknik", "nilai"=>75],
            ["nama"=>"Sistem Operasi", "nilai"=>85],
            ["nama"=>"Jaringan Komputer", "nilai"=>90],
        ]
    ],
    [
        "nama"=>"Ivan Admaja", 
        "nim"=>"21060125140409", 
        "mk"=>[
            ["nama"=>"Pengembangan Web", "nilai"=>55],
            ["nama"=>"Basis Data", "nilai"=>65],
            ["nama"=>"Matematika Teknik", "nilai"=>78],
            ["nama"=>"Sistem Operasi", "nilai"=>72],
            ["nama"=>"Jaringan Komputer", "nilai"=>80],
        ]
    ],
    [
        "nama"=>"Zain Zaidan", 
        "nim"=>"21060125140511", 
        "mk"=>[
            ["nama"=>"Pengembangan Web", "nilai"=>45],
            ["nama"=>"Basis Data", "nilai"=>55],
            ["nama"=>"Matematika Teknik", "nilai"=>62],
            ["nama"=>"Sistem Operasi", "nilai"=>70],
            ["nama"=>"Jaringan Komputer", "nilai"=>88],
        ]
    ],
];
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs): ?>
                <?php foreach ($mhs['mk'] as $matkul): ?>
                <tr>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $matkul['nama'] ?></td>
                    <td><?= $matkul['nilai'] ?></td>
                    <td><?= konversiNilai($matkul['nilai']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
