<?php

include "../includes/header.php";





?>
<!DOCTYPE html>
<html>
<head>
  <title>Test Results</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <style>
    /* Custom styling for the table */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #26a69a;
      color: #ffffff;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    span{
        font-size: 18px;
        margin-right: 100px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 style="text-align:center;">Patient Lab. Test Result Sheet</h2>
    <?php
        $id = $_GET['print'];
            $sn = 1;
            include "../includes/connection.php";
            $sql = "SELECT * FROM labtests WHERE test_id ='$id'";

            $result = mysqli_query($conn, $sql);

            $row=mysqli_fetch_assoc($result);
        ?>
    <span>Patient ID: <?=$row['patient_id']+2023; ?></span>
    <span>Patient Name: <?=$row['patient_name']; ?></span>
    
        <br>
    <span>Patient Age: <?=$row['age']; ?></span>
    <span>Date: <?=$row['created_at']; ?></span>
  
    
   
    <table class="striped">
      <thead>
        <tr>
          <th>SNO.</th>
          <th>Test</th>
          <th>Result</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP code to fetch data from the database and populate the table -->
      
        <?php
          // Assuming you have a database connection already established


           
              // Add a row for the patient ID
              echo '<tr>';
              echo '<td rowspan="3"><b>' . $sn++ . '</b></td>';
              echo '<td><b>' . $row['test_name']. '</b></td>';
              echo '<td><b>' . $row['test_results'] . '</b></td>';
              echo '</tr><b>';

                ?>
      </tbody>
    </table>

    <br>
    <h3>Lab. Scientist: <?=$row['lab_staff']; ?></h3>
    <button onclick="print()">Print</button>
  </div>
</body>
</html>
