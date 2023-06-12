<?php
// Include the database connection
include_once '../includes/connection.php';

// Function to sanitize user input
// function sanitizeInput($input) {
//   return htmlspecialchars(trim($input));
// }

// Check if the form is submitted
if (isset($_POST['btn_login'])) {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare the SQL statement to check if the user exists
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  // Check if the user exists
  if (mysqli_num_rows($result) === 1) {
     //Checking Role Status
     $role = mysqli_fetch_assoc($result)['role'];
     if($role!="doctor"){
         header("Location: ./?msg_login=failed");
         exit();
     }else{
    // Start the session and store the user data
    session_start();
    $_SESSION['username'] = $username;

    // Redirect to the dashboard
    header("Location: doctors_dashboard/");
    exit();
  } 
}
  else {
    // User not found, display an error message or take appropriate action
    echo "<script>
              alert('Invalid username or password.');
              window.location = 'index.php';
          </script>
      ";
  }

  // Close the database connection
  mysqli_close($conn);
}

//DOCTORS_REQUEST_FORM_SECTION

if(isset($_POST['dq'])){
  $test_one = $_POST['test_one'];
  $test_two = $_POST['test_two'];
  $test_three = $_POST['test_three'];
  $test_four = $_POST['test_four'];
  $test_five = $_POST['test_five'];
  $test_six = $_POST['test_six'];
  $test_seven = $_POST['test_seven'];
  $test_eight = $_POST['test_eight'];
  $test_nine = $_POST['test_nine'];
  $test_ten = $_POST['test_ten'];

  $sql = "INSERT INTO doctors_requests (test_one, test_two, test_three, test_four, test_five, test_six, test_seven, test_eight, test_nine, test_ten) VALUE('$test_one', '$test_two', '$test_three', '$test_four', '$test_five', '$test_six', '$test_seven', '$test_eight', '$test_nine', '$test_ten')";
  
  $query = mysqli_query($conn, $sql);

  if($query){
    header("location:index.php");
  }else{
    echo"failed";
  };
}

if(isset($_POST['update'])){

  $test_one = $_POST['test_one'];
  $test_two = $_POST['test_two'];
  $test_three = $_POST['test_three'];
  $test_four = $_POST['test_four'];
  $test_five = $_POST['test_five'];
  $test_six = $_POST['test_six'];
  $test_seven = $_POST['test_seven'];
  $test_eight = $_POST['test_eight'];
  $test_nine = $_POST['test_nine'];
  $test_ten = $_POST['test_ten'];
  $id = $_POST['id'];

  $sql = "UPDATE doctors_request SET test_one='$test_one', test_two='$test_two', test_three='$test_three', test_four='$test_four', test_five='$test_five', test_six='$test_six', test_seven=' test_one='$test_one',$test_seven', test_eight='$test_eight', test_nine='$test_nine', test_ten='$test_ten' WHERE id=$id";

  $query = mysqli_query($conn, $sql);

  if($query){
    header("location:index.php");
  }
}


//DOCTORS PRESCRIPTION SECTION
//variables declarations
if(isset($_POST['btn_pre'])){
  $patient_id = $_POST['patient_id'];
  $patient_name = $_POST['patient_name'];
  $patient_age = $_POST['patient_age'];
  $drugs = $_POST['drug'];
  $dosage = $_POST['dosage'];
  $doctors_name = $_POST['doctors_name'];

//SQL statement to Insert into database
$sql = "INSERT INTO () VALUES () WHERE (SELECT patient_id FROM patients=$patient_id)";
$result = mysqli_query($conn, $sql);
if($result){
  echo "
    <script>
      alert('Prescription Inserted Successfully...');
      window.location = 'view_doctors_prescritions.php';
    </script>
  ";
}
}



?>
