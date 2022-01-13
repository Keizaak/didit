
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="ChallengesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>

<?php include("../header/header.html") ?>

<body>
    <div style="overflow-y: scroll;">
        <?php
        $ressource = fopen('Challenges.json', 'r');
        $content= fread($ressource, filesize('Challenges.json'));
        $values=json_decode($content, true);

        
        foreach ($values[$_GET["community"]] as &$value) {
            echo "<div style=\"background-color: #ffc600; margin-bottom: 15px; \"><table style='margin-left: 20px; margin-right: 20px;'><tr>";
            echo "<td style='width: 400px;'><img style='border-radius: 50% !important; height: 150px !important; width: 150px !important; margin-left: 15px; margin-top: 15px;' class='img rounded custom-title-didit' src='".$value['image_url']."'></td>";
            echo "<td><a href=# style='text-decoration : None;'><div style='font-weight: bold; margin-top: 20px; margin-bottom: 40px;'>" . $value['title'] . "</div></a></td><td><div style='color: red !important;'>";
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
            echo "</div></td></tr>";

            echo "<tr><td colspan=\"2\">" . $value['description'] . "</td></tr></table></div>";
        }
        ?>
    </div>
</body>

</html>
