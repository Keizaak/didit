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
        <div style="overflow-y: scroll; height:400px;">
            <?php
            $ressource = fopen('Communities.json', 'r');
            $content= fread($ressource, filesize('Communities.json'));
            $values=json_decode($content, true);
            foreach ($values['communities'] as &$value) {
                echo "<img class='img rounded custom-title-didit' src='".$value['image_url']."'><br>";
                echo "<a href=../challenges/challenges.php?community=".$value['title'].">".$value['title']."<br>".$value['description']."</a><br>";
            }
            ?>
        </div>
    </table>

</body>
</html>
