<?php
    session_start();

    $conn = mysqli_connect("localhost" , "root" , "" , "shopshop");

    if(!$conn){
        echo "Unconnect" ;
    }
?>