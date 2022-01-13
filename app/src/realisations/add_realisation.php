<?php include("../header/header.html") ?>
<?php
if (isset($_FILES["photo"])) {
    $file = file_get_contents("Realisations.json");
    $array = json_decode($file, true);

    $new_realisation = array(


    );



    if (isset($_FILES["photo"])) {
        $file_path = "../../img/" . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path);
        $new_realisation["url"] = $file_path;
    } else {
        $new_realisation["url"] = "";
    }

    $i = 0;
    foreach ($array[$_GET["community"]] as $comm) {
        if ($comm["title"] == $_GET["challenge"]) {
            break;
        }
        $i = $i + 1;
    }

//    print_r($i);
//    exit();
    $array[$_GET["community"]][$i]["list"][] = $new_realisation;
    $json = json_encode($array);
    file_put_contents("Realisations.json", $json);

    header("Location: Realisations.php?challenge=" . $_GET["challenge"]."&community=".$_GET["community"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="add_realisation.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Add a new realisation</title>
</head>

<body>

<div class="container">
    <form id="form" action="#" method="post" enctype="multipart/form-data">
        <div class="row">
            <h3 class="form-title text-center" id="title_new_realisation">Ajoutez une nouvelle réalisation</h3>
        </div>

        <div id="form_content">
            <div class="row">
                <div class="mb-3">
                    <label class="form-label" for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>
        </div>


        <div class="row text-center">
            <div class="col"></div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-lg" id="add_button">ajouter</button>
                </div>

            <div class="col"></div>
        </div>
    </form>
</div>

</body>
</html>