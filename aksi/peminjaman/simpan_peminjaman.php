<?php
include '../../middleware/petugas.php';
include '../../koneksi.php';
$isbn     = $_POST['isbn'];
$id_peminjam = $_POST['id_peminjam'];
$tgl_mulai   = $_POST['tgl_mulai'];
$jumlah_pinjam = $_POST['jumlah_pinjam'];
$id_user     = $_SESSION['id_user'];
$status      = 'dipinjam';

$data = mysqli_query($koneksi, "SELECT stok FROM buku WHERE isbn = '$isbn'");
$buku = mysqli_fetch_assoc($data);
$query_stok = "UPDATE buku SET stok = stok - $jumlah_pinjam WHERE isbn = '$isbn'";


if($buku['stok'] > 0 && $buku['stok'] >= $jumlah_pinjam){
    mysqli_query($koneksi, $query_stok);

    mysqli_query($koneksi, "INSERT INTO peminjaman(isbn, id_peminjam, id_user, tanggal_mulai, jumlah_pinjam, status)
    VALUES (
        '$isbn',
        '$id_peminjam',
        '$id_user',
        '$tgl_mulai',
        '$jumlah_pinjam',
        '$status'
    )"
    );

        if($_SESSION['level'] == 'admin'){
        header("location: /admin/peminjaman/peminjaman.php");
    }else{
        header("location: /petugas/peminjaman/peminjaman.php");
    }
    exit;
}else{
    echo "Stok buku tidak mencukupi untuk dipinjam";
    exit;
}