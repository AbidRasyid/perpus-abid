```php id="k1x8q3"
<?php
include('../../koneksi.php');

$id_user = $_POST['id_user'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];



mysqli_query($koneksi, "
    UPDATE user 
    SET
        nama_user = '$nama_user',
        username = '$username',
        password = '$password',
        level = '$level'
    WHERE id_user = '$id_user'
");



switch ($level) {



    case 'peminjam':

        $alamat = $_POST['alamat_peminjam'];
        $gender = $_POST['gender_peminjam'];
        $no_hp = $_POST['no_hp'];

        $check = mysqli_query($koneksi, "
            SELECT * FROM peminjam
            WHERE id_user_fk = '$id_user'
        ");

        if (mysqli_num_rows($check) > 0) {

            mysqli_query($koneksi, "
                UPDATE peminjam
                SET
                    nama = '$nama_user',
                    alamat = '$alamat',
                    gender = '$gender',
                    no_hp = '$no_hp'
                WHERE id_user_fk = '$id_user'
            ");

        } else {

            mysqli_query($koneksi, "
                INSERT INTO peminjam
                (
                    id_user_fk,
                    nama,
                    alamat,
                    gender,
                    no_hp
                )
                VALUES
                (
                    '$id_user',
                    '$nama_user',
                    '$alamat',
                    '$gender',
                    '$no_hp'
                )
            ");
        }

        mysqli_query($koneksi, "
            DELETE FROM petugas
            WHERE fk_id_user = '$id_user'
        ");

    break;



    case 'petugas':

        $nip = $_POST['nip'];
        $alamat = $_POST['alamat_petugas'];
        $gender = $_POST['gender_petugas'];

        $check = mysqli_query($koneksi, "
            SELECT * FROM petugas
            WHERE fk_id_user = '$id_user'
        ");

        if (mysqli_num_rows($check) > 0) {

            mysqli_query($koneksi, "
                UPDATE petugas
                SET
                    nip = '$nip',
                    nama = '$nama_user',
                    alamat = '$alamat',
                    gender = '$gender'
                WHERE fk_id_user = '$id_user'
            ");

        } else {

            mysqli_query($koneksi, "
                INSERT INTO petugas
                (
                    nip,
                    fk_id_user,
                    nama,
                    alamat,
                    gender
                )
                VALUES
                (
                    '$nip',
                    '$id_user',
                    '$nama_user',
                    '$alamat',
                    '$gender'
                )
            ");
        }

        mysqli_query($koneksi, "
            DELETE FROM peminjam
            WHERE id_user_fk = '$id_user'
        ");

    break;


    case 'admin':

        mysqli_query($koneksi, "
            DELETE FROM peminjam
            WHERE id_user_fk = '$id_user'
        ");

        mysqli_query($koneksi, "
            DELETE FROM petugas
            WHERE fk_id_user = '$id_user'
        ");

    break;


    default:
        die("Level tidak valid");
}

header("Location: /admin/user/user.php");
exit;
?>
