<?php include("../header/header.html") ?>

<?php
if (isset($_FILES["realisation"])) {
    $file = file_get_contents("realisations.json");
    $array = json_decode($file, true);
    $new_realisation = array();

    $file_path = "../../img/" . basename($_FILES["realisation"]["name"]);
    move_uploaded_file($_FILES["realisation"]["tmp_name"], $file_path);
    $new_realisation["url"] = $file_path;

    $i = 0;
    foreach ($array[$_GET["community"]] as $comm) {
        if ($comm["title"] == $_GET["challenge"]) {
            break;
        }
        $i = $i + 1;
    }

    $array[$_GET["community"]][$i]["list"][] = $new_realisation;
    $json = json_encode($array);
    file_put_contents("realisations.json", $json);

    header("Location: realisations.php?challenge=" . $_GET["challenge"] . "&community=" . $_GET["community"] . "&name=" . $_GET["name"]);
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

<div class="container-fluid">
    <form id="form" action="#" method="post" enctype="multipart/form-data">
        <div class="row m-4">
            <h3 class="form-title text-center" id="title_new_realisation">Ajoutez une nouvelle réalisation</h3>
        </div>

        <div id="form_content">
            <div class="row m-4">
                <div class="mb-3">
                    <label class="form-label" for="realisation">Photo <span style="color: red">*</span></label>
                    <input type="file" name="realisation" class="form-control" id="realisation" required>
                </div>
            </div>
        </div>


        <div class="row text-center">
            <div class="col"></div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-lg" id="add_button">Ajouter</button>
                </div>

            <div class="col"></div>
        </div>
    </form>
</div>

</body>
</html>