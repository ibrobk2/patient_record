<?php
include_once "../includes/connection.php";

// if(!$conn){
//     echo "failed to connect";
// }

// if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hospitalNumber'])){
//     $patient_id = $_POST['hospital_number'];
//     $data = array();
//     $sql = "SELECT * FROM patients WHERE patient_id=$patient_id";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);

//     // while ($row = mysqli_fetch_assoc($result)) {
//     //     $data[] = $row;
//     //   }

//     $data['full_name'] = $row['full_name'];
//     $data['age'] = $row['age'];


//     echo json_encode($data);
// }

if (isset($_POST['hospitalNumber'])) {
    // Fetch the data from the database
    $patient_id = $_POST['hospitalNumber'];
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
      $data = array('status' => 'error', 'message' => 'Failed to fetch data from the database.');
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
