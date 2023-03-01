<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1c</title>
    <style>
        .kotak1{
            height: 80px;
            width: 80px;
            background-color: red;
            border: 2px solid black;
            text-align: center;
            line-height: 80px;
        }
        .kotak2{
            height: 80px;
            width: 80px;
            background-color: red;
            border: 2px solid black;
            text-align: center;
            line-height: 80px;
            float: left;
        }
        .kotak3{
            height: 80px;
            width: 80px;
            background-color: red;
            border: 2px solid black;
            text-align: center;
            line-height: 80px;
            float: left;
        }
        .clear{
            clear: left;
        }
    </style>
</head>
<body>
    <?php for ($kotak1 = 1; $kotak1 <= 1; $kotak1++) : ?>
        <div class="kotak1"><?php $kotak1 ?>1</div>
    <?php endfor ?>

    <?php for ($kotak2 = 1; $kotak2 <= 2; $kotak2++) : ?>
        <div class="kotak2"><?php $kotak2 ?>2</div>
    <?php endfor ?>

    <div class="clear"></div>

    <?php for ($kotak3 = 1; $kotak3 <= 3; $kotak3++) : ?>
        <div class="kotak3"><?php $kotak3 ?>3</div>
    <?php endfor ?>
</body>
</html>
