<?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "data_pengguna";

        // Membuat koneksi
        $koneksi = new mysqli($host, $username, $password, $database);
        // mengoneksikan mysqli dengan parameter $host, $username, $password, $database



        // Memeriksa koneksi
        if ($koneksi->connect_error) {
        // if ($conn->connect_error): Memeriksa apakah terjadi error saat melakukan koneksi ke database menggunakan objek $conn.
        die("Connection failed: " . $koneksi->connect_error);
        // die("Connection failed: " . $conn->connect_error);: Jika terdapat error pada koneksi, maka program akan dihentikan dengan menampilkan pesan error menggunakan fungsi die().
        }

// Mendapatkan ID dari parameter GET
$id = $_GET['id'];

// Mengambil data dari tabel berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Mengirimkan data dalam format JSON
echo json_encode($data);
?>