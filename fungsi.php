<!-- Koneksi Database -->
<?php
$koneksi = mysqli_connect("localhost", "root", "", "ifcroweekly");
function tampildata($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahdata($data) {
    global $koneksi;

    $nama    = htmlspecialchars($data["nama"]    ?? '');
    $nim     = intval($data["nim"]               ?? 0);  // ✅ konversi ke integer
    $jurusan = htmlspecialchars($data["jurusan"] ?? '');
    $email   = htmlspecialchars($data["email"]   ?? '');
    $no_hp   = htmlspecialchars($data["no_hp"]   ?? '');
    $foto    = htmlspecialchars($data["foto"]    ?? '');

    $query = "INSERT INTO mahasiswa
              (nama, nim, jurusan, email, no_hp, foto) VALUES
              ('$nama', $nim, '$jurusan', '$email', '$no_hp', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id)
{
    global $koneksi;
    
    $query = "DELETE FROM mahasiswa WHERE id=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>