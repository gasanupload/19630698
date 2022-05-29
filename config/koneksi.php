<?php
$host="localhost";
$user="root";
$password="";
$database="19630698";
$link = mysqli_connect($host,$user,$password);
if (!$link) {
	die("Koneksi basis data gagal : " . mysqli_connect_error());
}
$db_select = mysqli_select_db($link, $database);
if (!$db_select) {
    die("Gagal memilih basis data : " . mysqli_error($link));
}
