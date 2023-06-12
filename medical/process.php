<?php
include "../includes/connection.php";


//PATIENT REGISTRATION SECTION
if(isset($_POST['btn_add_patient'])){
    $hospitalNumber = $_POST['hospitalNumber'];
    $fullName = $_POST['fullName'];
    $patientPhone = $_POST['patientPhone'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $dateCreated = $_POST['dateCreated'];
    $maritalStatus = $_POST['maritalStatus'];
    $gender = $_POST['gender'];
    $residentialAddress = $_POST['residentialAddress'];
    $nextOfKinName = $_POST['nextOfKinName'];
    $nextOfKinPhone = $_POST['nextOfKinPhone'];
    $insuranceProvider = $_POST['insuranceProvider'];
    $insuranceNumber = uniqid('INS-');
    $createdat = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `patients` (`full_name`, `date_of_birth`, `address`, `contact_number`, `age`, `gender`, `email`, `insurance_provider`, `insurance_policy_number`, `emergency_contact_name`, `emergency_contact_number`, `created_at`) VALUES ('$fullName', '$dob', '$residentialAddress', '$age', '$patientPhone', '$gender', '$email', '$insuranceProvider', '$insuranceNumber', '$nextOfKinName', '$nextOfKinPhone', '$createdat')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../index.php");
    }
}


//USER REGISTRATION SECTION
if(isset($_POST['btn_reg_user'])){
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $createdat = date("Y-m-d H:i:s");

    $sql = "INSERT INTO users (full_name, phone, email,	username, password,	role, created_at) VALUES ('$fullName', '$phone', '$email', '$username', '$password', '$role', '$createdat')";
    $result = mysqli_query($conn, $sql);

    if($result){
        // session_destroy();
        header("Location: ../index.php");
    }
}

//USERS (STAFF) LOGIN SECTION
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
    if($role!="admin"){
        header("Location: ./?msg_login=failed");
        exit();
    }else{

    // Start the session and store the user data
    session_start();
    $_SESSION['username'] = $username;

    // Redirect to the dashboard
    header("Location: admin_dashboard/");
    exit();
}
  } else {
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


//PATIENT UPDATE SECTION

if(isset($_POST['update_patient'])){
    $hospitalNumber = $_POST['hospitalNumber'];
    $fullName = $_POST['fullName'];
    $patientPhone = $_POST['patientPhone'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $dateCreated = $_POST['dateCreated'];
    $maritalStatus = $_POST['maritalStatus'];
    $gender = $_POST['gender'];
    $residentialAddress = $_POST['residentialAddress'];
    $nextOfKinName = $_POST['nextOfKinName'];
    $nextOfKinPhone = $_POST['nextOfKinPhone'];
    $insuranceProvider = $_POST['insuranceProvider'];
    $insuranceNumber = uniqid('INS-');
    $createdat = date("Y-m-d H:i:s");
    $patient_id = $_POST['patient'];

    $sql = "UPDATE patients SET `full_name`='$fullName', `date_of_birth`='$dob', `address`='$residentialAddress', `age`='$age', `gender`='$gender', `marital_status`='$maritalStatus', `email`='$email', `insurance_provider`='$insuranceProvider', `insurance_policy_number`='$insuranceNumber', `emergency_contact_name`=' $nextOfKinName', `emergency_contact_number`=' $nextOfKinPhone', `created_at`='$$createdat' WHERE patient_id=$patient_id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: manage_patient.php");
    }
}



//UPDATE USERS (STAFF) SECTION
if(isset($_POST['btn_update_user'])){
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE users SET `full_name`='$fullName', `phone`='$phone', `email`='$email', `username`='$username', `password`='$password', `role`='$role' WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: manage_users.php?update=success");
    }
}






?>