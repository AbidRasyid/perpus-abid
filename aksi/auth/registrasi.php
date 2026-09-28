<?php
include '../../koneksi.php';

$name = mysqli_real_escape_string($koneksi,$_POST['username']);
$alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);
$gender = mysqli_real_escape_string($koneksi,$_POST['gender']);
$password = mysqli_real_escape_string($koneksi,$_POST['password']);
$no_hp = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
$level = 'peminjam';

$query_user = "INSERT INTO user(nama_user, username, password, level) 
    VALUES(
    '$name', '$name', '$password', '$level'
    )";

$query_peminjam = "INSERT INTO peminjam(nama, alamat, gender, no_hp) VALUES(
    '$name', '$alamat', '$gender', '$no_hp')";

if(mysqli_query($koneksi, $query_user) && mysqli_query($koneksi, $query_peminjam)) {
    header("Location: /index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}