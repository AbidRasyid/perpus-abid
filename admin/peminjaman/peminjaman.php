<?php
include '../../middleware/admin.php';
include('../../koneksi.php');
$query = "SELECT peminjaman.id_peminjaman, buku.judul_buku, peminjam.nama, user.nama_user, peminjaman.tanggal_mulai, peminjaman.tanggal_selesai, peminjaman.status
          FROM peminjaman
          JOIN buku ON peminjaman.isbn = buku.isbn
          JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam
          JOIN user ON peminjaman.id_user = user.id_user
          ORDER BY peminjaman.id_peminjaman DESC";

$result = mysqli_query($koneksi, $query);
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

    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <header>
        <h1>Peminjaman</h1>
        <button 
        class="button"
        onclick="window.location.href = '/admin/peminjaman/form_peminjaman.php'"
        >
            + pinjam buku
        </button> 
    </header>
    <?php
    include("../../component/sidebar_admin.php");
    ?>
    <main>
        <table border="1">
            <tr>
                <th>no</th>
                <th>Judul Buku</th>
                <th>Peminjam</th>
                <th>Penanggung Jawab</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        
            <?php $no=1;?>
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $row['judul_buku'];?></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['nama_user'];?></td>
                <td><?= $row['tanggal_mulai'];?></td>
                <td><?= $row['tanggal_selesai'] ? $row['tanggal_selesai'] : '-'; ?></td>
                <td><?= ucfirst($row['status']);?></td>
                <td>
                    <?php if($row['status'] == 'dipinjam'):?>
                        <form action="../../aksi/peminjaman/kembalikan.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman'];?>">
                            <button type="submit"
                            onclick="return confirm('yakin buku dikembalikan?')"
                            >kembalikan</button>
                        </form>
                    <?php else:?>
                        <span>-</span>
                    <?php endif;?>
                </td>
            </tr>
            <?php endwhile;?>
        </table>
    </main>
    <footer>&copy;2025 Kura</footer>
</body>
