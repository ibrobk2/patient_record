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
  <title>Doctors Pharmacy Prescritions</title>
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
            <h2>Doctors Pharmacy Prescriptions</h2>
            <hr>
<table class="table table-control">
    <tr>
        <th>S/N</th>
        <th>Patient_Id</th>
        <th>Patient_Name</th>
        <th>Patient_Age</th>
        <th>Drug(s)_Prescribed</th>
        <th>Test_name</th>
        <th>Dosage</th>
        <th>Prescribing_Doctor</th>
        <!-- <th></th> -->
        <th>Date</th>
        <!-- <th>test_ten</th> -->
        <th colspan="2">Action</th>

        </tr>
        <?php
            $sn = 1;
            include "../includes/connection.php";
            $sql = "SELECT * FROM prescriptions";

            $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $row['patient_id']; ?></td>
            <td><?php echo $row['patient_name']; ?></td>
            <td><?php echo $row['patient_age']; ?></td>
            <td><?php echo $row['medication_name']; ?></td>
            <td><?php echo $row['dosage']; ?></td>
            <td><?php echo $row['prescribing_doctor']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
           
            <!-- <td><?php //echo $row['test_ten']; ?></td> -->
            <td><a href="../doctor/doctors_request.php?edit=<?php echo $row['id'] ?>" class="btn btn-primary"><i class="las la-eye"></i>View Result</a></td>
            <td><a href="del_request.php?del=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
   <?php }?>
    </table>
    </div>
</body>
</head>
</html>