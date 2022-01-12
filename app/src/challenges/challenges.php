
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="ChallengesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>

<?php include("../header/header.html") ?>

<body>
    <div style="overflow-y: scroll; height:400px;">
        <?php
        $ressource = fopen('Challenges.json', 'r');
        $content= fread($ressource, filesize('Challenges.json'));
        $values=json_decode($content, true);

        echo "<div style=\"background-color: #ffc600; margin-bottom: 15px; \"><table><tr>";
        foreach ($values[$_GET["community"]] as &$value) {
            echo "<td><a href=# >" . $value['title'] . "</a></td><td><div>";
            switch ($value['difficult']) {
                case 1:
                    echo "★☆☆";
                    break;
                case 2:
                    echo "★★☆";
                    break;

                case 3:
                    echo "★★★";
                    break;
                default:
                    echo "☆☆☆";
                    break;
            }
            echo "</div></td>";
        }
        echo "</tr><tr>" . $value['description'] . "</table></div>";
        ?>
    </div>
</body>

</html>
