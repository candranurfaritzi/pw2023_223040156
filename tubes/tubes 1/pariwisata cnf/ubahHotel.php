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

if (isset($_POST['ubah'])) {
    if (ubahHotel($_POST) > 0) {
        echo "
        <script>
            alert('data hotel berhasil diubah');
            window.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data hotel berhasil diubah');
            window.location.href = 'admin.php';
        </script>
        ";
    }
}

$id = $_GET['id'];

$turis = query("SELECT * FROM turis WHERE id = $id")[0];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="btn btn-secondary" onclick="history.back();">Back</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-login mt-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $turis['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $turis['gambar']; ?>">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar :</label>
                            <img src="img/uploaded/<?= $turis['gambar']; ?>" alt="<?= $turis['gambar']; ?>" width="250" class="rounded">
                            <input type="file" name="gambar" id="gambar" class="form-control mt-2" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi :</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" autocomplete="off" required placeholder="Lokasi" value="<?= $turis['lokasi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="hotel" class="form-label">Hotel :</label>
                            <input type="text" name="hotel" id="hotel" class="form-control" autocomplete="off" required placeholder="hotel" value="<?= $turis['hotel']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga :</label>
                            <textarea type="text" name="harga" id="harga" class="form-control" autocomplete="off" required placeholder="Harga" rows="5"><?= $turis['harga']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="max" class="form-label">Max Orang :</label>
                            <textarea type="text" name="max" id="max" class="form-control" autocomplete="off" required placeholder="max orang" rows="5"><?= $turis['max']; ?></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>