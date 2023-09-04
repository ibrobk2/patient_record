<?php

include "../includes/connection.php";


// $del = "DELETE FROM doctors_requests WHERE id=$id";

// $sql = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>Doctors Lab. Requests</title>
  <style>
    .container{
        /* width:40%; */
    }
    h2{
        display:flex;
        flex-direction:row;
        align-items:center;
        justify-content:center;
    }
    </style>
    <body>
    <?php include "../includes/header.php"; ?>
        <div class="container">
            <h2>Doctors Lab Requests</h2>
            <hr>
<table class="table table-control">
    <tr>
        <th>S/N</th>
        <th>Patient_Id</th>
        <th>test_one</th>
        <th>test_two</th>
        <th>test_three</th>
        <th>test_four</th>
        <th>test_five</th>
        <th>test_six</th>
        <th>test_seven</th>
        <th>test_eight</th>
        <th>test_nine</th>
        <th>test_ten</th>
        <th colspan="2">Action</th>

        </tr>
        <?php
            include "../includes/connection.php";
            $sql = "SELECT * FROM doctors_requests";

            $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['patient_id']; ?></td>
            <td><?php echo $row['test_one']; ?></td>
            <td><?php echo $row['test_two']; ?></td>
            <td><?php echo $row['test_three']; ?></td>
            <td><?php echo $row['test_four']; ?></td>
            <td><?php echo $row['test_five']; ?></td>
            <td><?php echo $row['test_six']; ?></td>
            <td><?php echo $row['test_seven']; ?></td>
            <td><?php echo $row['test_eight']; ?></td>
            <td><?php echo $row['test_nine']; ?></td>
            <td><?php echo $row['test_ten']; ?></td>
            <td><a href="../doctor/doctors_request.php?edit=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a></td>
            <td><a href="del_request.php?del=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
   <?php }?>
    </table>
    </div>
</body>
</head>
</html>