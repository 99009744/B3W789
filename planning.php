<?php
    include_once ("dblink.php");
    $conn = connect();
    $gameid = $_POST['gameid'];
    $time = $_POST['time'];
    $explainer = $_POST['explainer'];
    $players = $_POST['players'];
    if ($players != NULL){
        planner($gameid, $time, $explainer, $players);
        echo "<script>alert('SUCCESSFULLY CREATED A PLANNING')</script>";
    }
    $getPlanningId = $_POST['planningid'];
    if($getPlanningId != NULL){
        $planningId = deletePlanning($getPlanningId);
        echo "<script>alert('SUCCESSFULLY DELETED')</script>";
    }
    $updatePlanning = $_POST['updatedplanningid'];
    $updatedtime = $_POST['updatedtime'];
    $updatedexplainer = $_POST['updatedexplainer'];
    $updatedgameid = $_POST['updatedgameid'];
    $updatedplayers = $_POST['updatedplayers'];
    if ($updatedtime != NULL){
        updatePlanning($updatedgameid , $updatedtime, $updatedexplainer, $updatedplayers , $updatePlanning);
        echo "<script>alert('SUCCESSFULLY UPDATED')</script>";
    }
    $results = getPlanning();
    
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
            foreach($results as $result){
            $getGameName = idToName($result['gameid']);
            $gameInfo = getGame($result['gameid']);
        ?>
            <div class="planningItem">
            <img src="afbeeldingen/<? echo $gameInfo[0]['image']?>" class="planningspic">
            <p>Planning id = <? echo $result['id'] ?> </p>
            <p>Game name = <? echo $getGameName[0][0] ?></p>
            <p>Time H:M:S = <? echo $result['time'] ?></p>
            <p>Explainer = <? echo $result['explainer'] ?></p>
            <p>Players = <? echo $result['players'] ?></p>
            <p>Playtime = <? echo $gameInfo[0]['play_minutes'] ?> </p>
            <form action="deletepage.php" method="post">
                <input type="hidden" value="<?= $result['id'] ?>" name="planningid"></input>
                <input type="submit" value="Delete" class="deletePageButton"></input>
            </form>

            <form action="updatepage.php?id=<? echo $result['id'] ?>" method="get">
                <input type="hidden" value="<?= $result['id'] ?>" name="planningid"></input>
                <input type="submit" value="Update" class="deletePageButton"></input>
            </form>
            </div>
        <?
            }
        ?>
            </div>
        </div>
        <? require("footer.php"); ?>
</body>
</html>