<?php
include '../../middleware/petugas.php';
include '../../koneksi.php';

$id_peminjaman = $_POST['id_peminjaman'];
$tanggal_selesai = date('Y-m-d');
mysqli_query(($koneksi), 
    "UPDATE buku 
        JOIN peminjaman ON buku.isbn = peminjaman.isbn
        SET 
            status = 'dikembalikan',
            stok = stok + peminjaman.jumlah_pinjam,
            tanggal_selesai = '$tanggal_selesai'          
    WHERE id_peminjaman = '$id_peminjaman'");

if($_SESSION['level'] == 'admin'){
    header("location: /admin/peminjaman/peminjaman.php");
}else{
    header("location: /petugas/peminjaman/peminjaman.php");
}
?>