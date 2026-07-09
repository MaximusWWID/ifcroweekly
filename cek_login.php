<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["username"])) {
    // Simpan alamat halaman yang ingin diakses, supaya setelah login
    // bisa diarahkan kembali ke halaman tersebut (opsional)
    $_SESSION["redirect_after_login"] = $_SERVER["REQUEST_URI"];

    header("Location: login.php?expired=1");
    exit();
}
?>