<?php
session_start();
include('../../koneksi.php');

$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$level = 'peminjam';
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$gender = mysqli_real_escape_string($koneksi, $_POST['gender'] ?? '');
$no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

mysqli_query($koneksi, "INSERT INTO user (nama_user, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");

$id_user = mysqli_insert_id($koneksi);

if (mysqli_query($koneksi, "INSERT INTO peminjam (id_user_fk, nama, alamat, gender, no_hp) VALUES ('$id_user', '$nama', '$alamat', '$gender', '$no_hp')")) {
    if (isset($_SESSION['level']) && $_SESSION['level'] === 'admin') {
        header("location: /admin/peminjam/peminjam.php");
    } else {
        header("location: /petugas/peminjam/peminjam.php");
    }
} else {
    echo "Gagal menyimpan peminjam: " . mysqli_error($koneksi);
}

?>