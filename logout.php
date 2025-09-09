<?php
session_start();

// Hapus semua session

session_unset(); // Kosongkan semua data
session_destroy();

// Redirect ke halaman login
header("Location: index.php");
exit();
?>