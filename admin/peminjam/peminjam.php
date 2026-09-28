<?php
include '../../middleware/admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <header>
        <h1>Peminjam</h1> 
        <button
        class="button" 
        onclick="window.location.href = '/admin/peminjam/peminjam_tambah.php'"
        >
            + add peminjam
        </button>
    </header>
    <?php
    include("../../component/sidebar_admin.php");
    ?>
    <main>

         <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Nomor Telepon</th>
                <th>aksi</th>
            </tr>
                <?php
                include("../../koneksi.php");
                $no = 1;
                $data = mysqli_query($koneksi, "select * from peminjam order by id_peminjam desc");
                while ($row = mysqli_fetch_array($data)) {
                ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['alamat']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['no_hp']?></td>
                <td><button 
                    type="button" 
                    class="deletebutton"
                    onclick="window.location.href = '/aksi/peminjam/peminjam_hapus.php?id=<?php echo $row['id_peminjam'] ?>'"
                    ><img src="../../styles/assets/delete.svg" alt=""></button>
                    <button 
                    type="button"
                    onclick="window.location.href = '/admin/peminjam/peminjam_edit.php?id=<?php echo $row['id_peminjam'] ?>'"><img src="../../styles/assets/edit.svg" alt=""></button>
                </td>
            </tr>
                <?php
                }
                ?>
        </table>
    </main>
    </main>
    <footer>&copy;2025 Kura</footer>
</body>
</html>