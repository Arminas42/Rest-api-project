<?php 
include 'dbh.inc.php';
$givenId = $_POST['idofuser'];
$nameTo = $_POST['name'];
$volume = $_POST['kce'];
$arrUsers = [];
$urlUsers = "http://localhost/apiUsers/transfer.php";
if(isset($_POST['transfer']) && $givenId != $nameTo){
    $arrUsers['idTo'] =$nameTo;
    $arrUsers['idFrom'] =$givenId;
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
    header("Location: ../buycrypto.php?transfer=success");
    exit();
}else{
    header("Location: ../buycrypto.php?transfer=error");
    exit();
}
echo $resultS;
echo $givenId;
echo $nameTo;
echo $volume;