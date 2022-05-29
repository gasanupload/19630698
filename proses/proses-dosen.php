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
        $id_dosen = $_GET['s'];
        $query_cekdosen = mysqli_query($link, "select * from dosen where id_dosen='$id_dosen'");
        if (mysqli_num_rows($query_cekdosen) == 1) {
            $data_cekdosen = mysqli_fetch_array($query_cekdosen);
            $id_dosen = $data_cekdosen['id_dosen'];
            $nama_dosen = $data_cekdosen['nama_dosen'];
            $query_proses = mysqli_query($link, "delete from dosen where id_dosen='$id_dosen'");
            if ($query_proses) {
                echo "<script>alert('Berhasil menghapus data dosen $nama_dosen');window.location ='../dosen.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data dosen,mohon periksa kesalahan!');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Gagal menghapus data dosen tidak ada!');window.location ='../index.php';</script>";
        }
        //ubah
    } else if (isset($_POST['s'])) {
        $id_dosen = $_POST['s'];
        $query_cekdosen = mysqli_query($link, "select * from dosen where id_dosen='$id_dosen'");
        if (mysqli_num_rows($query_cekdosen) == 1) {
            $data_cekdosen = mysqli_fetch_array($query_cekdosen);
            $id_dosen = $data_cekdosen['id_dosen'];
            $nama_dosen = $_POST['nama_dosen'];
            $nohp = $_POST['nohp'];
            $email = $_POST['email'];
            $ubah_query = mysqli_query($link, "update dosen set nama_dosen='$nama_dosen',nohp='$nohp',email='$email' where id_dosen='$id_dosen'");
            if ($ubah_query) {
                echo "<script>alert('Berhasil mengubah data dosen $nama_dosen');window.location='../dosen.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
        //tambah
    } else if (isset($_POST['t'])) {
        $nama_dosen = $_POST['nama_dosen'];
        $nohp = $_POST['nohp'];
        $email = $_POST['email'];
        $query_ceknohp = mysqli_query($link, "select * from dosen where nohp='$nohp'");
        $query_cekemail = mysqli_query($link, "select * from dosen where email='$email'");
        if (mysqli_num_rows($query_ceknohp) == 1) {
            echo "<script>alert('Gagal menambah data, No HP $nohp sudah ada!');history.go(-1);</script>";
        } else if (mysqli_num_rows($query_cekemail) == 1) {
            echo "<script>alert('Gagal menambah data, Email $email sudah ada!');history.go(-1);</script>";
        } else {
            $tambah_query = mysqli_query($link, "insert into dosen (nama_dosen,nohp,email) values 
									  ('$nama_dosen','$nohp','$email');");
            if ($tambah_query) {
                echo "<script>alert('Berhasil menambah data dosen $nama_dosen');window.location='../dosen.php';</script>";
            } else {
                echo "<script>alert('Gagal menambah data, mohon periksa kesalahan!');history.go(-1);</script>";
            }
        }
    }
}
