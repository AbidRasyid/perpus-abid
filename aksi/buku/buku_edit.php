<?php
session_start();
include('../../koneksi.php');

$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun_terbit'];
$stok = (int)$_POST['stok'];

mysqli_query($koneksi, "UPDATE buku set Judul_buku='$judul', Pengarang='$pengarang', Penerbit='$penerbit', Tahun_terbit='$tahun', stok=$stok WHERE isbn='$isbn'");

if($_SESSION['level'] == 'admin'){
    header("location: /admin/buku/buku.php");
}else{
    header("location: /petugas/buku/buku.php");
}
?>