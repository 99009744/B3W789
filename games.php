<?php
    require("dblink.php");
    connect();
    $getresult = $_GET['id'];
    if($getresult == NULL){
       $getresult = $_POST['id']; 
    }
    $results =  getGame($getresult);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $getresult = $_POST['id'];
        $locationid = $_POST['locationid'];
        $update = updateCharacter($getresult, $locationid);
        $conn = connect();
    }
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
    <title>Home page</title>
</head>
<body>
<div id="header">
    <h1 class="headertext"> <? echo $results[0]['name'] ?></h2>
</div>
<div id="optionsDiv">
            <ul id="navbar">
                <li class="navOptions"><a href="index.php">HOME</a></li>
                <li class="navOptions"><a href="">PLANNING</a></li>
            </ul>
        </div>
<div id="container">
        <div id="gamepage">
                <div id="gameHeader">
                    <img src="afbeeldingen/<? echo $results[0]['image']?>" id="profilepicture">
                    <p class="gameInfo">Skills: <? echo $results[0]['skills'] ?></p>
                    <p class="gameInfo">Playtime: <? echo $results[0]['play_minutes'] ?> minutes</p>
                    <p class="gameInfo">Min/Max players: <? echo $results[0]['min_players'] ?> / <? echo $results[0]['max_players'] ?></p>
                    <p class="gameInfo">Expasnsions: <?  
                    if ($results[0]['expansions'] == NULL){
                        echo "none";
                    }
                    else{
                        echo $results[0]['expansions'];
                    }
                        ?></p>
                    <p class="gameInfo">Explain minutes: <? echo $results[0]['explain_minutes'] ?> minutes</p>
                </div>
                <div id="gameBody">
                    <? echo $results[0]['description'] ?>
                    <p><a href="<? echo $results[0]['url'] ?>" style="color: white">Click here</a> to buy the game</p>
                    <p>Youtube vid from the game:<p>
                    <? echo $results[0]['youtube'] ?>
                </div>
        </div>
    </div>
    <? require("footer.php"); ?>
</body>