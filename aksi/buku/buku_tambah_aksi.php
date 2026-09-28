<?php
session_start();
include('../../koneksi.php');

function alertBack($message)
{
    echo "<script>
            alert('" . $message . "');
            window.history.back();
        </script>";
    exit();
}

$isbn = mysqli_real_escape_string($koneksi, $_POST['isbn']);
$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
$penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
$tahun = mysqli_real_escape_string($koneksi, $_POST['tahun_terbit'])    ;
$stok = (int)$_POST['stok'];
$tahun_sekarang = (int)date("Y");

if(trim($isbn) === '' || trim($judul) === '' || trim($pengarang) === '' || trim($penerbit) === '' || trim($tahun) === '' || trim($_POST['stok']) === ''){
    alertBack('Semua data buku wajib diisi');
}

if(!ctype_digit((string)$tahun) || (int)$tahun > $tahun_sekarang){
    alertBack('Tahun terbit tidak valid');
}

if(!is_numeric($_POST['stok']) || $stok < 0){
    alertBack('Stok tidak valid');
}

mysqli_query($koneksi, "INSERT INTO buku(Isbn, Judul_buku, Pengarang, Penerbit, Tahun_terbit, stok) VALUES('$isbn', '$judul', '$pengarang', '$penerbit', '$tahun', '$stok')");

if($_SESSION['level'] == 'admin'){
    header("location: /admin/buku/buku.php");
}else{
    header("location: /petugas/buku/buku.php");
}

?>