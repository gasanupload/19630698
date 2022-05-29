<?php
session_start();
include '../config/koneksi.php';
include '../config/profil.php';
$user = $_POST['user'];
$pass = md5($_POST['pass']);
$query_login = mysqli_query($link, "select * from pengguna where user='$user' and pass='$pass'");
if (mysqli_num_rows($query_login) == 1) {
    $data_login = mysqli_fetch_array($query_login);
    $user = $data_login['user'];
    $pass = $data_login['pass'];
    $nama_pengguna = $data_login['nama_pengguna'];
    $_SESSION['user'] = $user;
    echo "<script>alert('Selamat datang $nama_pengguna');window.location ='../index.php';</script>";
} else {
    //kalau ser ataupun pa tidak terdaftar di database
    echo "<script>alert('Nama pengguna dan sandi salah atau pengguna tidak ditemukan!');history.go(-1);</script>";
}
