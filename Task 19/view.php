<?php
    include 'conn.php';


    // Retrieve the data based on the given ID
    $id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Convert the data to a JSON format
        $data = array(
            'id' => $row['id'],
            'nama' => $row['nama'],
            'pekerjaan' => $row['pekerjaan'],
            'email' => $row['email'],
            'pass' => $row['pass'],
            'telp' => $row['telp'],
            'alamat' => $row['alamat']
        );

        // Send the JSON data back to the client-side function
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo "Data not found";
    }

    // Close the database connection
    mysqli_close($conn);
?>