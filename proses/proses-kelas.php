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
        $id_kelas = $_GET['s'];
        $query_cekkelas = mysqli_query($link, "select * from kelas where id_kelas='$id_kelas'");
        if (mysqli_num_rows($query_cekkelas) == 1) {
            $data_cekkelas = mysqli_fetch_array($query_cekkelas);
            $id_kelas = $data_cekkelas['id_kelas'];
            $nama_kelas = $data_cekkelas['nama_kelas'];
            $query_proses = mysqli_query($link, "delete from kelas where id_kelas='$id_kelas'");
            if ($query_proses) {
                echo "<script>alert('Berhasil menghapus data kelas $nama_kelas');window.location ='../kelas.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data kelas,mohon periksa kesalahan!');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Gagal menghapus data kelas tidak ada!');window.location ='../index.php';</script>";
        }
        //ubah
    } else if (isset($_POST['s'])) {
        $id_kelas = $_POST['s'];
        $query_cekkelas = mysqli_query($link, "select * from kelas where id_kelas='$id_kelas'");
        if (mysqli_num_rows($query_cekkelas) == 1) {
            $data_cekkelas = mysqli_fetch_array($query_cekkelas);
            $id_kelas = $data_cekkelas['id_kelas'];
            $nama_kelas = $_POST['nama_kelas'];
            $ubah_query = mysqli_query($link, "update kelas set nama_kelas='$nama_kelas' where id_kelas='$id_kelas'");
            if ($ubah_query) {
                echo "<script>alert('Berhasil mengubah data kelas $nama_kelas');window.location='../kelas.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
        //tambah
    } else if (isset($_POST['t'])) {
        $nama_kelas = $_POST['nama_kelas'];
        $query_ceknama = mysqli_query($link, "select * from kelas where nama_kelas='$nama_kelas'");
        if (mysqli_num_rows($query_ceknama) == 1) {
            echo "<script>alert('Gagal menambah data, nama kelas $nama_kelas sudah ada!');history.go(-1);</script>";
        } else {
            $tambah_query = mysqli_query($link, "insert into kelas (nama_kelas) values 
									  ('$nama_kelas');");
            if ($tambah_query) {
                echo "<script>alert('Berhasil menambah data kelas $nama_kelas');window.location='../kelas.php';</script>";
            } else {
                echo "<script>alert('Gagal menambah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
    }
}
