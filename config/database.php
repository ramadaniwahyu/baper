<?php
// deklarasi parameter koneksi database
$server   = "192.168.20.1";
$username = "user_db";
$password = "Q1w2e3r4!!";
$database = "baper";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>