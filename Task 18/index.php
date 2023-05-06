<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Daftar Produk</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Informasi koneksi ke database
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "arkatama__store";

                // Membuat koneksi
                $conn = new mysqli($host, $username, $password, $database);

                // Memeriksa koneksi
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                // insert data ke table categories
                $sql = "INSERT INTO categories (name, created_at, updated_at) VALUES ('Kategori 13', '2023-04-02 06:30:17', '2023-04-02 06:30:17')";
                if ($conn->query($sql) === TRUE) {
                    echo "Data kategori berhasil ditambahkan.<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // insert data ke table products
                $sql = "INSERT INTO products (category_id, nama, description, price, status, created_at, updated_at, created_by, verified_at, verified_by) 
                        VALUES (13, 'Produk 68', 'Lorem, ipsum dolor sit amet consectetur adipisicin...', 5000000, 'accepted', '2023-04-02 06:30:18', '2023-04-02 06:30:18', '1', NULL, NULL)";
                if ($conn->query($sql) === TRUE) {
                    echo "Data produk berhasil ditambahkan.<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                echo "Connected successfully";
                // Query untuk mengambil data join antara tabel categories dan products
                $sql = "SELECT categories.name AS category_name, products.nama, products.description, products.price, products.status 
                        FROM categories 
                        INNER JOIN products 
                        ON categories.id = products.category_id 
                        LIMIT 50";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {


                    $i = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["category_name"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                        $i++;
                    }

                    echo "</table>";
                } else {
                    echo "No results found.";
                }
                $conn->close();
                ?>

            </tbody>
        </table>
</body>
</html>