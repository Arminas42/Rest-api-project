<?php 
include 'dbhBtcData.inc.php';
$time = $_POST['input'];
//$time = "oneYear";
//$date = "2019-01-01 00:00:00";

$sql ="";
//$sql = "SELECT * FROM `btcusdconverted` WHERE date(btcdatetime) >  '$date' limit 500;";
if(isset($time)){
    if($time == "oneYear"){
            $d=strtotime("-2 Year");
            $date = date("Y-m-d h:i:s", $d);
         $sql = " SELECT  date(btcdatetime) AS datos , price, volume FROM `btcusdconverted` WHERE date(btcdatetime) >  '$date' group by date(btcdatetime);";
     }elseif($time == "sixMonths"){
        $d=strtotime("-18 month");
        $date = date("Y-m-d h:i:s", $d);
        $sql = " SELECT  date(btcdatetime) AS datos , price, volume FROM `btcusdconverted` WHERE date(btcdatetime) >  '$date' group by date(btcdatetime);";
     }elseif($time == "month"){
        $d=strtotime("-14 month");
        $date = date("Y-m-d h:i:s", $d);
        $sql = " SELECT  date(btcdatetime) AS datos , price, volume FROM `btcusdconverted` WHERE date(btcdatetime) >  '$date' group by date(btcdatetime);";
     }
    $Array = array();
    if($result = mysqli_query($conn, $sql)){
        while ($row =  mysqli_fetch_assoc($result)){
            $Array[] = $row;
            
        }
    }
    
    $myJson = json_encode($Array);
    echo $myJson;
}
