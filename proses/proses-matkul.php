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
        $id_matkul = $_GET['s'];
        $query_cekmatkul = mysqli_query($link, "select * from matkul where id_matkul='$id_matkul'");
        if (mysqli_num_rows($query_cekmatkul) == 1) {
            $data_cekmatkul = mysqli_fetch_array($query_cekmatkul);
            $id_matkul = $data_cekmatkul['id_matkul'];
            $nama_matkul = $data_cekmatkul['nama_matkul'];
            $query_proses = mysqli_query($link, "delete from matkul where id_matkul='$id_matkul'");
            if ($query_proses) {
                echo "<script>alert('Berhasil menghapus data matkul $nama_matkul');window.location ='../matkul.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data matkul,mohon periksa kesalahan!');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Gagal menghapus data matkul tidak ada!');window.location ='../index.php';</script>";
        }
        //ubah
    } else if (isset($_POST['s'])) {
        $id_matkul = $_POST['s'];
        $query_cekmatkul = mysqli_query($link, "select * from matkul where id_matkul='$id_matkul'");
        if (mysqli_num_rows($query_cekmatkul) == 1) {
            $data_cekmatkul = mysqli_fetch_array($query_cekmatkul);
            $id_matkul = $data_cekmatkul['id_matkul'];
            $nama_matkul = $_POST['nama_matkul'];
            $hari = $_POST['hari'];
            $jam = $_POST['jam'];
            $id_kelas = $_POST['id_kelas'];
            $id_dosen = $_POST['id_dosen'];
            $ubah_query = mysqli_query($link, "update matkul set nama_matkul='$nama_matkul',hari='$hari',jam='$jam',id_kelas='$id_kelas',id_dosen='$id_dosen' where id_matkul='$id_matkul'");
            if ($ubah_query) {
                echo "<script>alert('Berhasil mengubah data matkul $nama_matkul');window.location='../matkul.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
        //tambah
    } else if (isset($_POST['t'])) {
        $nama_matkul = $_POST['nama_matkul'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];
        $id_kelas = $_POST['id_kelas'];
        $query_kelas = mysqli_query($link, "select * from kelas where id_kelas='$id_kelas'");
        $data_kelas = mysqli_fetch_array($query_kelas);
        $nama_kelas = $data_kelas['nama_kelas'];
        $id_dosen = $_POST['id_dosen'];
        $query_cek = mysqli_query($link, "select * from matkul where hari='$hari' and jam='$jam' and id_kelas='$id_kelas'");
        if (mysqli_num_rows($query_cek) == 1) {
            echo "<script>alert('Gagal menambah data, mata kuliah ini sudah pada pada $hari jam $jam kelas $nama_kelas!');history.go(-1);</script>";
        } else {
            $tambah_query = mysqli_query($link, "insert into matkul (nama_matkul,hari,jam,id_kelas,id_dosen) values 
									  ('$nama_matkul','$hari','$jam','$id_kelas','$id_dosen');");
            if ($tambah_query) {
                echo "<script>alert('Berhasil menambah data matkul $nama_matkul');window.location='../matkul.php';</script>";
            } else {
                echo "<script>alert('Gagal menambah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
    }
}
