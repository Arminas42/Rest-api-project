<?php
    include 'dbhBtcData.inc.php';
    $sql = "SELECT date(btcdatetime) AS datos , price, volume FROM `btcusdconverted` group by YEAR(`btcdatetime`), MONTH(`btcdatetime`);";
    $Array = array();
    if($result = mysqli_query($conn, $sql)){
        while ($row =  mysqli_fetch_assoc($result)){
            $Array[] = $row;
        }
    }
    
    $myJson = json_encode($Array);
    echo $myJson;
