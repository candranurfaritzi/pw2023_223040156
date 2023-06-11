<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4b</title>
</head>
<body>
    <?php 
    
    $hwLama = ["Motherboard", "processor", "Hard Disk", "PC Coller", "VGA Card", "SSD" ];
    
    ?>

    <h3>Macam-Macam perangkat keras komputer</h3>
    <ol>
        <?php foreach ($hwLama as $hw) : ?>
                <li>
                    <?= "$hw"; ?>
                </li>
        <?php endforeach ?>
    </ol>

    <?php 
    
    $hwLama[] = "Card Reader";
    $hwLama[] = "Modem";
    sort($hwLama);
    ?>
    <h3>Macam-Macam perangkat keras komputer baru</h3>
    <ol>
    <?php foreach ($hwLama as $hw) : ?>
                <li>
                    <?= "$hw"; ?>
                </li>
        <?php endforeach ?>
    </ol>
</body>
</html>