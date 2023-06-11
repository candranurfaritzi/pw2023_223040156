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
    if (ubahUsers($_POST) > 0) {
        echo "
        <script>
            alert('data user berhasil diubah');
            window.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data user berhasil diubah');
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
    <title>Ubah Data User</title>
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
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $users['id']; ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username :</label>
                            <input type="text" name="username" id="username" class="form-control" autocomplete="off" required placeholder="Lokasi" value="<?= $users['username']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <textarea type="email" name="email" id="email" class="form-control" autocomplete="off" required placeholder="Hotel" rows="5"><?= $users['email']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password :</label>
                            <textarea type="password" name="password" id="password" class="form-control" autocomplete="off" required placeholder="Hotel" rows="5"><?= $users['password']; ?></textarea>
                        </div>
                        <label for="role" class="form-label">Role :</label>
                            <select name="role" id="role" class="form-select w-25">
                                <option selected><?= $users['role']; ?></option>
                                <option value="user">User</option>
                                <option value="admin">admin</option>
                            </select>
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