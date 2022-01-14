<?php include("../header/header.html") ?>

<?php
if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["difficulty"])) {
   $file = file_get_contents("Challenges.json");
   $array = json_decode($file, true);

   $new_challenge = array(
           "title" => $_POST["title"],
           "description" => $_POST["description"],
           "difficult" => $_POST["difficulty"]
   );

   if (isset($_FILES["photo"])) {
       $file_path = "../../img/" . basename($_FILES["photo"]["name"]);
       move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path);
       $new_challenge["image_url"] = $file_path;
       if (empty(basename($_FILES["photo"]["name"]))) {
           $new_challenge["image_url"] = "../../img/default_defi.png";
       }
   } else {
       $new_challenge["image_url"] = "../../img/default_defi.png";
   }

   $array[$_GET["community"]][] = $new_challenge;
   $json = json_encode($array);
   file_put_contents("Challenges.json", $json);

   header("Location: challenges.php?community=" . $_GET["community"]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="add_challenge.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Add a new challenge</title>

    <script>
        window.onload = function() {
            window.scrollTo(0, 0);
        }
    </script>
</head>

<body>
<div class="container-fluid" id="container_form">
    <form id="form" action="" method="post" enctype="multipart/form-data">
        <div class="row m-4">
            <h3 class="form-title text-center" id="title_new_challenge">Ajoutez un nouveau défi</h3>
        </div>

        <div id="form_content">
            <div class="row m-4">
                <div class="mb-3">
                    <label class="form-label" for="title">Titre <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
            </div>

            <div class="row m-4">
                <div class="mb-3">
                    <label class="form-label" for="description">Description <span style="color: red">*</span></label>
                    <textarea class="form-control" name="description" id="description" rows="7" required></textarea>
                </div>
            </div>

            <div class="row m-4">
                <div class="col">
                    <label class="form-label">Difficulté</label>
                </div>
            </div>

            <div class="row m-4">
                <div class="btn-group text-center" role="group" id="difficulty_buttons">
                    <div class="col">
                        <input type="radio" class="btn-check" name="difficulty" id="easy" value=1 autocomplete="off" checked>
                        <label class="btn btn-primary btn-lg" for="easy" id="easy_button">
                            <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                        </label>
                    </div>

                    <div class="col">
                        <input type="radio" class="btn-check" name="difficulty" id="medium" value=2 autocomplete="off">
                        <label class="btn btn-primary btn-lg" for="medium" id="medium_button">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                        </label>
                    </div>

                    <div class="col">
                        <input type="radio" class="btn-check" name="difficulty" id="hard" value=3 autocomplete="off">
                        <label class="btn btn-primary btn-lg " for="hard" id="hard_button">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row m-4">
                <div class="mb-3">
                    <label class="form-label" for="photo">Photo</label>
                    <input type="file" class="form-control form-control-lg" name="photo" id="photo" accept="image/*">
                </div>
            </div>
        </div>


        <div class="row text-center">
            <div class="col"></div>

            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg" id="create_button">Ajouter</button>
            </div>

            <div class="col"></div>
        </div>
    </form>
</div>

</body>
</html>