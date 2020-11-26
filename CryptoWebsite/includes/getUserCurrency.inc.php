<?php
    include 'dbh.inc.php';
    $id = $_POST['input'];
    //$id = 6;
    $sql = "SELECT KCE, USD FROM users WHERE id='$id';";
    $Array = array();
    if($result = mysqli_query($conn, $sql)){
        while ($row =  mysqli_fetch_assoc($result)){
            $Array[] = $row;
        }
        
    }
    mysqli_close($conn);

    $myJson = json_encode($Array);
    echo $myJson;