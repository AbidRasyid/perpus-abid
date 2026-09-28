<?php
include('../../koneksi.php');

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];


mysqli_query($koneksi, "UPDATE petugas set nip='$nip', nama='$nama', alamat='$alamat', gender='$gender' WHERE nip='".$_POST['nip_lama']."'");

    header("location: /admin/petugas/petugas.php");

?>