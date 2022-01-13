<?php include("../header/header.html") ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="communities.css" rel="stylesheet">

    <title>DidIt</title>

    <script>
        window.onload = function() {
            window.scrollTo(0, 0);
        }
    </script>
</head>
<body>

<div class="container-fluid" id="container_community">
    <?php
    $file = file_get_contents("communities.json");
    $values = json_decode($file, true);

    foreach ($values["communities"] as $value) {
    ?>
    <a href="../challenges/challenges.php?community=<?php echo $value["title"];?>&name=<?php echo $value["name"];?>">
        <div class="container-fluid" id="box_community">
            <div class="row">
                <div class="col-md-4 ml-md-5 mr-md-5">
                    <img class='img custom-title-didit' style='border-radius: 50%; !important; height: 250px; !important; width: 250px; !important; margin-top: 10%; margin-bottom: 10%' src=<?php echo $value["image_url"]?>>
                </div>

                <div class="col">
                        <h2><b>d/<?php echo $value["name"];?></b></h2>
                        <p><?php echo $value["description"]?></p>
                </div>
            </div>
        </div>
    </a>
    <br>
    <?php
    }
    ?>
</div>

</body>
</html>