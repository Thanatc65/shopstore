<?php
    include("server.php");
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
        $my_user = $_SESSION["username"];
        $my_pass = $_SESSION["password"];
        $show = mysqli_query($conn , "SELECT * from product where p_username = '$my_user' and p_password = '$my_pass'");

        if(isset($_GET["del"])){
            $id = $_GET["del"] ;
            
            $delete = mysqli_query($conn , "DELETE from product where id='$id'");

            header("location: my_product.php");
        }



    ?>

    <?php while($row = mysqli_fetch_assoc($show)) { ?>

        <div class="card">
            <img
            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["p_picture"]);?>" style="width:5%">
            <div class="container">
                <h4><b><?php echo $row["p_name"]?></b></h4>
                <p><?php echo $row["p_detail"]?></p>
                <p><?php echo $row["p_price"]?></p>
                <a type="button" href="my_product.php?del=<?php echo $row["id"];?>">Cancel Product</a>
            </div>
        </div>

    <?php } ?>
</body>
</html>