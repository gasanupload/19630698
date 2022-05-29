<?php
session_start();
include 'config/koneksi.php';
include 'config/profil.php';
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda belum login, silahkan login terlebih dahulu!');window.location ='login.php';</script>";
} else {
    $user = $_SESSION['user'];
    $query_session = mysqli_query($link, "select * from pengguna where user='$user'");
    if (mysqli_num_rows($query_session) == 1) {
        $judul = 'Data Pengguna';
        $judul_form = 'Form Data Pengguna';
        include "templates/header.php";
        include "templates/sidebar.php";
        include "templates/topnavbar.php";
        include "pages/center-pengguna.php";
        include "templates/footer.php";
    } else {
        echo "<script>alert('Anda belum masuk, silahkan masuk terlebih dahulu!');window.location ='login.php';</script>";
    }
}
