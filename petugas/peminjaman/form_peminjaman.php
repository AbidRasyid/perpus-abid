<?php
include '../../middleware/petugas.php';
include('../../koneksi.php');
$buku = mysqli_query($koneksi, "SELECT isbn, Judul_buku FROM buku");
$peminjam = mysqli_query($koneksi, "SELECT id_peminjam, nama FROM peminjam");
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
<body class="bw-rounded-theme">
    <?php
    include("../../component/sidebar_petugas.php");
    $date = date("Y-m-d");
    ?>
    <header>
        <h3>Form transaksi peminjaman buku</h3>
    </header>
    <main>
        <form action="/aksi/peminjaman/simpan_peminjaman.php" method="POST">
            <label for="">Judul Buku</label>
            <select name="isbn" required>
                <option value="">
                    <?php while($cek_buku = mysqli_fetch_assoc($buku)):?>
                        <option value="<?= $cek_buku['isbn'];?>">
                            <?= $cek_buku['Judul_buku'];?>
                        </option>
                    <?php endwhile; ?>
                </option>
            </select>
            <br><br>
            <label>Nama Peminjam</label><br>
            <select name="id_peminjam" required>
                <option value="">
                    <?php while($cek_peminjam = mysqli_fetch_assoc($peminjam)):?>
                        <option value="<?= $cek_peminjam['id_peminjam'];?>">
                            <?= $cek_peminjam['nama'];?>
                        </option>
                    <?php endwhile; ?>
                </option>
            </select>

            <br><br>
            <label for="jumlah_pinjam">Jumlah Dipinjam</label>
            <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" value="1" required>

            <br><br>
            
            <label>Tanggal Mulai</label><br>
            <input type="date" name="tgl_mulai" value="<?= $date; ?>" required>
            <br><br>
            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
            <button type="submit" class="submit">Simpan Peminjaman</button>
        </form>
    </main>
</body>