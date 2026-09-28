<?php
include '../middleware/peminjam.php';
include '../koneksi.php';

$id_user = $_SESSION['id_user'];

$data = mysqli_query($koneksi, "SELECT 
    peminjam.id_user_fk, 
    status, 
    tanggal_mulai, 
    tanggal_selesai, 
    user.nama_user, 
    buku.Judul_buku 
    FROM peminjaman 
    JOIN buku on peminjaman.Isbn = buku.Isbn 
    JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam
    JOIN user ON peminjaman.id_user = user.id_user
    WHERE peminjam.id_user_fk = '$id_user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>
    <header>
        <h1>Riwayat Peminjaman</h1> 
    </header>
    <?php
    include("../component/sidebar_peminjam.php");
    ?>
    <main>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Penanggung Jawab</th>
                <th>Tanggal Mulai</th>
                <th>tanggal Selesai</th>
                <th>Status</th>
            </tr>
            <?php while($row = mysqli_fetch_array($data)): ?>
            <tr>
                <td><?php echo $row['Judul_buku']; ?></td>
                <td><?php echo $row['nama_user']?></td>
                <td><?php echo $row['tanggal_mulai']; ?></td>
                <td><?php echo $row['tanggal_selesai']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>
    <footer>&copy;2025 Kura</footer>
</body>
</html>