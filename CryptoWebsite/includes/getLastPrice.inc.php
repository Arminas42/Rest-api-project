<?php
    include 'dbhBtcData.inc.php';
    $sql = "SELECT * FROM `btcusdconverted` ORDER BY btcdatetime DESC limit 1;";
    $Array = array();
    if($result = mysqli_query($conn, $sql)){
        while ($row =  mysqli_fetch_assoc($result)){
            $Array[] = $row;
        }
        
    }
    mysqli_close($conn);

    $myJson = json_encode($Array);
    echo $myJson;