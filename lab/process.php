<?php
  session_start();
// Include the database connection
include_once '../includes/connection.php';

// Function to sanitize user input
// function sanitizeInput($input) {
//   return htmlspecialchars(trim($input));
// }


//LOGIN SECTION
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
     if($role!="lab"){
         header("Location: ./?msg_login=failed");
         exit();
     }else{
    // Start the session and store the user data
    
    $_SESSION['username'] = $username;

    // Redirect to the dashboard
    header("Location: lab_dashboard/");
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




//ADDING LAB TEST TO DATABASE SECTION
if(isset($_POST['add_test'])){
  // session_start();

  // $_SESSION['username'] = $user;
  $user = $_SESSION['username'];
$sql = " SELECT * FROM `users` WHERE username='$user' AND role='lab'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
  // $user = $_POST['username'];
  $patient_id = $_POST['patient_id'];
  $test_name = $_POST['test_name'];
  $patient_name = $_POST['patient_name'];
  $age = $_POST['age'];
  $test_date = $_POST['test_date'];
  $test_results = $_POST['test_results'];
  $lab_name = $_POST['lab_name'];
  
  // $lab_staff = $_POST['full_name'];

  $sql = "INSERT INTO labtests (patient_id, test_name, patient_name, age, test_date, test_results, lab_staff) VALUES ((SELECT patient_id FROM patients WHERE patient_id=$patient_id), '$test_name', '$patient_name', '$age','$test_date', '$test_results', '$lab_name')";
  $result = mysqli_query($conn, $sql);
  // $sql = "INSERT INTO `labtests`(`test_id`, `patient_id`, `test_name`, `patient_name`, `age`, `test_date`, `test_results`, `lab_name`) VALUES
  //  ('$patient_id','$test_name','$patient_name','$age','$test_date','$test_results','$lab_name'";
  //   $result = mysqli_query($conn, $sql);

  // $sql = "INSERT INTO `labtests`(`test_id`, `patient_id`, `test_name`, `patient_name`, `age`, `test_date`, `test_results`, `created_at`, `updated_at`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')";

  if($result){
    header("Location:lab_dashboard/");
  }else{
    die(mysqli_error ($conn));
  }



}
?>
