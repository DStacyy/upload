<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'galeri_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
    die("koneksi gagal cik: " . $conn->connect_error);
}