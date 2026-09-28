<?php
@session_start();

if(!isset($_SESSION['level'])){
    header("location: ../index.php");
    exit();
};

if($_SESSION['level'] != 'admin'){
    header("location: ../index.php");
    exit();
}
?>