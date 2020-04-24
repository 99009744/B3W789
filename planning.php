<?php
    include_once ("dblink.php");
    $conn = connect();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $time = $_POST['time'];
        $explainer = $_POST['explainer'];
        $players = $_POST['players'];
        planner($id, $time, $explainer, $players);
    }
    $gameInfo = getGames($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/908fb2de93.js" crossorigin="anonymous"></script>
    <title>Planning</title>
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
            <div style="width: 200px; margin:10px">
            <a href="planagame.php" style="margin-left: 10px">+ Plan a new game</a>
            </div>
            <?php
            $results = getPlanning();
            foreach($results as $result){
            $getGameName = idToName($result['id']);
        ?>
            <div class="planningItem">
            <p>Game name = <? echo $getGameName[0][0] ?></p>
            <p>Time H:M:S = <? echo $result['time'] ?></p>
            <p>Explainer = <? echo $result['explainer'] ?></p>
            <p>Players = <? echo $result['players'] ?></p>
            <p>Playtime = <? echo $gameInfo[0]['play_minutes'] ?> </p>
            </div>
        <?
            }
        ?>
            </div>
        </div>
        <? require("footer.php"); ?>
</body>
</html>