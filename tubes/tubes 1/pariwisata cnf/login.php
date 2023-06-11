<?php

session_start();

require 'functions.php';

$conn = koneksi();

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

	if (mysqli_num_rows($query) === 1) {
		$row = mysqli_fetch_assoc($query);
		if (password_verify($password, $row['password'])) {
			$_SESSION['login'] = true;
			$_SESSION['id'] = $row['id'];
			$_SESSION['role'] = $row['id_role'];

			if ($_SESSION['role'] == 1) {
				echo "
				<script>
					alert('Anda berhasil login');
					window.location.href = 'admin.php';
				</script
				";
			}

			if ($_SESSION['role'] == 2) {
				echo "
				<script>
					alert('Anda berhasil login');
					window.location.href = 'index.php';
				</script
				";
			}

			echo "
				<script>
					alert('Anda berhasil login');
					window.location.href = 'index.php';
				</script
				";
			// header("Location: index.php");
			// exit;
		}
	}
	$error = true;
}

if (isset($_POST['register'])) {
	// var_dump($_POST);die;
	if (register($_POST) > 0) {
		echo "
			<script>
				alert('Anda berhasil mendaftar');
				alert('Silahkan login!');
				window.location.href='login.php';
			</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<title>CNF travel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="login-style.css">
	<style>
	</style>
</head>

<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<form action="" method="post">
												<?php if (isset($error)) : ?>
													<p class="text-danger bg-white rounded"><em>Email / Password Salah !</em></p>
												<?php endif; ?>
												<h4 class="mb-4 pb-3">Log In</h4>
												<div class="form-group">
													<input type="email" class="form-style" placeholder="Email" name="email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" class="form-style" placeholder="Password" name="password">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" class="btn mt-4" name="login">Login</button>
												<p class="mb-0 mt-4 text-center"><a href="/index.php" class="link">Forgot your password?</a></p>
											</form>
										</div>
									</div>
								</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<form action="" method="post">
												<h4 class="mb-3 pb-3">Sign Up</h4>
												<div class="form-group">
													<input type="text" class="form-style" placeholder="Full Name" name="regnama">
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group mt-2">
													<input type="email" class="form-style" placeholder="Email" name="regmail">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" class="form-style" placeholder="Password" name="regpassword">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" class="form-style" placeholder="Password Repeat" name="regpassword2">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<input type="hidden" name="role" value="user">
												<button class="btn mt-4" name="register">Register</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>