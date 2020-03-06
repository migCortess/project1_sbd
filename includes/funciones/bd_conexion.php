<?php

    $conn = mysqli_connect("localhost","project1","project1","project1","3306");

    if($conn->connect_error){
        echo $error->$conn->connect_error; 
    }




?>