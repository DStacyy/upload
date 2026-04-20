<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_gallery';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
    die("koneksi gagal cik: " . $conn->connect_error);
}