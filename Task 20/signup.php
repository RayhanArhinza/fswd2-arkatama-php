<?php
// Fungsi untuk melakukan koneksi ke database
function connectDB()
{
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "data_pengguna";

  // Buat koneksi
  $conn = new mysqli($host, $username, $password, $database);

  // Cek koneksi
  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  return $conn;
}

// Fungsi untuk menyimpan data pengguna ke database
// Fungsi untuk menyimpan data pengguna ke database
function registerUser($name, $email, $pass)
{
  $conn = connectDB();

  // Escape input untuk mencegah SQL injection
  $name = $conn->real_escape_string($name);
  $email = $conn->real_escape_string($email);
  $pass = $conn->real_escape_string($pass);

  // Cek syarat-syarat password
  $hasUppercase = preg_match("/[A-Z]/", $pass);
  $hasNumber = preg_match("/\d/", $pass);
  $hasSymbol = preg_match("/[^a-zA-Z\d]/", $pass);

  if (!$hasUppercase || !$hasNumber || !$hasSymbol) {
    echo "<script>alert('Password harus memenuhi syarat-syarat berikut: \\n- Terdapat huruf besar \\n- Terdapat angka \\n- Terdapat simbol');</script>";
    return;
  }

  // Query untuk memeriksa apakah email sudah terdaftar sebelumnya
  $sqlCheckEmail = "SELECT * FROM signup WHERE email='$email'";
  $result = $conn->query($sqlCheckEmail);

  if ($result->num_rows > 0) {
    echo "<script>alert('Email telah digunakan. Gunakan email lain.');</script>";
    return;
  }

  // Query untuk menyimpan data pengguna
  $sql = "INSERT INTO signup (name, email, pass) VALUES ('$name', '$email', '$pass')";

  if ($conn->query($sql) === TRUE) {
    // Registrasi sukses
    echo "<script>alert('Registrasi sukses!');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    return;
  } else {
    // Registrasi gagal
    echo "<script>alert('Registrasi gagal: " . $conn->error . "');</script>";
  }

  $conn->close();
}

// Cek apakah form sign up sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  // Panggil fungsi registerUser
  registerUser($name, $email, $pass);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Sign up</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #F9F9F9;
        }

        .card-transparent {
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            color: #363636;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .form-group label {
            color: #363636;
            font-weight: bold;
        }

        .form-control {
            border-color: #363636;
        }

        .btn-primary {
            background-color: #2525e8;
            border-color: #2525e8;
        }

        .btn-primary:hover {
            background-color: #672af5;
            border-color: #672af5;
        }

        .text-center a {
            color: #2525e8;
            font-weight: bold;
        }
        .text-center a:hover {
            color: #672af5;
            font-weight: bold;
        }

        .input-group-append .btn {
            background-color: #363636;
            border-color: #363636;
            color: #F9F9F9;
        }

        .input-group-append .btn:hover {
            background-color: #2C2C2C;
            border-color: #2C2C2C;
        }
        
    </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-transparent" style="border-radius: 20px;">
          <div class="card-body">
            <h1 class="card-title text-center">Sign Up</h1>
            <form method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <div class="input-group">
      <input type="password" id="pass" name="pass" class="form-control" required onkeyup="checkPasswordStrength()">
      <div class="input-group-append">
        <button type="button" id="togglePassword" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
          <i id="toggleIcon" class="bi bi-eye-fill"></i>
        </button>
      </div>
    </div>
    <small id="passwordStrength" class="form-text text-muted"></small>
    <div class="password-strength-icons">
      <i id="passwordIcon1" class="bi bi-dash password-icon-lg" style="font-size: 30px;"></i>
      <i id="passwordIcon2" class="bi bi-dash password-icon-lg" style="font-size: 30px;"></i>
      <i id="passwordIcon3" class="bi bi-dash password-icon-lg" style="font-size: 30px;"></i>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Sign up</button>
</form>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Log in</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("pass");
    var toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("bi-eye-fill");
      toggleIcon.classList.add("bi-eye-slash-fill");
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("bi-eye-slash-fill");
      toggleIcon.classList.add("bi-eye-fill");
    }
  }
  function checkPasswordStrength() {
    var passwordInput = document.getElementById("pass");
    var passwordStrength = document.getElementById("passwordStrength");
    var passwordIcon1 = document.getElementById("passwordIcon1");
    var passwordIcon2 = document.getElementById("passwordIcon2");
    var passwordIcon3 = document.getElementById("passwordIcon3");

    var password = passwordInput.value;
    var hasUppercase = /[A-Z]/.test(password);
    var hasNumber = /\d/.test(password);
    var hasSymbol = /[^a-zA-Z\d]/.test(password);

    if (hasUppercase && hasNumber && hasSymbol) {
      passwordStrength.innerHTML = "Kekuatan Password: Sangat Kuat";
      passwordStrength.style.color = "green";
      passwordIcon1.style.color = "green";
      passwordIcon2.style.color = "green";
      passwordIcon3.style.color = "green";
    } else if (hasUppercase || hasNumber || hasSymbol) {
      passwordStrength.innerHTML = "Kekuatan Password: Kuat";
      passwordStrength.style.color = "yellow";
      passwordIcon1.style.color = "yellow";
      passwordIcon2.style.color = "yellow";
      passwordIcon3.style.color = "grey";
    } else {
      passwordStrength.innerHTML = "Kekuatan Password: Lemah";
      passwordStrength.style.color = "red";
      passwordIcon1.style.color = "red";
      passwordIcon2.style.color = "grey";
      passwordIcon3.style.color = "grey";
    }
  }
</script>

</body>
</html>