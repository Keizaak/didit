<?php include("../header/header.html") ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="challenges.css" rel="stylesheet">
    <title>DidIt</title>
</head>

<body>

<div class="container-fluid" id="container">
    <?php
    $file = file_get_contents("challenges.json");
    $values = json_decode($file, true);

    foreach ($values[$_GET["community"]] as $value) {?>

    <div class="container-fluid" id="box_challenge">
        <div class="row">
            <div class="col">
                <img class='img rounded text-center custom-title-didit' style='border-radius: 50% !important; height: 150px !important; width: 150px !important; margin-left: 15px; margin-top: 15px;' src=<?php echo $value["image_url"]?>>
            </div>
            <div class="col text-center">
                <a href="../realisations/Realisations.php?challenge=<?php echo $value['title']?>&community=<?php echo $_GET["community"]?>&name=<?php echo $_GET["name"] ?>" style="text-decoration: None"><?php echo $value["title"] ?></a>
            </div>

            <div class="col"></div>

            <div class="col">
                <?php
                switch ($value['difficult']) {
                    case 1:
                        echo "<i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                        break;
                    case 2:
                        echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i>";
                        break;

                    case 3:
                        echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                        break;
                    default:
                        echo "<i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                        break;
                }
                ?>
            </div>
        </div>

        <div class="row">
            <p><?php echo $value['description'] ?></p>
        </div>
    </div>
    <br>

    <?php
    } ?>
</div>

<footer class="bg-transparent">
    <div class="container text-center">
        <a id="plus_button" class="btn btn-warning btn-lg" role="button"
           href="add_challenge.php?community=<?php echo $_GET["community"] ?>">
            <i class="fas fa-plus fa-align-center" id="plus_icon"></i>
        </a>
    </div>
</footer>

</body>

</html>
