<?php
include("../../middleware/petugas.php");
include('../../koneksi.php');

$id_peminjam = $_POST['id_peminjam'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$no_hp = $_POST['no_hp'];
$level = strtolower(trim($_SESSION['level']));

mysqli_query($koneksi, "UPDATE peminjam set nama='$nama', alamat='$alamat', gender='$gender', no_hp='$no_hp' WHERE id_peminjam='$id_peminjam'");

switch ($level) {
    case 'admin':
        header("location: /admin/peminjam/peminjam.php");
        break;
    case 'petugas':
        header("location: /petugas/peminjam/peminjam.php");
        break;
    default:
        header("location: /");
        break;
}

?>