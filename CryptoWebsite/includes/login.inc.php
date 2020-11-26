<?php 
include 'dbh.inc.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username)){
    header("Location: ../login.php?fields=emptyUsername");
    exit();
}elseif(empty($password)){
    header("Location: ../login.php?fields=emptyPassword");
    exit();
}else{
    $sql = "SELECT id, username, password, email, KCE, USD FROM users WHERE username=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../login.php?error");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"ss",$username,$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password, $row['password']);
            if($pwdCheck == false){
                header("Location: ../login.php?wrongPassword");
                exit();
            }elseif($pwdCheck == true){
                $_SESSION['userId'] = $row['id'];
                $_SESSION['userName'] = $row['username'];
                $_SESSION['kce'] = $row['KCE'];
                $_SESSION['usd'] = $row['USD'];

                header("Location: ../welcome.php");
                exit();
            }
        }else{
            header("Location: ../login.php?error");
            exit();
        }
    }
}