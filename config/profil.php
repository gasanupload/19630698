<?php
$query_profil = mysqli_query($link, "select * from profil");
$data_profil = mysqli_fetch_array($query_profil);
$nama_aplikasi = $data_profil['nama_aplikasi'];
$nama_profil = $data_profil['nama_profil'];
$nomor_profil = $data_profil['nomor_profil'];
