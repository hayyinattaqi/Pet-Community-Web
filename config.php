<?php
session_start();

// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "pet_community";

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database, 3307);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk cek login
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Fungsi untuk redirect jika belum login
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}
?>