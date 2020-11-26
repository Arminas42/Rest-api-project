<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "btcdata";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$databaseName);
    // $conn = new \PDO("mysql:host=$servername;dbname=$databaseName;", "$username", "$password", array(
    //   PDO::MYSQL_ATTR_LOCAL_INFILE => true,
    // ));
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";