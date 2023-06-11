<?php

require '../functions.php';

$keyword = $_GET["keyword"];

$faslitas = "SELECT * FROM fasilitas
            WHERE
          lokasi LIKE '%$keyword%' OR
            nama_fasilitas LIKE '%$keyword%' OR
           deskripsi LIKE '%$keyword%'
        ";

$turis = "SELECT * FROM turis
            WHERE
            lokasi LIKE '%$keyword%' OR
            hotel LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            max LIKE '%$keyword%'
            ";

$user = "SELECT * FROM user
            WHERE
            username LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
            ";

$fasilitas = query($faslitas);
$turism = query($turis);
$users = query($user);

?>
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
              <?php foreach ($turism as $tur) : ?>
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