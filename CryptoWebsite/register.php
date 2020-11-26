<?php 
    include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<div class="d-flex justify-content-left ml-4">
    <form action="includes/registration.inc.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" class="form-control " type="text" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control " type="text" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control " type="text" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input id="surname" class="form-control " type="text" placeholder="Surname" name="surname">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input id="email" class="form-control " type="text" placeholder="E-mail" name="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" class="form-control " type="number" placeholder="Phone" name="phone">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input id="birthdate" class="form-control " type="date" placeholder="Birthdate" name="birthdate">
        </div>
        <button type="submit" name="register" class="btn-primary">Register</button>
    </form>
    </div>
</body>
</html>