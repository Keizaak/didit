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
            echo "<div style=\"background-color: #ffc600; margin-bottom: 15px; height: 300px; width: 300px;\"><table><tr>";
            echo "<td><img style='border-radius: 50% !important; height: 250px !important; width: 250px !important;' class='img rounded custom-title-didit' src='".$value['image_url']."'></td>";
            echo "<td><a href=../challenges/challenges.php?community=".$value['title'].">".$value['title']."<br>".$value['description']."</a><br></td>";
            echo "</tr></table></div>";
        }
        ?>
    </div>
</body>
</html>
