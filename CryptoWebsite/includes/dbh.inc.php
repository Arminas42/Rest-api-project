<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "onlineshop";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$databaseName);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";