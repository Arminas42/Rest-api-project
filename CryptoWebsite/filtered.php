<?php 
include 'includes/dbhBtcData.inc.php';
$from = $_POST['from'];
$to = $_POST['to'];
    $sql = " SELECT  date(btcdatetime) AS datos , price, volume FROM `btcusdconverted` WHERE date(btcdatetime) >  '$from' AND date(btcdatetime) < '$to' group by YEAR(`btcdatetime`), MONTH(`btcdatetime`),  DAY(`btcdatetime`);";
    $result = mysqli_query($conn,$sql);
    $rows = array();
    $table = array();

    $table['cols'] = array(
        array(
            'label' => 'Date',
            'type' => 'string'
        ),
        array(
            'label' => 'Price',
            'type' => 'number',
        ),
        array(
            'label' => 'Volume',
            'type' => 'string',
            'role' => 'tooltip'
        )
        );
    while($row = mysqli_fetch_array($result)){
        $sub_array = array();
        $sub_array[] = array(
            "v" => $row['datos']
        );
        $sub_array[] = array(
            "v" => $row['price']
        );
        $sub_array[] = array(
            "v" => " ". $row['price'] ." \n Volume: " . $row['volume'] .""
        );
        $rows[] = array(
            "c" => $sub_array
        );
    }
$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;