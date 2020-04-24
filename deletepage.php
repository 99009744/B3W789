<?php
    require("dblink.php");
    $conn = connect();
    $getresult = $_POST['id'];
    $gamename = idToName($getresult);
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
    <div id="deletepage">
        <div id="deleteText">
            <p>Are you sure you want to delete <? echo $gamename[0][0] ?>, Press yes to delete. Press no to go back to home page.</p>
            <form action="delete.php" method="post" class="deleteForm">
                <input type="hidden" value="<?= $getresult ?>" name="id"></input>
                <input type="submit" value="YES" class="deleteButton"></input>
            </form>
            <form action="index.php" method="post" class="deleteForm">
                <input type="submit" value="NO" class="deleteButton"></input>
            </form>
        </div>
    </div>
</body>
</html>