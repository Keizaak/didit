<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CommunitiesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>
<?php include("../header/header.html") ?>
<body>
    <div style="overflow-y: scroll; margin-top: 45px;">
        <?php
        $ressource = fopen('Communities.json', 'r');
        $content= fread($ressource, filesize('Communities.json'));
        $values=json_decode($content, true);
        foreach ($values['communities'] as &$value) {
            echo "<div style=\"background-color: #ffc600; margin-bottom: 15px; \"><table><tr>";
            echo "<td style='width: 300px;'><img style='border-radius: 50% !important; height: 250px !important; width: 250px !important; margin-left: 15px;' class='img rounded custom-title-didit' src='".$value['image_url']."'></td>";
            echo "<td><a style='text-decoration : None;' href=../challenges/challenges.php?community=".$value['title']."><div style='font-weight: bold; margin-top: 20px; margin-bottom: 40px;'>".$value['title']."</div style='font-size: 12px;'><br><div style='margin-bottom: 20px;'>".$value['description']."</div></a></td>";
            echo "</tr></table></div>";
        }
        ?>
    </div>
</body>
</html>
