<?php
require('functions.php');

$title = 'Form tambah data';

//insert data ketika tombol tambah diklik
if(isset($_POST['tambah'])){
  //cek jika data 
  if(tambah($_POST) > 0){
    echo "<script>
            alert('data berhasil ditambah')
            documnet.location.href ='index.php';
            </script>";
  }
}

require('views/tambah.view.php');

