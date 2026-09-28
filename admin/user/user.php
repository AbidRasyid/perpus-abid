<?php
include '../../middleware/admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <header>
        <h1>User</h1> 
        <button
        class="button" 
        onclick="window.location.href = '/admin/user/user_tambah.php'"
        >
            + Add User
        </button>
    </header>
    <?php
    include("../../component/sidebar_admin.php");
    ?>
    <main>

         <table>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>username</th>
                <th>password</th>
                <th>level</th>
                <th>aksi</th>
            </tr>
                <?php
                include("../../koneksi.php");
                $no = 1;
                $data = mysqli_query($koneksi, "select * from user order by id_user desc");
                while ($row = mysqli_fetch_array($data)) {
                ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_user']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['level']?></td>
                <td><button 
                    type="button" 
                    class="deletebutton"
                    onclick="window.location.href = '/aksi/user/user_hapus.php?id=<?php echo $row['id_user']?>'"
                    ><img src="../../styles/assets/delete.svg" alt=""></button>
                    <button 
                    type="button" onclick="window.location.href = './user_edit.php?id=<?php echo $row['id_user']?>'"><img src="../../styles/assets/edit.svg" alt=""></button>
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