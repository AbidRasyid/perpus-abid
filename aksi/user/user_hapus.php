<?php
include("../../koneksi.php");
$id = $_GET["id"];

mysqli_query($koneksi, "delete from user where id_user='$id'");
header("location:/admin/user/user.php");
?>

<!-- <?php
include("../../koneksi.php");


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);


mysqli_begin_transaction($koneksi);

try {


    $check = mysqli_query($koneksi, "
        SELECT * FROM user
        WHERE id_user = '$id'
    ");

    if (mysqli_num_rows($check) <= 0) {
        throw new Exception("User tidak ditemukan");
    }


    mysqli_query($koneksi, "
        DELETE FROM peminjam
        WHERE id_user_fk = '$id'
    ");

    mysqli_query($koneksi, "
        DELETE FROM petugas
        WHERE fk_id_user = '$id'
    ");


    mysqli_query($koneksi, "
        DELETE FROM user
        WHERE id_user = '$id'
    ");


    mysqli_commit($koneksi);

    header("Location: /admin/user/user.php");
    exit;

} catch (Exception $e) {


    mysqli_rollback($koneksi);

    echo "Error: " . $e->getMessage();
}
?> -->