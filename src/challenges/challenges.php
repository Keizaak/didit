
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="ChallengesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>
<header>
    <h2 style="text-align: center;">challenge list</h2>
</header>

<body>
<table>
    <div style="overflow-y: scroll; height:400px;">
        <?php
        $ressource = fopen('Challenges.json', 'r');
        $content= fread($ressource, filesize('Challenges.json'));
        $values=json_decode($content, true);

        foreach ($values[$_GET["community"]] as &$value) {
            switch ($value['difficult']) {
                case 1:
                    echo "<a href=../challenges/challenges.php?community=" . $value['title'] . ">" . $value['title'] . "<br>" . $value['description'] . "★☆☆" . "<br>" . "</a>";
                    break;
                case 2:
                    echo "<a href=../challenges/challenges.php?community=" . $value['title'] . ">" . $value['title'] . "<br>" . $value['description'] . "★★☆" . "<br>" . "</a>";
                    break;

                case 3:
                    echo "<a href=../challenges/challenges.php?community=" . $value['title'] . ">" . $value['title'] . "<br>" . $value['description'] . "★★★" . "<br>" . "</a>";
                    break;
                default:
                    echo "<a href=../challenges/challenges.php?community=" . $value['title'] . ">" . $value['title'] . "<br>" . $value['description'] . "☆☆☆" . "<br>" . "</a>";
                    break;
            }
        }
        ?>


    </div>
</table>

</body>

</html>
