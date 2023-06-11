<?php 
session_start();

require 'functions.php';

$turis = query("SELECT * FROM turis");

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="hotel.php" class="nav-item nav-link active">Hotel</a>
                    <a href="fasilitas.php" class="nav-item nav-link">Fasilitas</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu m-0">
                        </div>
                    </div>
                    </a>
                </div>
                <?php if (!isset($_SESSION['login'])) : ?>
                    <a href="login.php" class="btn btn-primary rounded-pill py-2 px-4">Login</a>
                <?php else : ?>
                    <a href="logout.php" class="btn btn-danger rounded-pill py-2 px-4">Logout</a>
                <?php endif; ?>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Hotel</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item text-white active" aria-current="page">Jika Anda mencari rumah yang jauh dari rumah, masuk saja ke sini. Anda bisa mendapatkan keduanya, pengalaman yang luar biasa dan santai saat Anda sedang berlibur. Lihat lebih dekat kamar yang kami tawarkan dan pilih yang cocok untuk Anda.</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Hotel -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Datang & Menginap Bersama Kami</h1>
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item text-black active" aria-current="page">Pilih salah satu kamar hotel pilihan kami untuk merasakan dekorasi yang menyenangkan, dilengkapi dengan fasilitas modern untuk masa inap yang nyaman.
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach($turis as $hotel): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/uploaded/<?= $hotel['gambar']; ?>" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $hotel['lokasi']; ?></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?= $hotel['max']; ?></small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">Rp. <?= number_format($hotel['harga'], 2, ',', '.'); ?>
                            </h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="pesanHotel.php?id=<?= $hotel['id'] ?>" class="btn btn-primary rounded-pill py-1 px-3">Pesan sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Hotel -->

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