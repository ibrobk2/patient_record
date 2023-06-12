<?php
// Include the database connection
include_once '../includes/connection.php';

// Function to sanitize user input
// function sanitizeInput($input) {
//   return htmlspecialchars(trim($input));
// }

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
     if($role!="pharmacy"){
         header("Location: ./?msg_login=failed");
         exit();
     }else{
    // Start the session and store the user data
    session_start();
    $_SESSION['username'] = $username;

    // Redirect to the dashboard
    header("Location: pharmacy_dashboard/");
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
?>
