<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="challenges.css" rel="stylesheet">
    <title>DidIt</title>
</head>

<?php include("../header/header.html") ?>

<body>
    <div style="overflow-y: scroll;">
        <?php
        $ressource = fopen('Realisations.json', 'r');
        $content= fread($ressource, filesize('Realisations.json'));
        $values=json_decode($content, true);


        foreach ($values[$_GET["community"]] as &$value) {
            if ($value["title"] == $_GET["challenge"]) {
                echo "<table>";
                foreach ($value["list"] as &$url) {
                    echo "<tr><td><img style='border-radius: 50% !important; height: 250px !important; width: 250px !important;' class='img rounded custom-title-didit' src='".$url["url"]."'></td></tr>";
                }
                echo "</table>";
            }
        }

        ?>
    </div>
</body>

</html>
