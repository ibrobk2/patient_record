<?php
include "../includes/connection.php"; 
$update = false;
$full_name = "";
$phone = "";
$email = "";
$username = "";
$password = "";
$role = "";

if(isset($_GET['edit'])){
  $update = true;
  $user_id = $_GET['edit'];

  $sql = "SELECT * FROM users WHERE user_id=$user_id";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  
  $full_name = $row['full_name'];
  $phone = $row['phone'];
  $email = $row['email'];
  $username = $row['username'];
  $password = $row['password'];
  $role = $row['role'];
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>User Registration</title>
  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
    <?php  include "../includes/header.php"; ?>
  <div class="container">
    <?php if($update==true){ ?>
    <h2>Update User (Staff)</h2>
    <?php }else { ?>
    <h2>User Registration (Staff)</h2>
    <?php 
    }?>
    <form action="process.php" method="post">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="hidden" class="form-control" id="fullName" name="user_id" placeholder="Enter full name" value="<?php echo $user_id; ?>">
        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter full name" value="<?php echo $full_name; ?>" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo $phone; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $email; ?>" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo $username; ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php echo $password; ?>" required>
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role" required>
          <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
          <option value="">Select role</option>
          <option value="admin">Admin</option>
          <option value="doctor">Doctor</option>
          <option value="pharmacy">Pharmacy</option>
          <option value="nurse">Nurse</option>
          <option value="lab">Lab.</option>
        </select>
      </div>
      <?php if($update==true){ ?>
      <button type="submit" class="btn btn-primary" name="btn_update_user">Update</button>
      <?php }else{ ?>
      <button type="submit" class="btn btn-primary" name="btn_reg_user">Register</button>
      <?php } ?>
    </form>
  </div>
</body>

</html>
