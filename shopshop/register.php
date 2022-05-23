<?php
    include("server.php");
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
    <?php
        if(isset($_POST["register"])){

            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password1"];

            if($_POST["password1"] == $_POST["password2"]){
                $query = mysqli_query($conn , "INSERT into user(name , lastname , email , username , password)
                value ('$name','$lastname','$email','$username','$password')");

                header("location: sc_register.php");

            }

            if($_POST["password1"] != $_POST["password2"]){
                echo "<script>alert('Error password not match')</script>";
            }

            

        }

    ?>
    <form action="register.php" method="POST">
        <h1>Register</h1>
        <label>Name</label>
        <input type="text" name="name" required><br>
        <label>Lastname</label>
        <input type="text" name="lastname" required><br>
        <label>E-mail</label>
        <input type="email" name="email" required><br>
        <label>Username</label>
        <input type="text" name="username" required><br>
        <label>Password</label>
        <input type="password" name="password1" required><br>
        <label>Check Password</label>
        <input type="password" name="password2" required><br>
        <button type="submit" name="register">register</button>
    </form>
</body>
</html>