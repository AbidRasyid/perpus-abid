<?php
include '../../middleware/petugas.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,1<PASSWORD>;1,2<PASSWORD>;1,3<PASSWORD>;1,4<PASSWORD>;1,5<PASSWORD>;1,6<PASSWORD>;1,7<PASSWORD>;1,8<PASSWORD>;1,9<PASSWORD>&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body class="bw-rounded-theme">
    <header>
        <h1>Edit Peminjam</h1> 
    </header>
    <?php
    include("../../component/sidebar_petugas.php");
    ?>
    <main>
        <div>
            <?php
            include("../../koneksi.php");
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from peminjam where id_peminjam='$id'");
            $row = mysqli_fetch_array($data);
            ?>
            <form action="/aksi/peminjam/peminjam_edit.php" method="post">
                <table>
                    <tr>
                        <td>

                            <input type="hidden" name="id_peminjam" value="<?php echo $row['id_peminjam']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                                <select name="gender" id="gender">

                                    <option value="">-- Pilih --</option>
                                    <option value="L" <?php if($row['gender'] == 'L') echo 'selected'; ?>>Laki-Laki</option>
                                    <option value="P" <?php if($row['gender'] == 'P') echo 'selected'; ?>>Perempuan</option>
                        </td>
                    </tr>
                                        <tr>
                        <td>Nomor Telepon</td>
                        <td>
                            <input type="number" name="no_hp" value="<?php echo $row['no_hp']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Simpan">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
    <footer>&copy;2025 Kura</footer>
</body>
</html>