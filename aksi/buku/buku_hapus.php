<?php
session_start();
include("../../koneksi.php");
$id = $_GET["id"];

mysqli_query($koneksi, "delete from buku where Isbn='$id'");
if($_SESSION['level'] == 'admin'){
    header("location: /admin/buku/buku.php");
}else{
    header("location: /petugas/buku/buku.php");
}
?>