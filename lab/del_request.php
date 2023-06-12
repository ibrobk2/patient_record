<?php
include "../includes/connection.php";

if(isset($_GET['del'])){
    $id = $_GET['del'];

    $sql = "DELETE FROM doctors_requests WHERE id=$id";

    $query = mysqli_query($conn, $sql);

    if($query){
        header("location:doctors_lab_request.php");
    }
    else{
        echo"error occurred";
    };

}



?>