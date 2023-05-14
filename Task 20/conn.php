<?php
    // Informasi koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "data_pengguna";

    // Membuat koneksi
    $conn = new mysqli($host, $username, $password, $database);
    // mengoneksikan mysqli dengan parameter $host, $username, $password, $database



    // Memeriksa koneksi
    if ($conn->connect_error) {
    // if ($conn->connect_error): Memeriksa apakah terjadi error saat melakukan koneksi ke database menggunakan objek $conn.
    die("Connection failed: " . $conn->connect_error);
    // die("Connection failed: " . $conn->connect_error);: Jika terdapat error pada koneksi, maka program akan dihentikan dengan menampilkan pesan error menggunakan fungsi die().
    }


?>