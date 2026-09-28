<?php
include('../../koneksi.php');
include('../../middleware/admin.php');

$nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$gender= mysqli_real_escape_string($koneksi, $_POST['gender']);
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$level = 'petugas';

$query_petugas = mysqli_query($koneksi, "INSERT INTO petugas(nip, nama, alamat, gender) VALUES('$nip', '$nama', '$alamat', '$gender')");

$query_user = mysqli_query($koneksi, "INSERT INTO user(nama_user, username, password, level) VALUES( '$nama', '$username', '$password', '$level')");

if($query_petugas && $query_user){
    header("location: /admin/petugas/petugas.php");
} else {
    echo "Gagal menambahkan petugas.";
}

?>