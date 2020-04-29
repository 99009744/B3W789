<?php
    include_once ("dblink.php");
    $conn = connect();
    $results = getGames($conn);
    $planningId = $_GET['planningid'];
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
            <form method="post" action="planning.php" style="margin: 25px">
            <input type="hidden" value="<? echo $planningId ?>" name="updatedplanningid"/>
                Explainer : <input type="text" name="updatedexplainer" placeholder="Explainer name" required/><br />
                <label>Select game:</label>
                <select name="updatedgameid">
                    <? foreach($results as $games) { ?>
                    <option value="<?= $games['id'] ?>" required><?= $games['name'] ?></option>
                    <? } ?>
                </select><br>
                Time: <input type="time" value="Submit" name="updatedtime" required/><br>
                Players: <input type="text" placeholder="players" name="updatedplayers" required/><br>
                <input type="submit" value="Submit" />
            </form>
            </div>
        </div>
        <? require("footer.php"); ?>
</body>
</html>