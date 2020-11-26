<?php 
    include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="d-flex justify-content-center">
    <form action="includes/login.inc.php" method="POST" class="justify-content-center">
    <div class="form-group justify-content-center">
        <label for="username">Username</label>
        <input id="birthdate" class="form-control " type="text" placeholder="Username" name="username">
    </div>
    <div class="form-group justify-content-center">
        <label for="password">Password</label>
        <input id="password" class="form-control " type="text" placeholder="Password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
    </form>
    </div>
</body>
</html>