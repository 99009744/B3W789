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
    function idToName($conn, $getresult){
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
        // $deletegame = $conn->prepare("DELETE FROM games WHERE id = :id");
        // $deletegame->bindParam(':id', $getresult);
        // $deletegame->execute();
        $conn = null;
        $deletegame = 12;
        return $deletegame;
    }
    function planner($id, $time, $explainer, $players){
        $insert = $conn->prepare("INSERT INTO `planning` (`id`, `time`, `explainer`, `players`) VALUES (:id, :time, :explainer, :players)");
        $insert->bindParam(':id', $id);
        $insert->bindParam(':time', $time);
        $insert->bindParam(':explainer', $explainer);
        $insert->bindParam(':players', $players);
        $insert->execute();
        $conn = null;
    }
?>