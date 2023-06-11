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
$_SESSION = array();
session_unset();
session_destroy();

header("Location: index.php");
exit;

?>