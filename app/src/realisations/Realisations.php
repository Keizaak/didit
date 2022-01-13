<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Realisations.css" rel="stylesheet">
    <title>DidIt</title>
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
    </script>
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1556817331/lightgallery-all.min.js"></script>
</head>

<?php include("../header/header.html") ?>

<body>
    <div class="page-content page-container" id="page-content">
        <div style="padding: 20px !important;" class="padding">
            <div style="max-width: 3000px !important;" class="row container d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h2 style="font-size: 60px;" class="text-center"><?php echo $_GET["challenge"] ?></h2>
                        <p style="font-size: 40px;" class="text-center"><?php echo $_GET["name"] ?></p>
                        <hr class="mt-2 mb-5">

                            <div id="lightgallery" class="row lightGallery">
                                <?php


                                $ressource = fopen('Realisations.json', 'r');
                                $content= fread($ressource, filesize('Realisations.json'));
                                $values=json_decode($content, true);


                                foreach ($values[$_GET["community"]] as &$value) {
                                    if ($value["title"] == $_GET["challenge"]) {
                                        foreach ($value["list"] as &$url) {
                                            if (strpos($url["url"], "MP4") !== false) { ?>
                                                <div class="d-block mb-4 h-100">
                                                    <iframe width="100%" height="600px" src="<?php echo $url["url"] ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            <?php } else { ?>
                                                <div class="image-tile d-block mb-4 h-100">
                                                    <img class="col" src="<?php echo $url["url"] ?>" alt="image small" style="width: 100%;">
                                                    <div class="demo-gallery-poster">
                                                        <!--<img src="http://www.urbanui.com/fily/template/images/lightbox/play-button.png" alt="image">-->
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="container text-center">
    <a id="plus_button" class="btn btn-warning btn-lg" role="button"
       href="add_realisation.php?challenge=<?php echo $_GET["challenge"]?>&community=<?php echo $_GET["community"]?>&name=<?php echo $_GET["name"]?>">
        <i class="fas fa-plus fa-align-center" id="plus_icon"></i>
    </a>
</div>
</html>
