<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
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
            <h1 class="card-title text-center">Login</h1>
            <form method="post">
                <?php
                session_start();

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

                // Fungsi untuk melakukan login
                function login($email, $pass)
                {
                  $conn = connectDB();

                  // Escape input untuk mencegah SQL injection
                  $email = $conn->real_escape_string($email);
                  $pass = $conn->real_escape_string($pass);

                  // Query untuk memeriksa email dan pass
                  $sql = "SELECT * FROM signup WHERE email='$email' AND pass='$pass'";
                  $result = $conn->query($sql);

                  if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();

                    // Set session user
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['isLoggedIn'] = true;

                    // Redirect ke halaman setelah login sukses
                    header("Location: index.php");
                    exit();
                  } else {
                    // Jika login gagal, tampilkan pesan error
                    $error = "<script>alert('Email/Password yang anda masukkan salah!');</script>";
                    return $error;
                  }

                  $conn->close();
                }

                // Cek apakah form login sudah disubmit
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $email = $_POST["email"];
                  $pass = $_POST["pass"];

                  // Panggil fungsi login
                  $error = login($email, $pass);

                  // Jika ada error, tampilkan pesan error
                  if ($error) {
                    echo $error;
                  }
                }
                ?>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="pass">Password</label>
                  <div class="input-group">
                    <input type="password" id="pass" name="pass" class="form-control" required>
                    <div class="input-group-append">
                      <button type="button" id="togglePassword" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                        <i id="toggleIcon" class="bi bi-eye-fill"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
            <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign up</a></p>
            <p class="text-center mt-3"><a href="forgot.php">Forgot password? </a></p>
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
</script>

</body>
</html>