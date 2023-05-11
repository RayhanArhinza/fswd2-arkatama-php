<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "data_pengguna";

// // Membuat koneksi
// $koneksi = new mysqli($host, $username, $password, $database);

// // Memeriksa koneksi
// if ($koneksi->connect_error) {
//     die("Connection failed: " . $koneksi->connect_error);
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $id = $_POST['id'];
//     $nama = $_POST['nama'];
//     $pekerjaan = $_POST['pekerjaan'];
//     $email = $_POST['email'];
//     $telp = $_POST['telp'];
//     $alamat = $_POST['alamat'];

//     // Perbarui data di database
//     $query = "UPDATE user SET nama = '$nama', pekerjaan = '$pekerjaan', email = '$email',  telp = '$telp', alamat = '$alamat' WHERE id = '$id'";
//     $result = mysqli_query($koneksi, $query);

//     if ($result) {
//         echo "Data berhasil diperbarui";
//     } else {
//         echo "Terjadi kesalahan saat memperbarui data";
//     }

//     // Redirect back to index.php
//     header("Location: index.php");
//     exit();
// }


include 'conn.php';

// Membuat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // Perbarui data di database
    $query = "UPDATE user SET nama = '$nama', pekerjaan = '$pekerjaan', email = '$email',  telp = '$telp', alamat = '$alamat' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Terjadi kesalahan saat memperbarui data";
    }

    // Mengedit avatar jika ada perubahan
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        $avatar = $_FILES['avatar']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file yang diupload adalah gambar
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check !== false) {
            // Hapus avatar lama jika ada
            $old_avatar = "uploads/" . $avatar; // Ganti dengan direktori avatar lama
            if (file_exists($old_avatar)) {
                unlink($old_avatar);
            }

            // Upload avatar baru
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
            echo "Avatar berhasil diperbarui";
        } else {
            echo "File yang diupload bukan gambar";
        }
    }

    // Redirect back to index.php
    header("Location: index.php");
    exit();
}



?>
