<?php

session_start();

require 'functions.php';

$fasilitas = query("SELECT * FROM fasilitas");

if (isset($_POST["cari"])) {
    $fasilitas = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>CNF travel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Pariwisata</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="hotel.php" class="nav-item nav-link">Hotel</a>
                    <a href="fasilitas.php" class="nav-item nav-link">Fasilitas</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu m-0">
                        </div>
                    </div>
                </div>
                <?php if (!isset($_SESSION['login'])) : ?>
                    <a href="login.php" class="btn btn-primary rounded-pill py-2 px-4">Login</a>
                <?php else : ?>
                    <a href="logout.php" class="btn btn-danger rounded-pill py-2 px-4" onclick="return confirm('Yakin Ingin Logout');">Logout</a>
                <?php endif; ?>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Nikmati Liburan Di Pantai Pangandaran</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item text-white active" aria-current="text-primary">Jika Anda mencari pengalaman liburan yang sempurna dengan kenangan untuk dikenang, Anda berada di tempat yang tepat. Mari rencanakan masa liburan dan masa inap yang masuk akal untuk Anda.
                                </li>
                            </ol>
                            <p class="fs-4 text-white mb-4 animated slideInDown"></p>
                            <div class="position-relative w-75 mx-auto animated slideInDown">
                                <form action="" method="post">
                                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Search" name="keyword" autofocus autocomplete="off">
                                    <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" name="cari" style="margin-top: 7px;">Search</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Home -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-60 h-60" src="img/about.jpg" alt="" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h6 class="section-title bg-white text-start text-primary pe-3"></h6>
                        <h1 class="mb-4">Rasakan Kehidupan Di <span class="text-primary">Pantai Pangandaran</span></h1>
                        <p class="mb-4">Kami akan membantu Anda mengalami kehidupan di pantai pangandaran dalam arti sebenarnya. Dari tinggal di antara penduduk hingga makan makanan lezat otentik, Anda pasti akan pulang dengan kenangan dan momen indah.</p>
                        <p class="mb-4">Dikelilingi oleh keindahan pemandangan dan tempat-tempat wisata yang menarik, kami membuatnya nyaman bagi Anda untuk mengunjungi semua tempat indah dengan panduan internal kami. Kami juga dapat membantu Anda mengatur fasilitas transportasi untuk perjalanan yang lebih mudah ke tempat-tempat terdekat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home -->


    <!-- Fasilitas -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Fasilitas</h1>
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item text-black active" aria-current="page">
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach ($fasilitas as $fasli) : ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <a href="deskripsi.php">
                                    <img class="img-fluid" src="img/uploaded/<?= $fasli['gambar']; ?>" alt="">
                                </a>
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><a href="deskripsi.php"><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $fasli['nama_fasilitas']; ?>,<?= $fasli['lokasi']; ?></a></small>
                            </div>
                            <div class="text-center p-4">
                                <div class="d-flex justify-content-center mb-4">
                                    <a href="deskripsi.php?id=<?= $fasli['id'] ?>" class="btn btn-primary rounded-pill py-1 px-3">Lihat Deskripsi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Fasilitas -->

    <!-- Galeri -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Gallery kami</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden">
                                <img class="img-fluid" src="img/destination-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden">
                                <img class="img-fluid" src="img/destination-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden">
                                <img class="img-fluid" src="img/destination-3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/destination-4.jpg" alt="" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Galeri -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Hubungi kami</h4>
                    <h4 class="text-white mb-3">CV.myPangandaran</h4>
                    <a class="text-white">Divisi travel</a>
                    <a class="text-white">Jl. raya babakan pangandaran KM.1</a>
                    <a class="text-white">Pangandaran - Kab Pangandaran</a>
                    <a class="text-white">Contact:0265-639380</a>
                    <a class="text-white">Email:tour@mypangandaran.com</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Tentang kami</h4>
                    <p class="mb-2"><i class=""></i>Destinasi wisata</p>
                    <p class="mb-2"><i class=""></i>Daftar client</p>
                    <p class="mb-2"><i class=""></i>Testimonial</p>
                    <p class="mb-2"><i class=""></i>Photo galery</p>
                    <div class="d-flex pt-2">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/destination-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-7.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-12.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/destination-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/destination-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/destination-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Sosial media</h4>
                    <p></p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <a class="btn btn-outline-btn-social" href="https://twitter.com/mypangandaran"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-btn-social" href="https://www.facebook.com/mypangandarancom/?locale=id_ID"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-btn-social" href="https://www.instagram.com/mypangandaran/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-btn-social" href="https://www.youtube.com/channel/UC_UuqM0w83cQazLwc9VB3yA"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>