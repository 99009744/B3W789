<?php
    require("dblink.php");
    $conn = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <title>Planningstool</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <? require("header.php") ?>
        <div id="optionsDiv">
            <ul id="navbar">
                <li class="navOptions"><a href="index.php">HOME</a></li>
                <li class="navOptions"><a href="planning.php">PLANNING</a></li>
            </ul>
        </div>
    <div id="container">
        <div id="mainpage">
        <?php
            $results = getGames($conn);
            foreach($results as $result){
                ?>
                <div class="item">
                    <div class="grid">
                        <img src="afbeeldingen/<? echo $result['image']?>" class="image">
                        <div class="infoItem">
                            <h2><? echo $result['name'] ?></h2><br>
                            <p class="infoItemText">Min - max players: <? echo $result['min_players'] ?> - <? echo $result['max_players'] ?></p><br>
                            <p class="infoItemText">Play time: <? echo $result['play_minutes'] ?> minutes</p><br>
                            <a href="games.php?id=<? echo $result['id'] ?>">More info</a><br>
                            <form action="deletepage.php" method="post">
                                <input type="hidden" value="<?= $result['id'] ?>" name="id"></input>
                                <input type="submit" value="Delete" class="deletePageButton"></input>
                            </form>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
    <? require("footer.php"); ?>
</body>
</html>