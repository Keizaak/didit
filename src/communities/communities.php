<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CommunitiesStyle.css" rel="stylesheet">

    <title>DidIt</title>
</head>
<header>
    <h2 style="text-align: center;">Community list</h2>
</header>

<body>
<table>
    <div style="overflow-y: scroll; height:400px;">
        <?php
        $ressource = fopen('Communities.json', 'r');
        $content= fread($ressource, filesize('Communities.json'));
        $values=json_decode($content, true);
        foreach ($values['communities'] as &$value) {
echo "<a href=../community/community.php?community=".$value['title'].">".$value['title']."<br>".$value['description']."</a><br>";
            //echo '<div onclick="post(\'https://google.com\', {name: {\''. $value["title"].'\'})" style="cursor: pointer;" >'. $value["title"].'<br>'.$value["description"].'</div>';






            /*echo '<tr>';

            echo '<td>';
            echo 'Title : ';
            echo '<a href="https://example.com">'.$value["title"].'</a>';
            echo '<br>';
            echo '</td>';
            echo '</tr>';
            echo '<tr  style="margin-bot:10px;">';
            echo '<td>';
            echo 'description : ';
            echo $value["description"];
            echo '</td>';
            echo '</div>';
            echo '</tr>';*/

        }
        ?>


    </div>
</table>

</body>

</html>