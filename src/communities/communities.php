<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CommunitiesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>
<header>
    <h2 style="text-align: center;">Community list</h2>
</header>
<body>
    <?php include("header/header.html") ?>
    
    <table>
        <div style="overflow-y: scroll; height:400px;">
            <?php
            $ressource = fopen('Communities.json', 'r');
            $content= fread($ressource, filesize('Communities.json'));
            $values=json_decode($content, true);
            foreach ($values['communities'] as &$value) {
                echo "<a href=../challenges/challenges.php?community=".$value['title'].">".$value['title']."<br>".$value['description']."</a><br>";
            }
            ?>
        </div>
    </table>

</body>
</html>
