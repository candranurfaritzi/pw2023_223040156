<?php 

session_start();

require 'functions.php';

if(isset($_POST['pesan'])){
    if(pesanHotel($_POST) > 0){
        echo "
        <script>
            alert('Hotel telah di pesan');
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Hotel gagal di pesan');
        </script>
        ";
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
	<link rel="stylesheet" href="pesanhotel.css">
	<style>
	</style>
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<div class="card-3d-wrap mx-auto">
                        <label for="reg-log"></label>
						<div class="card-3d-wrapper">
                            <div class="card-front"></div>
                                <div class="card-back"></div>
									<div class="center-wrap">
										<div class="section text-center">
											<form action="" method="post">
												<h4 class="mb-3 pb-3">Pesan Hotel</h4>
												<div class="form-group">
													<input type="text" class="form-style" placeholder="Nama lengkap" name="nama">
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group mt-2">
													<input type="email" class="form-style" placeholder="Email" name="email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="tel" class="form-style" placeholder="nomor hanphone" name="telepon">
													<i class="input-icon uil uil-phone-alt"></i>
												</div>
												<div class="form-group mt-2">
													<input type="kapasitas" class="form-style" placeholder="kapasitas" name="kapasitas">
													<i class="input-icon uil uil-person-alt"></i>
												</div>
												<input type="hidden" name="role" value="user">
												<button type="submit" class="btn mt-4" name="pesan">Pesan</button>
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

    <!--Javascript -->
    <script src="js/main.js"></script>
</body>

</html>