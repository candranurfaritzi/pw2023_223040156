<?php
$x =10;

function cek_genap_ganjil($angka) {
    if($angka % 2 == 1){
        return "$angka adalah bilangan GANJIL";
    }else {
        return "$angka adalah bilangan GENAP!";
    } 
}

echo cek_genap_ganjil($x); // argument
echo '<br>';
echo cek_genap_ganjil(5);
echo '<br>';
echo cek_genap_ganjil(70);
