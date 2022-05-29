<?php
include "../config/koneksi.php";
include "../config/profil.php";
session_start();
$user = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda belum login, silahkan login dulu');window.location ='../login.php';</script>";
} else {
    //hapus
    if (isset($_GET['s'])) {
        $id_pengguna = $_GET['s'];
        $query_cekpengguna = mysqli_query($link, "select * from pengguna where id_pengguna='$id_pengguna'");
        if (mysqli_num_rows($query_cekpengguna) == 1) {
            $data_cekpengguna = mysqli_fetch_array($query_cekpengguna);
            $id_pengguna = $data_cekpengguna['id_pengguna'];
            $nama_pengguna = $data_cekpengguna['nama_pengguna'];
            $query_proses = mysqli_query($link, "delete from pengguna where id_pengguna='$id_pengguna'");
            if ($query_proses) {
                echo "<script>alert('Berhasil menghapus data pengguna $nama_pengguna');window.location ='../pengguna.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data pengguna,mohon periksa kesalahan!');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Gagal menghapus data pengguna tidak ada!');window.location ='../index.php';</script>";
        }
        //ubah
    } else if (isset($_POST['s'])) {
        $id_pengguna = $_POST['s'];
        $query_cekpengguna = mysqli_query($link, "select * from pengguna where id_pengguna='$id_pengguna'");
        if (mysqli_num_rows($query_cekpengguna) == 1) {
            $data_cekpengguna = mysqli_fetch_array($query_cekpengguna);
            $id_pengguna = $data_cekpengguna['id_pengguna'];
            $nama_pengguna = $_POST['nama_pengguna'];
            $pass = md5($_POST['pass']);
            $ubah_query = mysqli_query($link, "update pengguna set nama_pengguna='$nama_pengguna',pass='$pass' where id_pengguna='$id_pengguna'");
            if ($ubah_query) {
                echo "<script>alert('Berhasil mengubah data pengguna $nama_pengguna');window.location='../pengguna.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
        //tambah
    } else if (isset($_POST['t'])) {
        $nama_pengguna = $_POST['nama_pengguna'];
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);
        $query_ceknama = mysqli_query($link, "select * from pengguna where nama_pengguna='$nama_pengguna'");
        if (mysqli_num_rows($query_ceknama) == 1) {
            echo "<script>alert('Gagal menambah data, nama pengguna $nama_pengguna sudah ada!');history.go(-1);</script>";
        } else {
            $tambah_query = mysqli_query($link, "insert into pengguna (nama_pengguna,user,pass) values 
									  ('$nama_pengguna','$user','$pass');");
            if ($tambah_query) {
                echo "<script>alert('Berhasil menambah data pengguna $nama_pengguna');window.location='../pengguna.php';</script>";
            } else {
                echo "<script>alert('Gagal menambah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
    }
}
