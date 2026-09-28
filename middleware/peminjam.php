<?php
@session_start();

if(!isset($_SESSION['level'])){
    header("location: ../index.php");
    exit();
};

if($_SESSION['level'] != 'peminjam'){
    header("location: ../index.php");
    exit();
}
?>