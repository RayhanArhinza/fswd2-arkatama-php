<?php
include 'conn.php';
if (isset($_POST['submit'])) {
    // Ambil nilai dari form input
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $telp = isset($_POST['telp']) ? $_POST['telp'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    
    // Cek apakah file avatar sudah diupload
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        $tempdir = "uploads/";
        if (!file_exists($tempdir)) {
            mkdir($tempdir, 0755);
        } 
        
        $target_path = $tempdir . basename($_FILES['avatar']['name']);
        $avatar = $_FILES['avatar']['name'];
        $ukuran_gambar = $_FILES['avatar']['size']; 

        $fileinfo = @getimagesize($_FILES["avatar"]["tmp_name"]);
        $width = $fileinfo[0];
        $height = $fileinfo[1]; 
        if($ukuran_gambar > 81920){ 
            echo 'Ukuran gambar melebihi 80kb';
        } else if ($width > "512" || $height > "512") {
             echo 'Ukuran gambar harus 512x512';
        } else {
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
                // Query untuk menambahkan data ke tabel "user" dengan file avatar
                $sql = "INSERT INTO user (nama, pekerjaan, avatar, email, pass, telp, alamat) VALUES ('$nama', '$pekerjaan', '$avatar', '$email', '$pass', '$telp', '$alamat')";
                if (mysqli_query($conn, $sql)) {
                    echo 'Simpan data berhasil';
                } else {
                    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
                }
            } else {
                echo 'Simpan data gagal';
            }
        }
    } else {
        // Query untuk menambahkan data ke tabel "user" tanpa file avatar
        $sql = "INSERT INTO user (nama, pekerjaan, email, pass, telp, alamat) VALUES ('$nama', '$pekerjaan', '$email', '$pass', '$telp', '$alamat')";
        if (mysqli_query($conn, $sql)) {
            echo 'Simpan data berhasil';
        } else {
            echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
        }
    }
    header("Location: index.php");
    exit;
}
?>