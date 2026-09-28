<?php
include '../../middleware/admin.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body class="bw-rounded-theme">
    <header>
        <h1>Edit Petugas</h1> 
    </header>
    <?php
    include("../../component/sidebar_admin.php");
    ?>
    <main>
        <div>
            <?php
            include("../../koneksi.php");
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from petugas where nip='$id'");
            $row = mysqli_fetch_array($data);
            ?>
            <form action="/aksi/petugas/petugas_edit.php" method="post">
                <table>
                    <tr>
                        <td>NIP</td>
                        <td>
                            <input type="hidden" name="nip_lama" value="<?php echo $row['nip']; ?>">
                            <input type="text" name="nip" value="<?php echo $row['nip']; ?>">
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
                                </select>
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