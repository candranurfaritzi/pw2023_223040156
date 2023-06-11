<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    echo "
    <script>
        alert('Anda Harus login Terlebih dahulu !');
        alert('Silahkan Login !');
        window.location.href = 'login.php';
    </script>
    ";
	// header("Location: login.php");
	// exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
    if (tambahFasli($_POST) > 0) {
        echo "
        <script>
            alert('data hotel berhasil ditambahkan');
            window.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data hotel berhasil ditambahkan');
            window.location.href = 'admin.php';
        </script>
        ";
    }
}

$users = query("SELECT * FROM user")[0];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Fasilitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="admin.php">Administrator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambahFasilitas.php">Tambah Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambahHotel.php">Tambah Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambahUser.php">Tambah User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">feedback</a>
                    </li>
                </ul>
                <div class="ms-auto">
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, Admin
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php?id=<?= $_SESSION['id']; ?>">Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-login mt-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar :</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" autocomplete="off" placeholder="Masukkan Gambar">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi :</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" autocomplete="off" required placeholder="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas :</label>
                            <input type="text" name="nama_fasilitas" id="fasilitas" class="form-control" autocomplete="off" required placeholder="fasilitas">
                        </div>
                        <div class="mb-3">
                            <label for="desk" class="form-label">Deskripsi :</label>
                            <textarea type="text" name="desk" id="desk" class="form-control" autocomplete="off" required placeholder="deskripsi" rows="5"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>