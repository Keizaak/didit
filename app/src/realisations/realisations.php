<?php include("../header/header.html") ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="realisations.css" rel="stylesheet">
    <title>DidIt</title>
    <meta charset="utf-8">

    <script>
        window.onload = function() {
            window.scrollTo(0, 0);
        }
    </script>
</head>

<body>

<div class="container-fluid">
    <div class="col">
        <div class="row">
            <h2 class="text-center"><?php echo $_GET["challenge"] ?></h2>
        </div>
        <div class="row">
            <p class="text-center"><?php echo $_GET["name"] ?></p>
        </div>
        <hr>

        <?php
        $file = file_get_contents("realisations.json");
        $values=json_decode($file, true);

        foreach ($values[$_GET["community"]] as $value) {
            if ($value["title"] == $_GET["challenge"]) {
                foreach ($value["list"] as $url) {
                    echo "<div class='row'>";

                    if (strpos($url["url"], "mp4")) {
                        echo "<iframe src='" . $url["url"] . "' allowfullscreen></iframe>";
                    } else {
                        echo "<img src='" . $url["url"] . "'>";
                    }

                    echo "</div>";
                    echo "<br>";
                }
            }
        }
        ?>
    </div>
</div>

<footer class="bg-transparent">
    <div class="container text-center">
        <a id="plus_button" class="btn btn-warning btn-lg" role="button"
           href="add_realisation.php?challenge=<?php echo $_GET["challenge"]?>&community=<?php echo $_GET["community"]?>&name=<?php echo $_GET["name"]?>">
            <i class="fas fa-plus fa-align-center" id="plus_icon"></i>
        </a>
    </div>
</footer>

</body>

</html>
