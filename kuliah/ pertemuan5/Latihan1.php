<?php
//ARRAY
//membuat array
$hari = array('senin', 'selasa', 'rabu');
$bulan = ['januari', 'februari', 'maret'];
$myarray = ['candra',19, false];
$binatang =['🦨','🐂','🦧','🐫'];

//mencetak array
//
echo $hari[1];
echo '<br>';
echo $binatang[3];
echo '<br>';

//mencetak seluruh isi array
//var_dump,print_r
var_dump($hari);
echo'<br>';
print_r($bulan);
echo'<br>';
var_dump($myarray);
echo'<br>';
print_r($binatang);
echo'<hr>';

//manipulasi array
//menggunakan index
$hari[3] = 'kamis';
print_r($hari);
echo '<br>';
//menambahkan element di akhir dengan menggunakan index
$hari[]="jum'at";
$hari[]='sabtu';
print_r($hari);
echo '<br>';

//menambahkan element di akhir menggunakan array_push
array_push($bulan, 'april');
print_r($bulan);

