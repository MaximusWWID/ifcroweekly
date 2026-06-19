<?php
require "fungsi.php";

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id=$id";
$mhs = tampildata($query)[0];

if (isset($_POST["submit"])) {
    if (ubahdata($_POST, $id) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Ubah Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Ubah Data Mahasiswa</h2>
        <form action="" method="post">
            <table cellpadding="3">
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" id="nama" name="nama" value="<?= ($mhs['nama']) ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="nim">NIM</label></td>
                    <td>:</td>
                    <td><input type="number" id="nim" name="nim" value="<?= ($mhs['nim']) ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="jurusan">Jurusan</label></td>
                    <td>:</td>
                    <td><input type="text" id="jurusan" name="jurusan" value="<?= ($mhs['jurusan']) ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td>:</td>
                    <td><input type="email" id="email" name="email" value="<?= ($mhs['email']) ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="no_hp">No HP</label></td>
                    <td>:</td>
                    <td><input type="number" id="no_hp" name="no_hp" value="<?= ($mhs['no_hp']) ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="foto">Foto</label></td>
                    <td>:</td>
                    <td><input type="text" id="foto" name="foto" value="<?= ($mhs['foto']) ?>" required /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" name="submit">Ubah</button>
                    </td>
                </tr>
            </table>
        </form>
        <br>
    </body>
</html>