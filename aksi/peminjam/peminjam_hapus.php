<?php
include("../../koneksi.php");
include("../../middleware/petugas.php");

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id) {
    mysqli_query($koneksi, "DELETE FROM peminjam WHERE id_peminjam='".mysqli_real_escape_string($koneksi,$id)."'");
}

if (!isset($_SESSION)) { session_start(); }
$level = isset($_SESSION['level']) ? strtolower(trim($_SESSION['level'])) : '';

if($level === 'admin'){
    header("Location: /admin/peminjam/peminjam.php");
    exit;
}else{
    header("Location: /petugas/peminjam/peminjam.php");
    exit;
}

?>