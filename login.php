<?php
session_start();
include 'config/koneksi.php';
include 'config/profil.php';
if (!isset($_SESSION['user'])) {
    $judul = 'Halaman Login';
    include 'templates/header_login.php';
    include 'pages/center-login.php';
    include 'templates/footer_login.php';
} else {
    echo "<script>window.location='index.php'</script>";
}
