<?php
include '../../middleware/admin.php';
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
        <div> <h1>Buku</h1> 
        <button 
        class="button"
        onclick="window.location.href = '/admin/buku/buku_tambah.php'"
        >
            + add book
        </button></div>
                    <form method="GET" style="margin:0">
                <input type="text" name="search" placeholder="Cari buku...">
                <button type="submit">Cari</button>
            </form>
    </header>
    <?php
    include("../../component/sidebar_admin.php");
            $search = '';

        if(isset($_GET['search'])) {
            $search = $_GET['search'];
        }
    ?>
    <main>
        <table>
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th colspan="2">aksi</th>
            </tr>
           <?php
            include '../../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from buku WHERE judul_buku like '%$search%' order by created_at desc");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $d['Isbn'] ?></td>
                    <td><?php echo $d['Judul_buku'] ?></td>
                    <td><?php echo $d['Pengarang'] ?></td>
                    <td><?php echo $d['Penerbit'] ?></td>
                    <td><?php echo $d['Tahun_terbit'] ?></td>
                    <td><?php echo $d['stok'] ?></td>
                    <td>
                        <button 
                            type="button" 
                            class="deletebutton"
                            onclick="window.location.href = '/aksi/buku/buku_hapus.php?id=<?php echo $d['Isbn'] ?>'"
                        >
                                <img src="../../styles/assets/delete.svg" alt="">
                        </button>
                        <button
                            type="button"
                            onclick="window.location.href = '/admin/buku/buku_edit.php?id=<?php echo $d['Isbn']?>'"
                            >
                            <img src="../../styles/assets/edit.svg" alt="">
                        </button>
                </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </main>
    <footer>&copy;2025 Kura</footer>
</body>
</html>