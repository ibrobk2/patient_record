<?php
include_once "../includes/connection.php";


if (isset($_POST['patientId'])) {
    // Fetch the data from the database
    $patient_id = $_POST['patientId'];
    $query = "SELECT full_name, age FROM patients WHERE patient_id=$patient_id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
      // Fetch the data rows
    //   $data = array();
    //   while $row = mysqli_fetch_assoc($result)) 
    //     $data[] = $row;
    //   }
    $row = mysqli_fetch_assoc($result);
      // Prepare the response
      $data = array('status' => 'success', 'data' => $row);
      echo json_encode($data);
    } else {
      // Error occurred during the query
      $row = array('full_name'=>"Patient Details Not Found", 'age'=>"Patient Details Not Found");
      $data = array('status' => 'error', 'message' => 'Failed to fetch data from the database.', 'data'=>$row);
      echo json_encode($data);
    }
  } else {
    // Invalid request
    $data = array('status' => 'error', 'message' => 'Invalid request.');
    echo json_encode($data);
  }
  
  // Close the database connection
  mysqli_close($conn);
  ?>
