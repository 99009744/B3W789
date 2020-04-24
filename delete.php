<? 
    require("dblink.php");
    $conn = connect();
    $getresult = $_POST['id'];
    $deletegame = deleteGame($getresult);
    var_dump($deletegame);
    if($deletegame != NULL){
        echo "<script>alert('SUCCESSFULLY DELETED')</script>";
        header("Location: index.php");
    }
?>