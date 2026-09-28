<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($koneksi, "INSERT INTO user (nama_user, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");

$id_user = mysqli_insert_id($koneksi);

if($level === 'admin'){
    header('location: /admin/user/user.php');
}if($level === 'petugas'){
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat_petugas'];
    $gender = $_POST['gender_petugas'];

    if(mysqli_query($koneksi, "INSERT INTO petugas(nip, nama, alamat, gender) VALUES ('$nip', '$nama', '$alamat', '$gender')")){
        header('location: /admin/user/user.php');
    }else{
        echo "Gagal menyimpan petugas: " . mysqli_error($koneksi);
    }
}if($level === 'peminjam'){
    $alamat = $_POST['alamat_peminjam'];
    $gender = $_POST['gender_peminjam'];
    $no_hp = $_POST['no_hp'];


    if(mysqli_query($koneksi, "INSERT INTO peminjam (id_user_fk, nama, alamat, gender, no_hp) VALUES ('$id_user', '$nama', '$alamat', '$gender', '$no_hp')")){
        header('location: /admin/user/user.php');
    }
    }else{
        echo "Gagal menyimpan peminjam: " . mysqli_error($koneksi);
}