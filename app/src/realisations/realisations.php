<?php include("../header/header.html") ?>

<!DOCTYPE html>
<html lang="en">
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


                                $ressource = fopen('realisations.json', 'r');
                                $content= fread($ressource, filesize('realisations.json'));
                                $values=json_decode($content, true);


                                foreach ($values[$_GET["community"]] as &$value) {
                                    if ($value["title"] == $_GET["challenge"]) {
                                        foreach ($value["list"] as &$url) {
                                            if (strpos($url["url"], "MP4") !== false) { ?>
                                                <div class="d-block mb-4 h-100">
                                                    <iframe style="max-height: 3000px;" width="100%" height="1000px" src="<?php echo $url["url"] ?>" frameborder="0" allowfullscreen></iframe>
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
