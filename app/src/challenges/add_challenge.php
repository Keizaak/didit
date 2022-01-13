<?php
if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["difficulty"])) {
   $file = file_get_contents("Challenges.json");
   $array = json_decode($file, true);

   $new_challenge = array(
           "title" => $_POST["title"],
           "description" => $_POST["description"],
           "difficult" => $_POST["difficulty"]
   );

   $array[$_GET["community"]][] = $new_challenge;
   $json = json_encode($array);
   file_put_contents("Challenges.json", $json);

   header("Location: challenges.php?community=" . $_GET["community"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="add_challenge.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Add a new challenge</title>
</head>

<body>

<?php include("../header/header.html") ?>

<div class="container">
    <form id="form" action="" method="post">
        <div class="row">
            <h3 class="form-title text-center" id="title_new_challenge">Add a new challenge</h3>
        </div>

        <div id="form_content">
            <div class="row">
                <div class="mb-3">
                    <label class="form-label" for="title">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label class="form-label" for="description">Description <span style="color: red">*</span></label>
                    <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">Difficulty</label>
                </div>
            </div>

            <div class="row">
                <div class="btn-group text-center" role="group" id="difficulty_buttons">
                    <div class="col">
                        <input type="radio" class="btn-check" name="difficulty" id="easy" value=1 autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="easy">Easy</label>
                    </div>

                    <div class="col">
                        <input type="radio" class="btn-check" name="difficulty" id="medium" value=2 autocomplete="off">
                        <label class="btn btn-outline-primary" for="medium">Medium</label>
                    </div>

                    <div class="col">
                        <input type="radio" class="btn-check" name="difficulty" id="hard" value=3 autocomplete="off">
                        <label class="btn btn-outline-primary" for="hard">Hard</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label class="form-label" for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo">
                </div>
            </div>
        </div>


        <div class="row text-center">
            <div class="col"></div>

            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg">Create</button>
            </div>

            <div class="col"></div>
        </div>
    </form>
</div>

</body>
</html>