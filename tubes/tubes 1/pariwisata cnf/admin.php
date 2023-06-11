<?php

session_start();
if ($_SESSION['role'] === 'admin')
  if (!isset($_SESSION["login"])) {
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

$turis = query("SELECT * FROM turis ORDER BY id DESC");
$fasilitas = query("SELECT * FROM fasilitas ORDER BY id DESC");
$users = query("SELECT * FROM user ORDER BY id DESC");
$pesanHotel = query("SELECT * FROM pesanHotel ORDER BY id DESC");

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('#keyword').on('keyup', function() {
        $.get('ajax/search.php?keyword=' + $('#keyword').val(), function(data) {
          $('#content').html(data);
        });
      });
    });
  </script>
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
            <a class="nav-link active" aria-current="page" href="admin.php">Dashboard</a>
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
                <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin Ingin Logout');">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <form action="" method="post">
    <div class="input group my-3">
      <input type="text" class="form-control" placeholder="search" name="keyword" id="keyword" size="100" autofocus autocomplete="off">
    </div>
  </form>
  <div id="content">
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
          <h1>Data Fasilitas</h1>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">gambar</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($fasilitas as $fasli) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><img src="img/uploaded/<?= $fasli['gambar']; ?>" alt="<?= $fasli['gambar']; ?>" width="100"></td>
                  <td><?= $fasli['lokasi']; ?></td>
                  <td><?= $fasli['nama_fasilitas']; ?></td>
                  <td><?= substr_replace($fasli['deskripsi'], '...', 100); ?></td>
                  <td>
                    <a href="ubahFasilitas.php?id=<?= $fasli['id']; ?>" class="btn btn-secondary m-2">Ubah</a>
                    <a href="hapus.php?id=<?= $fasli['id']; ?>" class="btn btn-danger m-2">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
          <h1>Data Hotel</h1>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">gambar</th>
                <th scope="col">lokasi</th>
                <th scope="col">hotel</th>
                <th scope="col">harga</th>
                <th scope="col">maximal menginap</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($turis as $tur) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><img src="img/uploaded/<?= $tur['gambar']; ?>" alt="<?= $tur['gambar']; ?>" width="100"></td>
                  <td><?= $tur['lokasi']; ?></td>
                  <td><?= $tur['hotel']; ?></td>
                  <td><sup>Rp. </sup><?= number_format($tur['harga'], 2, ',', '.'); ?></td>
                  <td><?= $tur['max']; ?> orang</td>
                  <td>
                    <a href="ubahHotel.php?id=<?= $tur['id']; ?>" class="btn btn-secondary m-2">Ubah</a>
                    <a href="hapus.php?id=<?= $tur['id']; ?>" class="btn btn-danger m-2">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
          <h1>Data User</h1>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $user['username']; ?></td>
                  <td><?= $user['email']; ?></td>
                  <td>
                    <input type="password" name="password" id="password" disabled value="<?= $user['password']; ?>">
                  </td>
                  <td><?= $user['role']; ?></td>
                  <td>
                    <a href="ubahUsers.php?id=<?= $user['id']; ?>" class="btn btn-secondary m-2">Ubah</a>
                    <a href="hapus.php?id=<?= $user['id']; ?>" class="btn btn-danger m-2">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
          <h1>Data Pesan Hotel</h1>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">telepon</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pesanHotel as $pesan) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $pesan['nama']; ?></td>
                  <td><?= $pesan['email']; ?></td>
                  <td><?= $pesan['telepon']; ?></td>
                  <td><?= $pesan['kapasitas']; ?></td>
                  <td>
                    <a href="hapus.php?id=<?= $pesan['id']; ?>" class="btn btn-danger m-2">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>