<?php
include "../includes/connection.php";



if(isset($_GET['del'])){
    $id = $_GET['del'];

    $sql = "DELETE FROM patients WHERE patients.patient_id=$id";

    $query = mysqli_query($conn, $sql);

    if($query){
        echo "Run Success";
        // header("location: manage_record.php");
    }
    else{
        echo"error occurred";
    };

    

}



?>