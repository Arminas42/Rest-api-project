<?php 
include 'dbh.inc.php';
$money=test_input($_POST['money']);
$id = $_POST['givenId'];
$arrUsers = [];
$urlUsers = "http://localhost/apiUsers/buyusd.php";

//$id2 = 2;
//$sql = "UPDATE users SET USD = USD + '$money' WHERE id = '$id';";
//$sql .= "UPDATE users SET USD = USD + '$money' WHERE id = '$id2';";


//$sql2 = "UPDATE users SET 
//USD = CASE WHEN id = '$id' THEN USD + '$money' END,
//USD = CASE WHEN id = '$id2' THEN USD + '$money' END;";


if(isset($_POST['buyUsd'])){
    //mysqli_multi_query($conn,$sql);
    if(is_numeric($money)){
        $arrUsers['id'] =$id;
        $arrUsers['money'] =$money;
        $ah = curl_init( $urlUsers );
        # Setup request to send json via POST.
        $payloadS = json_encode($arrUsers);
        curl_setopt( $ah, CURLOPT_POSTFIELDS, $payloadS );
        curl_setopt( $ah, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ah, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $resultS = curl_exec($ah);
        curl_close($ah);
        header("Location: ../buycrypto.php?sql=success");
        exit();
    }
    
}
echo $resultS;
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }