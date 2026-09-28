<?php
include("../../koneksi.php");
$id = $_GET["id"];

mysqli_query($koneksi, "delete from petugas where nip='$id'");


    header("location: /admin/petugas/petugas.php");
?>