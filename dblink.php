<?php
    function connect(){
        $conn = new PDO("mysql:host=localhost;dbname=planningstool", "root", "mysql");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";
            return $conn;
    }
    function getGames($conn){
        $sql = $conn->prepare("SELECT * FROM games order by id;");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function getGame($getresult){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM games where id = :id ;");
        $sql->bindParam(':id', $getresult);
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function idToName($getresult){
        $conn = connect();
        $sql = $conn->prepare("SELECT name FROM games where id = :id ;");
        $sql->bindParam(':id', $getresult);
        $sql->execute();
        $id = $sql->fetchAll();
        $conn = null;
        return $id;
    }
    function deleteGame($getresult){
        $conn = connect();
        $deletegame = $conn->prepare("DELETE FROM games WHERE id = :id");
        $deletegame->bindParam(':id', $getresult);
        $deletegame->execute();
        $conn = null;
    }
    function planner($gameid, $time, $explainer, $players){
        $conn = connect();
        $insert = $conn->prepare("INSERT INTO `planning` (`gameid`, `time`, `explainer`, `players`) VALUES (:gameid, :time, :explainer, :players)");
        $insert->bindParam(':gameid', $gameid);
        $insert->bindParam(':time', $time);
        $insert->bindParam(':explainer', $explainer);
        $insert->bindParam(':players', $players);
        $insert->execute();
        $conn = null;
    }
    function getPlanning(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM planning order by time ;");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function deletePlanning($getPlanningId){
        $conn = connect();
        $sql = $conn->prepare("DELETE FROM planning WHERE id = :id");
        $sql->bindParam(':id', $getPlanningId);
        $sql->execute();
        $conn = null;
    }
    function updatePlanning( $updatedgameid , $updatedtime, $updatedexplainer, $updatedplayers , $updatePlanning){
        $conn = connect();
        $sql = $conn->prepare("UPDATE `planning` SET gameid = :gameid, time = :time, explainer = :explainer, players = :players WHERE id = :id");
        $sql->bindParam(':id', $updatePlanning);
        $sql->bindParam(':gameid', $updatedgameid);
        $sql->bindParam(':time', $updatedtime);
        $sql->bindParam(':explainer', $updatedexplainer);
        $sql->bindParam(':players', $updatedplayers);
        $sql->execute();
        $conn = null;
        
    }
?>