<?php
    include("server.php");

    if(isset($_POST["login"])){
        $username = $_POST["username"] ;
        $password = $_POST["password"] ;

        $check = mysqli_query($conn , "SELECT * from user where username = '$username' and password = '$password'");
        $sort = mysqli_fetch_assoc($check);

        $_SESSION["name"] = $sort["name"];
        $_SESSION["lastname"] = $sort["lastname"];
        $_SESSION["email"] = $sort["email"];
        $_SESSION["username"] = $sort["username"];
        $_SESSION["password"] = $sort["password"];

        if(mysqli_num_rows($check) == 1){

            echo "<script>";
            echo "alert('You are now login')";
            echo "</script>";
            
        }
        if(mysqli_num_rows($check) == 0){
            header("location: index.php?error=<?php echo 'Wrong Username or Password'?>");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("nav.php");
    ?>

    <h1 class="text-center">Welcome <?php echo $_SESSION["name"]."  ".$_SESSION["lastname"];?></h1>

    <?php 
        $show = mysqli_query($conn , "SELECT * from product");
    ?>

    <?php while($row = mysqli_fetch_assoc($show)) { ?>

        <div class="card-columns mt-5 w-50 mx-auto d-3">
        <div class="card-img-top">
            <img
            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["p_picture"]);?>" style="width: 100px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row["p_name"]?></h4>
                <p class="card-text"><?php echo $row["p_price"]?></p>
                <a class="btn btn-primary" type="button" href="cart.php?id=<?php echo $row["id"]?>">Add to cart</a>
                <a class="btn btn-primary" type="button" href="p_detail.php?detail=<?php echo $row["id"]?>">Detail</a>
            </div>
        </div>
        </div>

    <?php } ?>
    
</body>
</html>