<?php
include "../config/koneksi.php";
include "../config/profil.php";
session_start();
$user = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda belum login, silahkan login dulu');window.location ='../login.php';</script>";
} else {
    if ((isset($_POST['password_lama'])) and (isset($_POST['password_lama'])) and (isset($_POST['password_lama']))) {
        $query_cekpengguna = mysqli_query($link, "select * from pengguna where user='$user'");
        if (mysqli_num_rows($query_cekpengguna) == 1) {
            $data_cekpengguna = mysqli_fetch_array($query_cekpengguna);
            $id_pengguna = $data_cekpengguna['id_pengguna'];
            $nama_pengguna = $data_cekpengguna['nama_pengguna'];
            $password_asli = $data_cekpengguna['pass'];
            $password_lama = md5($_POST['password_lama']);
            $password_baru1 = md5($_POST['password_baru1']);
            $password_baru2 = md5($_POST['password_baru2']);
            if ($password_asli == $password_lama) {
                if ($password_baru1 == $password_baru2) {
                    $ubah_query = mysqli_query($link, "update pengguna set pass='$password_baru2' where id_pengguna='$id_pengguna'");
                    if ($ubah_query) {
                        echo "<script>alert('Berhasil mengubah data password $nama_pengguna');window.location='../index.php';</script>";
                    } else {
                        echo "<script>alert('Gagal mengubah data, mohon periksa kesalahan!');history.go(-1);</script>";
                    }
                } else {
                    echo "<script>alert('Gagal mengubah data, password baru tidak sama dengan konfirmasinya!');history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Gagal mengubah data, password lama salah!');history.go(-1);</script>";
            }
        }
    } else {
        echo "<script>alert('Gagal mengubah data, mohon periksa kesalahan!');history.go(-1);</script>";
    }
}
