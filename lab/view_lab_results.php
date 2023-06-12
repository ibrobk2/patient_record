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
  <link rel="stylesheet" href="static/css/line-awesome.min.css">
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
    <a href="../logout.php" style="position: absolute; right:10px;color:red;"><h2>Logout</h2></a>

        <div class="container">
            <h2>Doctors Lab Requests</h2>
            <hr>
<table class="table table-control">
    <tr>
        <th>S/N</th>
        <th>Test_Id</th>
        <th>Patient_Id</th>
        <th>Patient_Name</th>
        <th>Age</th>
        <th>Test_name</th>
        <th>Test_Date</th>
        <th>Test_Result(s)</th>
        <th>Lab_Staff</th>
        <th>Created_At</th>
        <!-- <th>test_ten</th> -->
        <th colspan="2">Action</th>

        </tr>
        <?php
            $sn = 1;
            include "../includes/connection.php";
            $sql = "SELECT * FROM labtests";

            $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $row['test_id']+2023; ?></td>
            <td><?php echo $row['patient_id']; ?></td>
            <td><?php echo $row['patient_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['test_name']; ?></td>
            <td><?php echo $row['test_date']; ?></td>
            <td><?php echo $row['test_results']; ?></td>
            <td><?php echo $row['lab_staff']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <!-- <td><?php //echo $row['test_ten']; ?></td> -->
            <td><a href="print_doctors_lab_request.php?print=<?php echo $row['test_id'] ?>" class="btn btn-primary"><i class="las la-eye"></i>View Result</a></td>
            <td><a href="del_labtest_request.php?del=<?php echo $row['test_id'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
   <?php }?>
    </table>
    </div>
</body>
</head>
</html>