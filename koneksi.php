<?php
// persiapan koneksi database
$server = "localhost";
$user = "root"; //sesuaikan dengan user database
$password = ""; //sesuaikan dengan password database
$database = "dbcrud2024"; //sesuaikan dengan nama database

// buat koneksi database
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
