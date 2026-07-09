<?php
require 'fungsi.php';

if(isset($_POST["register"])) {
    if(register($_POST) > 0) {
        echo "<script>
                alert('Registrasi berhasil!');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Registrasi gagal!');
              </script>";
    }
}


?>

<!DOCTYPE html>
<html>
     <head>
            <meta charset="utf-8">
            <title>
                Register | INFORMATIKA 2026
            </title>
            <link rel="stylesheet" href="style.css">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
     <body >
         <h1>
            REGISTER USER
        </h1>
        <hr>
        <form action="" method="post">
            <label for="username">Username</label><br>
            <input type="text" name="username"  required>
            <br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password"  required>
            <br><br>
            <label for="confirm_password">Confirm Password</label><br>
            <input type="password" name="confirm_password"  required>
            <br><br>
            <button type="submit" name="register">Register</button>
        </form>
        <br>
         <hr/>