<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Realisations.css" rel="stylesheet">
    <title>DidIt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>

<?php include("../header/header.html") ?>

<body>
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php echo $_GET["name"] ?></h2>
                <p class="text-center"><?php echo $_GET["challenge"] ?></p>
            </div>
            <div class="row photos">

        <?php
        $ressource = fopen('Realisations.json', 'r');
        $content= fread($ressource, filesize('Realisations.json'));
        $values=json_decode($content, true);


        foreach ($values[$_GET["community"]] as &$value) {
            if ($value["title"] == $_GET["challenge"]) {
                foreach ($value["list"] as &$url) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="<?php echo $url["url"] ?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo $url["url"] ?>"></a></div>
                <?php
                }
            }
        }
        ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>
