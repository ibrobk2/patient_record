<?php
include "../includes/connection.php";

if(isset($_GET['del'])){
    $id = $_GET['del'];

    $sql = "DELETE FROM labtests WHERE test_id=$id";

    $query = mysqli_query($conn, $sql);

    if($query){
        header("location:view_lab_results.php");
    }
    else{
        echo"error occurred";
    };

}



?>