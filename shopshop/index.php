<?php
    include("server.php");

    if(isset($_GET["error"])){

        echo '<script>';
        echo 'alert("Wrong username or password")';
        echo '</script>';

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="store.php" method="POST">
        <h1>Login</h1>
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <button type="submit" name="login">login</button>
    </form>
    <button><a href="register.php">register</a></button>
</body>
</html>