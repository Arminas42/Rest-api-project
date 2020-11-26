<?php 
include 'dbh.inc.php';
//nusipirkus i saskaita isedit , usd pirkimas, parduoti
$time = date("Y-m-d H:i:s");
$id = $_POST['givenId'];
$arr = [];
$arrUsers = [];
$volume = $_POST['volume'];
$price = $_POST['price'];
$url = "http://localhost/api/create.php";
$urlUsers = "http://localhost/apiUsers/update.php";
if(isset($_POST['buy'])){
    $arrUsers['id'] =$id;
    $arrUsers['price'] =$price;
    $arrUsers['volume'] =$volume;
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
    $arr['btcdatetime'] =$time;
    $arr['price'] =$price;
    $arr['volume'] =$volume;

    $ch = curl_init( $url );
    # Setup request to send json via POST.
    $payload = json_encode($arr);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
    header("Location: ../buycrypto.php?sql=success");
    exit();
    
}else{
    header("Location: ../buycrypto.php?sql=error");
    exit();
}

# Print response.
echo "<pre>$result</pre>";
echo "<pre>$resultS</pre>";