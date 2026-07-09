<?php
session_start();
require "fungsi.php";

// Kalau sudah login, langsung arahkan ke halaman data mahasiswa
if (isset($_SESSION["username"])) {
    header("Location: mahasiswa.php");
    exit();
}

if (isset($_POST["login"])) {
    $user = login($_POST);

    if ($user) {
        // simpan info user ke session
        $_SESSION["username"] = $user["username"];
        $_SESSION["id"] = $user["id"];

        header("Location: mahasiswa.php");
        exit();
    } else {
        echo "<script>
                alert('Username atau password salah!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
     <head>
            <meta charset="utf-8">
            <title>
                Login | INFORMATIKA 2026
            </title>
            <link rel="stylesheet" href="style.css">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
     <body >
         <h1>
            INFORMATIKA 2026
        </h1>
        <table class="nav-table" border="1" cellspacing="0" cellpadding="3">
          <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profil</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="login.php">Data Mahasiswa</a></td>
            <td><a href="register.php">Register</a></td>
          </tr>
        </table>
        <br>
         <hr/>

        <h2>LOGIN</h2>
        <form action="" method="post">
            <table cellpadding="3">
                <tr>
                    <td><label for="username">Username</label></td>
                    <td>:</td>
                    <td><input type="text" id="username" name="username" required autofocus/></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>:</td>
                    <td><input type="password" id="password" name="password" required/></td>
                </tr>
                <tr>
                    <td colspan="3"><button type="submit" name="login">Login</button></td>
                </tr>
            </table>
        </form>
        <br>
        Belum punya akun? <a href="register.php">Register di sini</a>
        <br>
        <hr/>
     </body>
</html>