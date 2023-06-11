<?php

function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', 'root', 'pariwisata');
    return $conn;
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);


  // cek dulu username 
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;
      $_SESSION['id']= $user['id'];
      // pembagian role
      if(
        $user['id_role']== 1){
          $_SESSION['role']= 'admin';
        }else{
          $_SESSION['role']= 'user';
        }
      header("Location: page.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}
function register($data)
{
    $conn = koneksi();
    $fullname = $data['regnama'];
    $email = $data['regmail'];
    $checkEmail = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $password = $data['regpassword'];
    $password2 = $data['regpassword2'];
    $role = '2';

    if (mysqli_fetch_row($checkEmail)) {
        echo "<script>alert('Email telah digunakan');alert('Silahkan coba dengan email lain');</script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>alert('Password tidak sesuai!');</script>";
        return false;
    }


    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user
				VALUES
			  (NULL, '$fullname', '$email', '$password', '$role')
			";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahHotel($data)
{
    $conn = koneksi();

    $lokasi = htmlspecialchars($data["lokasi"]);
    $hotel = htmlspecialchars($data["hotel"]);
    $harga = htmlspecialchars($data["harga"]);
    $max = htmlspecialchars($data["max"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO turis
				VALUES
			  (NULL, '$gambar', '$lokasi', '$hotel', '$harga', $max)
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function tambahUser($data)
{
    $conn = koneksi();
    $username = htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $role = $data['role'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user
				VALUES
			  (NULL, '$username', '$email', '$password', '$role')
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function tambahFasli($data)
{
    $conn = koneksi();
    $lokasi = htmlspecialchars($data['lokasi']);
    $namaFasli = htmlspecialchars($data['nama_fasilitas']);
    $desk = htmlspecialchars($data['desk']);
    $gambar = upload();

    $query = "INSERT INTO fasilitas
				VALUES
			  (NULL,'$lokasi', '$namaFasli', '$desk', '$gambar')
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 10000000) {
        echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/uploaded/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM turis WHERE id = $id");
    mysqli_query($conn, "DELETE FROM fasilitas WHERE id = $id");
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubahHotel($data)
{
    $conn = koneksi();

    $id = $data["id"];
    $lokasi = htmlspecialchars($data["lokasi"]);
    $hotel = htmlspecialchars($data["hotel"]);
    $harga = htmlspecialchars($data["harga"]);
    $max = htmlspecialchars($data["max"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE turis SET
				gambar = '$gambar',
				lokasi = '$lokasi',
        hotel = '$hotel',
				harga = '$harga',
				max = $max
			  WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubahFasli($data)
{
    $conn = koneksi();

    $id = $data["id"];
    $lokasi = $data['lokasi'];
    $fasilitas = htmlspecialchars($data["nama_fasilitas"]);
    $desk = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE fasilitas SET
                gambar = '$gambar',
                lokasi = '$lokasi',
				nama_fasilitas = '$fasilitas',
                deskripsi = '$desk'
			  WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubahUsers($data)
{
    $conn = koneksi();

    $id = $data["id"];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $password2 = $data['password2'];

    $query = "UPDATE turis SET
				username = '$username',
                email = '$email',
                password = '$password'
			  WHERE id = $id
			";

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM turis
				WHERE
			  lokasi LIKE '%$keyword%' OR
			  hotel LIKE '%$keyword%' OR
			  harga LIKE '%$keyword%' OR
			  max LIKE '%$keyword%'
			";
    return query($query);
}

function kontak($data){
    $conn = koneksi();
    $nama = $data['name'];
    $email = $data['email'];
    $judul = $data['judul'];
    $pesan = $data['pesan'];

    $query = "INSERT INTO contact
                VALUES
            (NULL, '$nama', '$email', '$judul', '$pesan')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function search($search){
  $query = "SELECT * FROM fasilitas WHERE nama_fasilitas LIKE '%$search%'";
    return query($query);         
}

function pesanHotel($data){
  $conn = koneksi();
  $nama = $data['nama'];
  $email = $data['email'];
  $telepon = $data['telepon'];
  $kapasitas = $data['kapasitas'];

  $query = "INSERT INTO pesanHotel VALUES (NULL, '$nama', '$email', '$telepon', $kapasitas)";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}