<?php
include "../includes/connection.php";

//DELETE SECTION
if(isset($_GET['del'])){
    $id = $_GET['del'];
  
    $query = "DELETE FROM prescriptions WHERE prescription_id='$id'";
    $res = mysqli_query($conn, $query);
  
    if($res){
        header("Location: view_prescriptions.php");
    }
   
  }



?>