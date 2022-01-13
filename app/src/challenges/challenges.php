<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="challenges.css" rel="stylesheet">
    <title>DidIt</title>
</head>

<?php include("../header/header.html") ?>

<body>

<br>
<div class="container-fluid" style="overflow-y: scroll;">
    <?php
    $file = file_get_contents("Challenges.json");
    $values = json_decode($file, true);

    foreach ($values[$_GET["community"]] as $value) {
        echo "<div style=\"background-color: #ffc600; margin-bottom: 15px; \"><table style='margin-left: 20px; margin-right: 20px;'><tr>";
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

        echo "<tr><td>" . $value['description'] . "</td></tr></table></div>";
    }
    ?>
</div>

<footer class="bg-transparent">
    <div class="container text-center">
        <a id="plus_button" class="btn btn-warning btn-lg" role="button" href="add_challenge.php?community=<?php echo $_GET["community"]?>">
            <i class="fa fa-plus fa-align-center"></i>
        </a>
    </div>
</footer>

</body>

</html>
