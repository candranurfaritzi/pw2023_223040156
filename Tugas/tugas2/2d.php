<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2d</title>
    <style>
        .kotak{
            width: 500px;
            height: 500px;
        }
        .white{
            height: 100px;
            width: 100px;
            background-color: white;
            border: 2px solid black;
            display: inline-block;
            box-sizing: border-box;
            margin-top: -5px;
            margin-left: -5px;
        }
        .black{
            height: 100px;
            width: 100px;
            background-color: black;
            border: 2px solid black;
            display: inline-block;
            box-sizing: border-box;
            margin-top: -5px;
            margin-left: -5px;
        }
    </style>
</head>
<body>

    <div class="kotak">
        <?php for ($i=1; $i<=25; $i++) : ?>
            <?php if ($i % 2 == 0) : ?>
                <div class="white"></div>
            <?php else : ?>
                <div class="black"></div>
            <?php endif ?>
        <?php endfor ?>
    </div>
    
</body>
</html>