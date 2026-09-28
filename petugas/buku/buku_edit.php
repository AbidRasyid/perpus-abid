<?php
include '../../middleware/petugas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/styles.css">
    <style>
        .Buku{
    background-color: black;
}

.Buku a{
    color: white;
}
    </style>
</head>
<body class="bw-rounded-theme">
    <header>
        <h1>Edit Buku</h1> 
    </header>
    <?php
    include("../../component/sidebar_petugas.php");
    ?>
    <main>
        <div>
            <?php
            include("../../koneksi.php");
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from buku where Isbn='$id'");
            $row = mysqli_fetch_array($data);
            ?>
            <form action="/aksi/buku/buku_edit.php" method="post">
                <table>
                    <tr>
                        <td>ISBN</td>
                        <td>
                            <input type="hidden" name="isbn_lama" value="<?php echo $row['Isbn']; ?>">
                            <input type="text" name="isbn" value="<?php echo $row['Isbn']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>
                            <input type="text" name="judul" value="<?php echo $row['Judul_buku']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td>
                            <input type="text" name="pengarang" value="<?php echo $row['Pengarang']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>
                            <input type="text" name="penerbit" value="<?php echo $row['Penerbit']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td>
                            <input type="text" name="tahun_terbit" value="<?php echo $row['Tahun_terbit']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>
                            <input type="number" name="stok" value="<?php echo $row['stok']?>">
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