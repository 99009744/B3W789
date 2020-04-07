<?php
    $dbservername = "localhost";
    $username = "planningstoolaccount";
    $password = "cXX5J26HRdwuShjj";
    $dbname = "planningstool";
    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $username, $password);
    $sql = $conn->prepare("SELECT * FROM games order by name;");
    $sql->execute();
    $results = $sql->fetchAll();
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
    <div id="container">
        <div id="fullpage"></div>
        <div id="planning">
            <h2 id="planningtitle">Planning:</h2>
        </div>
    </div>
    <? require("footer.php"); ?>
</body>
</html>