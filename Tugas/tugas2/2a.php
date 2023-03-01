<?php
    
    $namaDepan = "Aldi";
    $namaBelakang = "Pratama";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2a</title>
</head>
<body>

    <?php for ($i=1; $i<=100; $i++) : ?>
        <?php if ($i % 3 == 0 && $i % 5 == 0) : ?>
            <p><?= "$namaDepan $namaBelakang" ?></p>
        <?php elseif ($i % 3 == 0) : ?>
            <p><?= $namaDepan ?></p>
        <?php elseif ($i % 5 == 0) : ?>
            <p><?= $namaBelakang ?></p>
        <?php else : ?>
            <p><?= $i ?></p>
        <?php endif ?>
    <?php endfor ?>
    
</body>
</html>