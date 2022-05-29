<?php
session_start();
unset($_SESSION['user']);
echo "<script>alert('Berhasil keluar, sampai jumpa!');window.location ='../login.php';</script>";
