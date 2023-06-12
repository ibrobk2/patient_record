<?php

$conn = mysqli_connect("localhost", "root", "", "patient");

if(!$conn){
    echo "failed to connect to database";
    exit();
}


?>