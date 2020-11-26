<?php
    include 'dbh.inc.php';
    if(!isset($_POST['register'])){
      header("Location: ../register.php");
      exit();
    }else{
      // validacija, bindinimas?, valiutos laukas duomenu bazej
      $username = test_input($_POST['username']);
      $password = test_input($_POST['password']);
      $hashedpwd = password_hash($password,PASSWORD_BCRYPT);
      $name = test_input($_POST['name']);
      $surname = test_input($_POST['surname']);
      $email = test_input($_POST['email']);
      $phone = test_input($_POST['phone']);
      $birthdate = test_input($_POST['birthdate']);
      $sql = "INSERT INTO users (username, password, name, surname, email, phone, birthdate) VALUES ('$username', '$hashedpwd', '$name', '$surname', '$email', '$phone', '$birthdate');";
      mysqli_query($conn, $sql);
      header("Location: ../register.php?sql=success");
      exit();
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }