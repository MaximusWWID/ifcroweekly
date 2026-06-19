<?php
require "fungsi.php";
$qmhs = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($qmhs);
?>

<!DOCTYPE html>
<php>
    <head>
        <meta charset="utf-8">
        <title>Data Mahasiswa | INFORMATIKA 2026</title>
        <link rel="stylesheet" href="assets/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>INFORMATIKA 2026</h1>
        <table class="nav-table" border="1" cellspacing="0" cellpadding="3">
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href="profile.php">Profil</a></td>
                <td><a href="contact.php">Contact</a></td>
                <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
            </tr>
        </table>
        <br>
        <hr/>
        <h2>Data Mahasiswa</h2>
        <a href="tambahdata.php">
            <button>Tambah data</button>
        </a>
        <table border="1" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>

            <?php
            $i = 1;
            foreach ($mahasiswas as $mhs) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $mhs['nama'] . "</td>";
                echo "<td>" . $mhs['nim'] . "</td>";
                echo "<td>" . $mhs['jurusan'] . "</td>";
                echo "<td>" . $mhs['email'] . "</td>";
                echo "<td>" . $mhs['no_hp'] . "</td>";
                echo "<td><img src='assets/" . $mhs['foto'] . "' alt='Foto " . $mhs['nama'] . "' width='60px'/></td>";
                echo "<td>
                        <a href='ubahdata.php?id=" . $mhs['id'] . "'><button>Edit</button></a> |
                        <a href='hapusdata.php?id=" . $mhs['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\"><button>Hapus</button></a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
    </body>
</php>