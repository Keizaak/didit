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

        <div style="max-width: 3000px !important;" class="container">

            <h1 class="fw-light text-center text-lg-start mt-4 mb-0"><?php echo $_GET["name"]." / ".$_GET["challenge"] ?></h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-start">

        <?php
        $ressource = fopen('Realisations.json', 'r');
        $content= fread($ressource, filesize('Realisations.json'));
        $values=json_decode($content, true);


        foreach ($values[$_GET["community"]] as &$value) {
            if ($value["title"] == $_GET["challenge"]) {
                foreach ($value["list"] as &$url) { ?>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="<?php echo $url["url"] ?>" alt="">
                        </a>
                    </div>
                <?php
                }
            }
        }
        ?>
            </div>

        </div>
    </div>

</body>

</html>
