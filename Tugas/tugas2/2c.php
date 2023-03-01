<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2c</title>
    <style>
        .kotak{
            height: 80px;
            width: 80px;
            background-color: salmon;
            border: 2px solid black;
            line-height: 80px;
            text-align: center;
        }
        .no{
            display: flex;
        }
    </style>
</head>
<body>
    <?php for ($i=11; $i>0; $i--) : ?>
        <div class="no">
            <?php for ($o=1; $o < $i; $o++) :?>
                <div class="kotak"><?= $o ?></div>
            <?php endfor ?>
        </div>
    <?php endfor ?>
    
</body>
</html>