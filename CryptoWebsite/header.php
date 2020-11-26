<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="pace.min.js"></script>
    <link href="pace-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap.min.css">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light primary-nav">
        <ul class="navbar-nav mr-auto navbar-right">
        <li class=""><a class="nav-link" href="welcome.php">Home</a></li>
        <?php
            if(isset($_SESSION['userName'])){ 
                echo "<li><a class='nav-link' href='buyCrypto.php'>Buy crypto</a></li>
                <li><a class='nav-link' href='includes/logout.php'>Logout</a></li>"
                ;} 
            elseif(!isset($_SESSION['userName']))
            {echo "<li><a class='nav-link' href='login.php'>Login</a></li><li><a class='nav-link' href='register.php'>Registration</a></li>";}
        ?>
        </ul>
        <ul class="nav pull-right">
        <?php
            if(isset($_SESSION['userName'])){ 
                echo "<li class='nav-link pull-right'>Hello ".$_SESSION['userName']." Your KCE ".$_SESSION['kce']." Your USD ".$_SESSION['usd']."</li>"
                ;} 
        ?>
        </ul>
        </nav>
    </header>
</body>
</html>