<?php
include "../includes/connection.php";

//DELETE SECTION
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  
    $query = "DELETE FROM users WHERE user_id='$id'";
    $res = mysqli_query($conn, $query);
  
    if($res){
        header("Location: manage_users.php");
    }
   
  }



?>