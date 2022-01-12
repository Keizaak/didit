<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CommunitiesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>
<?php include("../header/header.html") ?>
<body>
    
    
    <table>
        <div style="overflow-y: scroll;">
            <?php
            $ressource = fopen('Communities.json', 'r');
            $content= fread($ressource, filesize('Communities.json'));
            $values=json_decode($content, true);
            foreach ($values['communities'] as &$value) {
                echo "<div style=\"background-color: #ffc600; margin-bot: 5px;\">";
                echo "<img class='img rounded custom-title-didit' src='".$value['image_url']."'><br>";
                echo "<a href=../challenges/challenges.php?community=".$value['title'].">".$value['title']."<br>".$value['description']."</a><br>";
                echo "</div>";
            }
            ?>
        </div>
    </table>

</body>
</html>
