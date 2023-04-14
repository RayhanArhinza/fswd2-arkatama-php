<?php
$nama = "Rayhan Saneval Arhinza";
$tanggal_lahir = "Surabaya, 3 Desember 2001";
$alamat = "Jl. Rungkut Lor X No. 75A, Surabaya";
$pendidikan = 'Universitas Pembangunan Nasional "Veteran" Jawa Timur';
$hobi = "Menggambar dan bermain game";
$email = "rayhanjr1927@gmail.com";
$phone = "08912345678";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-s5tr5R5U5EoOv+c3q4+j2U6XatFkFKGdWIjFZ1JiMSHcVD04hnf2IOx+0m03hflHmXrqe17pLl0gGwZ1hLOc6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        footer {
            background-color: #f2f2f2;
            padding: 30px 0;
        }

        footer h4 {
            margin-bottom: 20px;
            color: #333;
        }

        footer p {
            color: #666;
        }

        footer a.fa {
            padding: 10px;
            font-size: 20px;
            text-decoration: none;
            color: #666;
        }

        footer a.fa:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <header class="py-3" id="home">
        <nav class="navbar bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rayhan Saneval Arhinza</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header d-flex align-items-center">
                        <h5 class="offcanvas-title text-center mx-auto" id="offcanvasNavbarLabel">Rayhan Saneval Arhinza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#profile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="py-3" id="profile">
        <div class="container">
            <div class="row mt-4 d-flex justify-content-center">
                <img src="assets/profil.jpg" alt="" style="width: 300px; height: 300px; border-radius:50%;">
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <h3 class="d-flex justify-content-center">Biodata Diri</h3>
                <p class="d-flex justify-content-center">Nama: <?php echo $nama; ?></p>
                <p class="d-flex justify-content-center">Tempat, Tanggal Lahir: <?php echo $tanggal_lahir; ?></p>
                <p class="d-flex justify-content-center">Alamat: <?php echo $alamat; ?></p>
                <p class="d-flex justify-content-center">Pendidikan: <?php echo $pendidikan; ?></p>
                <p class="d-flex justify-content-center">Hobi: <?php echo $hobi; ?></p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container" id="about">
            <div class="row">
                <div class="col-md-4">
                    <h4>About Us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac enim ut lorem ultrices auctor.</p>
                </div>
                <div class="col-md-4">
                    <h4>Contact Us</h4>
                    <p><?php echo $alamat; ?></p>
                    <p>Email: <?php echo $email; ?></p>
                    <p>Phone: <?php echo $phone; ?></p>
                </div>
                <div class="col-md-4">
                    <h4>Follow Us</h4>
                    <a href="#" class="bi bi-github" style="font-size:30px; color:black; padding: 10px;"></a>
                    <a href="#" class="bi bi-instagram" style="font-size:30px; color:black; padding: 10px;"></a>
                    <a href="#" class="bi bi-whatsapp" style="font-size:30px; color:black; padding: 10px;"></a>
                    <a href="#" class="bi bi-line" style="font-size:30px; color:black; padding: 10px;"></a>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>