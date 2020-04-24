<?php
    include_once ("dblink.php");
    $conn = connect();
    $results = getGames($conn);
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
                Explainer : <input type="text" name="explainer" placeholder="Explainer name" required/><br />
                <label><b>Select game:</b></label>
                <select name="id">
                    <? foreach($results as $games) { ?>
                    <option value="<?= $games['id'] ?>" required><?= $games['name'] ?></option>
                    <? } ?>
                </select><br>
                Time: <input type="time" value="Submit" name="time" required/><br>
                Players: <input type="text" value="players" name="players" required/><br>
                <input type="submit" value="Submit" />
            </form>
            </div>
        </div>
        <? require("footer.php"); ?>
</body>
</html>