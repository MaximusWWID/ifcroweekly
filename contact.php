<?php
session_start();
require "cek_login.php";
?>
<!DOCTYPE php>
<php>
     <head>
            <meta charset="utf-8">
            <title>
                Contact | INFORMATIKA 2026
            </title>
            <link rel="stylesheet" href="assets/styles.css">
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
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
<?php if (isset($_SESSION["username"])): ?>
    <td><a href="logout.php">Logout (<?= htmlspecialchars($_SESSION["username"]); ?>)</a></td>
<?php else: ?>
    <td><a href="login.php">Login</a></td>
    <td><a href="register.php">Register</a></td>
<?php endif; ?>
          </tr>
        </table>
        <br>
         <hr/>