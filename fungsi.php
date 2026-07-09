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

function tambahdata($data, $files) {
    global $koneksi;
    $nama       = htmlspecialchars($data["nama"]);
    $nim        = htmlspecialchars($data["nim"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    $email      = htmlspecialchars($data["email"]);
    $no_hp      = htmlspecialchars($data["no_hp"]);

    $namafoto    = $files["name"];
    $tmpfoto     = $files["tmp_name"];

    // Buat nama file unik agar tidak bentrok dengan file lain
    $newnamefoto = uniqid() . "_" . $namafoto;
    // Gunakan $newnamefoto (bukan $namafoto) sebagai nama file tujuan
    $path        = "assets/" . $newnamefoto;

    // Hapus semicolon setelah if agar blok hanya jalan jika upload berhasil
    if (move_uploaded_file($tmpfoto, $path)) {
        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) VALUES 
        ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$newnamefoto')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
    return 0;
}

function hapusdata($id)
{
    global $koneksi;
    
    $query = "DELETE FROM mahasiswa WHERE id=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubahdata($data, $id) {
    global $koneksi;
    $nama    = htmlspecialchars($data["nama"]);
    $nim     = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email   = htmlspecialchars($data["email"]);
    $no_hp   = htmlspecialchars($data["no_hp"]);
    $foto    = htmlspecialchars($data["foto"]);

    $query = "UPDATE mahasiswa SET 
                nama    = '$nama',
                nim     = '$nim',
                jurusan = '$jurusan',
                email   = '$email',
                no_hp   = '$no_hp',
                foto    = '$foto'
              WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function register($data) {
    global $koneksi;
    $username = stripslashes($data["username"]);
    $password1 = mysqli_real_escape_string($koneksi, $data["password"]);
    $confirm_password = mysqli_real_escape_string($koneksi, $data["confirm_password"]);

    if ($password1 !== $confirm_password) {
        echo "<script>
                alert('Password dan konfirmasi password tidak cocok!');
              </script>";
        return false;
    }

    //encrypt password
    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password_hash')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
// fungsi login
function login($data) {
    global $koneksi;

    if (!isset($data["username"]) || !isset($data["password"]) || $data["password"] === "") {
        return false;
    }

    $username = mysqli_real_escape_string($koneksi, $data["username"]);
    $password_input = $data["password"];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password_input, $user["password"])) {
            return $user;
        }
    }

    return false;
}
?>